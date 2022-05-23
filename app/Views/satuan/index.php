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

<?= form_open('satuan/index'); ?>
<div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="Cari data satuan" aria-label="cari-satuan"
        aria-describedby="button-addon2" name="cari" value="<?= $cari; ?>">
    <div class="input-group-append">
        <button class="btn btn-outline-primary" type="submit" id="tombolcari" name="tombolcari">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>
<?= form_close(); ?>

<table class="table table-striped table-borderd" style="width: 100%;">
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th>Nama Satuan</th>
            <th style="width: 15%;">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php 
            $nomor=1;
            foreach ($tampildata as $row) :
        ?>
        <tr>
            <td><?= $nomor++; ?></td>
            <td><?= $row['satnama']; ?></td>
            <td>
                <button type="button" class="btn btn-info" title="edit data" onclick="edit('<?= $row['satid']; ?>')">
                    <i class="fa fa-edit"></i>
                </button>

                <form method="POST" action="/satuan/hapus/<?= $row['satid']?>" style="display:inline;"
                    onsubmit="hapus()">
                    <input type="hidden" value="DELETE" name="_method">
                    <button type="submit" class="btn btn-danger" title="hapus data">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>

<div class="float-left mt-4">
    <?= $pager->links('satuan','paging'); ?>
</div>

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
</script>

<?= $this->endSection('isi')?>