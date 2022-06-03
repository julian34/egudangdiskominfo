<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Input Barang Masuk
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Input Transaksi',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('barangmasuk/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>

<?= session()->getFlashdata('sukses'); ?>
<?= form_open('barangmasuk/data'); ?>
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cari Berdasarkan Faktur..." aria-label="cari-barang"
        aria-describedby="button-addon2" name="cari" value="<?= $cari; ?>" autofocus>
    <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit" id="tombolcari" name="tombolcari">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
<?= form_close(); ?>
<span class="badge badge-success">
    <h5><?= "Total Data : ".$totaldata; ?> </h5>
</span>
<br />
<table class="table table-striped table-borderd" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Faktur</th>
            <th>Tanggal</th>
            <th>Jumlah Item</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php 
            $nomor=1 + (($nohal - 1) * 5);
            // $nomor = 1;
            foreach ($tampildata as $row) :
        ?>
        <tr>
            <td><?= $nomor++; ?></td>
            <td><?= $row['faktur']; ?></td>
            <td><?= date('d-m-Y',strtotime($row['tglfaktur'])); ?></td>
            <td>
                <?php 
                    $db = \Config\Database::connect();
                    $jmlItem = $db->table('detailbarangmasuk')->where('detfaktur',$row['faktur'])->countAllResults();
                ?>
                <span style="cursor:pointer; font-weight: bold; color:blue"
                    onclick="detailItem('<?= $row['faktur']; ?>')"><?= number_format($jmlItem, 0, ",", "."); ?></span>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-info" title="edit data"
                    onclick="edit('<?= sha1($row['faktur']); ?>')">
                    <i class="fa fa-edit"></i>
                </button>

                <form method="POST" action="/barangmasuk/hapusTransaksi/<?= $row['faktur']?>" style="display:inline;"
                    onsubmit="hapus()">
                    <input type="hidden" value="DELETE" name="_method">
                    <button type="submit" class="btn btn-sm btn-danger" title="hapus data">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="float-left mt-4">
    <?= $pager->links('barangmasuk','paging'); ?>
</div>


<div class="viewModal" style="display: none;"></div>
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>


<script>
function detailItem(faktur) {
    // alert('muncul');
    $.ajax({
        type: "post",
        url: "<?= site_url('barangmasuk/detailItem') ?>",
        data: {
            faktur: faktur
        },
        dataType: "json",
        success: function(response) {
            $('.viewModal').html(response.data).show();
            $('#modalDetailItem').modal('show');
            $('#modalDetailItemTitle').text('Detail Item | No. Faktur : ' + faktur);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function edit(id) {
    window.location.href = ('edit/') + id;
}

function hapus(id) {
    pesan = confirm('Yakin Data Dihapus ?');
    if (pesan) {
        return true;
    } else {
        return false;
    }
}
</script>

<?= $this->endSection('jspage')?>