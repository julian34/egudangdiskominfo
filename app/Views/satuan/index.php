<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Manajemen Data Satuan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Tambah Data',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('satuan/addform') . "')"
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
                        <th>Nama Satuan</th>
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
        ajax: "<?= site_url('satuan/listtabeldata') ?>",
        columns: [{
                data: '',
                orderable: false
            },
            {
                data: 'satnama'
            },
            {
                data: 'aksi',
                orderable: false
            },
        ]
    });
});
</script>
<?= $this->endSection('jspage')?>