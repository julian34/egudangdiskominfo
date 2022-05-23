<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Form Tambah Data
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('satuan/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>
<?= form_open('satuan/addprosess'); ?>
<div class="form-group">
    <?= form_label('Nama Satuan','namasatuan'); ?>
    <?= form_input('namasatuan','',[
        'class' => 'form-control',
        'id'    =>  'nama_satuan',
        'autofocus' => 'true',
        'placeholder' => 'Nama Satuan'
        ])?>
    <?= session()->getFlashdata('errorNamaSatuan'); ?>
</div>

<div class="form-group">
    <?= form_submit('', 'Simpan',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi')?>