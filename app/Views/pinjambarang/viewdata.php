<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Pinjam Peralatan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Data Peminjaman',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('pinjambarang/add') . "')"
]) ?>
<?= $this->endSection('subjudul')?>
<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses'); ?>
<?= form_open('pinjambarang/index'); ?>
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
            <th>Invoice</th>
            <th>Tanggal</th>
            <th>Kegiatan</th>
            <th>Stakeholder</th>
            <th>Lokasi</th>
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
            <td><?= $row['kodeinv']; ?></td>
            <td><?= date('d-m-Y',strtotime($row['tglpinjam'])); ?></td>
            <td><?= $row['kegiatan']; ?></td>
            <td><?= $row['stakeholder']; ?></td>
            <td><?= $row['lokasi']; ?></td>
            <td>
                <?php 
                    $db = \Config\Database::connect();
                    $jmlItem = $db->table('detailpinjambarang')->where('detkodeinv',$row['kodeinv'])->countAllResults();
                ?>
                <span style="cursor:pointer; font-weight: bold; color:blue"
                    onclick="detailItem('<?= $row['kodeinv']; ?>')"><?= number_format($jmlItem, 0, ",", "."); ?></span>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-info" title="edit data"
                    onclick="print('<?= sha1($row['kodeinv']); ?>')">
                    <i class="fa fa-print"></i>
                </button>
                &nbsp;
                <button type="button" class="btn btn-sm btn-info" title="edit data"
                    onclick="edit('<?= sha1($row['kodeinv']); ?>')">
                    <i class="fa fa-edit"></i>
                </button>
                &nbsp;
                <form method="POST" action="/pinjambarang/hapusTransaksi/<?= $row['kodeinv']?>" style="display:inline;"
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
    <?= $pager->links('pinjambarang','paging'); ?>
</div>


<div class="viewModal" style="display: none;"></div>
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>

<script>
function detailItem(kodeinv) {
    // alert('muncul');
    $.ajax({
        type: "post",
        url: "/pinjambarang/detailItem",
        data: {
            kodeinv: kodeinv
        },
        dataType: "json",
        success: function(response) {
            $('.viewModal').html(response.data).show();
            $('#modalDetailItem').modal('show');
            $('#modalDetailItemTitle').text('Detail Item | No. Faktur : ' + kodeinv);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function edit(id) {
    window.location.href = ('edit/') + id;
}


function print(id) {
    window.location.href = ('printInvPdf/') + id;
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