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
<table class="table table-striped table-bordered" style="width: 100%;" id="tablelistdata">
    <thead>
        <tr>
            <th style="width: 2%;">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
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
$(document).ready(function() {
    var tabel = $('#tablelistdata').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "<?= site_url('barang/listtabeldata') ?>"
    });
});
</script>
<?= $this->endSection('jspage')?>