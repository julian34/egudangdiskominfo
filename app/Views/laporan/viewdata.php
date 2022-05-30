<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Laporan Penggunaan Barang
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Input Transaksi',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('barangmasuk/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>

<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>

<?= $this->endSection('jspage')?>