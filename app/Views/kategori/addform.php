<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Form Tambah Data
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('kategori/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>
<?= form_open('kategori/addprosess'); ?>
<div class="form-group">
    <?= form_label('Nama Kategori','namakategori'); ?>
    <?= form_input('namakategori','',[
        'class' => 'form-control',
        'id'    =>  'nama_kategori',
        'autofocus' => 'true',
        'placeholder' => 'Nama Kategori'
        ])?>
    <?= session()->getFlashdata('errorNamaKategori'); ?>
</div>

<div class="form-group">
    <?= form_submit('', 'Simpan',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi')?>