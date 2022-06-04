<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
User Manajemen
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Tambah User',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('usermag/add') . "')"
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
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width:15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="viewModal" style="display: none;"></div>
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>
<script>
$(document).ready(function() {
    //start doc
    var table = $('#tablelistdata').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "<?= site_url('usermag/listdata')?>",
        columns: [{
                data: ''
            },
            {
                data: 'fullname'
            },
            {
                data: 'username'
            },
            {
                data: 'email'
            },
            {
                data: 'role'
            },
            {
                data: 'aksi'
            }
        ],
    });
    //end doc
});
</script>
<?= $this->endSection('jspage')?>