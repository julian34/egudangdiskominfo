<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Transaksi Pengembalian Peralatan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('kembalibarang/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>

<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>

<?= $this->endSection('jspage')?>