<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Manajemen Data Barang
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Tambah Data',[
'class'=>'btn btn-sm btn-primary',
'onclick' => "location.href=('" . site_url('barang/addform') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses'); ?>
<?= form_open('barang/index'); ?>
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cari data Kode Barang, Nama Barang, Kategori"
        aria-label="cari-barang" aria-describedby="button-addon2" name="cari" value="<?= $cari; ?>">
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
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Stok</th>
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
            <td><?= $row['brgkode']; ?></td>
            <td><?= $row['brgnama']; ?></td>
            <td><?= $row['katnama']; ?></td>
            <td><?= $row['satnama']; ?></td>
            <td><?= number_format ($row['brgharga'],0); ?></td>
            <td><?= number_format ($row['brgstok'],0); ?></td>
            <td>
                <button type="button" class="btn btn-sm btn-info" title="edit data"
                    onclick="edit('<?= $row['brgkode']; ?>')">
                    <i class="fa fa-edit"></i>
                </button>

                <form method="POST" action="/barang/hapus/<?= $row['brgkode']?>" style="display:inline;"
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
    <?= $pager->links('kategori','paging'); ?>
</div>



<script>
function edit(id) {
    window.location = ('editform/' + id);
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

<?= $this->endSection('isi')?>