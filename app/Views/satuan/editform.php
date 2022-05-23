<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Form Edit Data
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('satuan/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>
<?= form_open('satuan/editprosess','',[
    'idsatuan' => $id
]); ?>
<div class="form-group">
    <?= form_label('Nama Satuan','namasatuan'); ?>
    <?= form_input('namasatuan',$nama,[
        'class' => 'form-control',
        'id'    =>  'nama_satuan',
        'autofocus' => 'true',
        ])?>
    <?= session()->getFlashdata('errorNamaSatuan'); ?>
</div>
<div class="form-group">
    <?= form_submit('', 'Update',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi')?>