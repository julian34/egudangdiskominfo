<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Form Edit Data
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('barang/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<?= form_open_multipart('barang/editprosess'); ?>

<?= session()->getFlashdata('errors'); ?>
<div class="form-group row">
    <?= form_label('Kode Barang','brgkode',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <?= form_input('brgkode',$kodebarang,[
        'class' => 'form-control',
        'id'    =>  'brgkode',
        'readonly' => 'true',
        'placeholder' => 'Kode Barang'
        ])?>
    </div>
</div>

<div class="form-group row">
    <?= form_label('Nama Barang','brgnama',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <?= form_input('brgnama',$namabarang,[
        'class' => 'form-control',
        'id'    =>  'brgnama',
        'placeholder' => 'Nama Barang'
        ])?>
    </div>
</div>


<div class="form-group row">
    <?= form_label('Kategori','brgkatid',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <select name="brgkatid" id="brgkatid" class="form-control">
            <?php foreach ($slkategori as $ket) : ?>
            <?php if($ket['katid'] == $kategoribarang): ?>
            <option selected value="<?= $ket['katid']; ?>"><?= $ket['katnama']; ?></option>
            <?php else : ?>
            <option value="<?= $ket['katid']; ?>"><?= $ket['katnama']; ?></option>
            <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group row">
    <?= form_label('Satuan','brgsatid',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <select name="brgsatid" id="brgsatid" class="form-control">

            <?php foreach ($slsatuan as $sat) : ?>

            <?php if($sat['satid'] == $satuanbarang): ?>
            <option selected value="<?= $sat['satid']; ?>"><?= $sat['satnama']; ?></option>
            <?php else : ?>
            <option value="<?= $sat['satid']; ?>"><?= $sat['satnama']; ?></option>
            <?php endif; ?>

            <?php endforeach; ?>
        </select>
    </div>
</div>


<div class="form-group row">
    <?= form_label('Harga','brgharga',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <?= form_input('brgharga',$hargabarang,[
        'class' => 'form-control',
        'id'    =>  'brgharga',
        'placeholder' => 'Harga',
        ],'number')?>
    </div>
</div>

<div class="form-group row">
    <?= form_label('Stok','brgstok',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <?= form_input('brgstok',$stokbarang,[
        'class' => 'form-control',
        'id'    =>  'brgstok',
        'placeholder' => 'Stok']
        ,'number')?>
    </div>
</div>


<div class="form-group row">
    <?= form_label('Gambar ','brggambar',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <img src="<?= $gambarbarang == "default-150x150.png" ? base_url()."/dist/img/default-150x150.png" : 
            base_url().'/upload/'.$gambarbarang; ?>" class="img-thumbnail" style="width:50" alt="gambar
        barang">
    </div>
</div>

<div class="form-group row">
    <?= form_label('Upload Gambar (<i>Jika diganti...</i>) ','brggambar',[
        'class' => 'col-sm-2 col-form-label',
        ]); ?>
    <div class="col-sm-10">
        <?= form_input('brggambar','',[
        'id'    =>  'brggambar',
        'placeholder' => 'gambar']
        ,'file')?>
    </div>
</div>




<div class="form-group row">
    <?= form_submit('', 'Simpan',[
        'class' => 'btn btn-success'
    ])?>
</div>
<?= form_close(); ?>
<?= $this->endSection('isi')?>