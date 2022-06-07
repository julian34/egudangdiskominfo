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
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="col-lg grid-margin">
            <table class="table table-striped table-bordered" style="width: 100%;" id="tablelistdata">
                <thead>
                    <tr>
                        <th>No</th>
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
        </div>
    </div>
</div>
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>
<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
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

function opengambar(e) {
    // e.preventDefault();
    Swal.fire({
        title: e,
        text: e,
        imageUrl: '<?=base_url('upload')?>/' + e,
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: e,
    })
}

$(document).ready(function() {
    var tabel = $('#tablelistdata').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "<?= site_url('barang/listtabeldata') ?>",
        columns: [{
                data: '',
                orderable: false
            },
            {
                data: 'brgkode'
            },
            {
                data: 'nama_gambar'
            },
            {
                data: 'katnama'
            },
            {
                data: 'satnama'
            },
            {
                data: 'brgharga'
            },
            {
                data: 'brgstok',
                orderable: false
            },
            {
                data: 'aksi',
                orderable: false
            }
        ]
    });
});
</script>
<?= $this->endSection('jspage')?>