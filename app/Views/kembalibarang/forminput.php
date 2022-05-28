<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Transaksi kembali Peralatan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('kembalibarang/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">No. Invoice</label>
        <div class="input-group mb-4">
            <input type="text" class="form-control" name="kodeinv" placeholder="No. Invoice" id="kodeinv" value=""
                readonly>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="tombolCariInv"><i
                        class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="">Tanggal Peminjaman</label>
        <input type="date" class="form-control" name="tglpinjam" id="tglpinjam" value="" readonly>
    </div>
    <div class="form-group col-md-3">
        <label for="">Tanggal Pengembalian</label>
        <input type="date" class="form-control" name="tglkembali" id="tglkembali" value="<?= date('Y-m-d') ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="">Stakeholder</label>
        <input type="text" class="form-control" name="stakeholder" placeholder="Stakeholder" id="stakeholder" readonly>
    </div>
    <div class="form-group col-md-2">
        <label for="">Jenis Stakeholder</label>
        <input type="text" class="form-control" name="jnsstakeholder" placeholder="Jenis Stakeholder"
            id="jnsstakeholder" readonly>
    </div>
    <div class="form-group col-md-4">
        <label for="">Lokasi</label>
        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi Kegiatan" id="lokasi" readonly>
    </div>

    <div class="form-group col-md">
        <label for="">Kegiatan</label>
        <input type="text" class="form-control" name="kegiatan" placeholder="Kegiatan" id="kegiatan" readonly>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary">
        Input Barang
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="">Kode Barang</label>
                <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Kode Barang" name="kdbarang" id="kdbarang"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="tombolCariBarang"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="">Nama Barang</label>
                <input type="text" class="form-control" name="namabarang" id="namabarang" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="jumlah">
            </div>
            <div class="form-group col-md-1">
                <label for="">Aksi</label>
                <div class="input-group">
                    <button type="button" class="btn btn-sm btn-info" title="Tambah Item" id="tombolTambahItem">
                        <i class="fa fa-plus-square"></i>
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-sm btn-warning" title="Reload Item" id="tombolReload">
                        <i class="fa fa-sync-alt"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row" id="tampilDataTemp"></div>

        <div class="row justify-content-end">
            <button class="btn btn-lg btn-success" id="tombolSelesaiTransaksi">
                <i class="fa fa-save"></i> Selesai Transaksi
            </button>
        </div>
    </div>
</div>

<!-- <div class="modalcaribarang" style="display: none;"> -->
<div class="modalcariinv" style="display: none;"></div>

<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>

<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
function dataTabelList() {
    let kdin = $('#kodeinv').val();
    $.ajax({
        type: "post",
        url: "kemablibarang/dataTabelList",
        data: {
            kodeinv: kdin
        },
        dataType: "json",
        success: function(response) {
            if (respons.data) {
                $('#tampilDataTemp').html(respons.data);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function cariDataPinInv() {
    let cari = $('#cari').val();
    $.ajax({
        type: "post",
        url: "/kembalibarang/detailCariInv",
        data: {
            cari: cari
        },
        dataType: "json",
        beforeSend: function(e) {
            $('.viewdetaildata').html('<i class="fa fa-spin fa-spinner"></i>')
        },
        success: function(e) {
            if (e.data) {
                $('.viewdetaildata').html(e.data);
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

$(document).ready(function() {
    $('#tombolCariInv').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/kembalibarang/cariDatainv",
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('.modalcariinv').html(response.data).show();
                    $('#modalcariinv').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError);
            }
        });
    });
});
</script>

<?= $this->endSection('jspage')?>