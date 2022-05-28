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
        Barang
    </div>
    <div class="card-body">
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
function dataTemp() {
    let kodeinv = $('#kodeinv').val();

    $.ajax({
        type: "post",
        url: "/kembalibarang/dataTabelList",
        data: {
            kodeinv: kodeinv
        },
        dataType: "json",
        success: function(respons) {
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

function ambildatabarang() {
    let kodeinv = $('#kodeinv').val();
    $.ajax({
        type: "post",
        url: "/kembalibarang/ambilDataInv",
        data: {
            kodeinv: kodeinv
        },
        dataType: "json",
        success: function(e) {

            if (e.error) {
                alert(e.error);
            }

            if (e.sukses) {
                let data = e.sukses;
                $('#tglpinjam').val(data.tglpinjam);
                $('#stakeholder').val(data.stakeholder);
                $('#jnsstakeholder').val(data.jnsstakholder);
                $('#lokasi').val(data.lokasi);
                $('#kegiatan').val(data.kegiatan);
            }

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}


$(document).ready(function() {


    $('#kodeinv').change(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/kembalibarang/dataDetailKodeinv",
            data: {
                kodeinv: e
            },
            dataType: "jason",
            success: function(a) {
                $("#tglpinjam").val(a.tglpinjam);
            }
        });
    });

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

    $('#tombolSelesaiTransaksi').click(function(e) {
        e.preventDefault();
        // alert('jadi');
        let kodeinv = $('#kodeinv').val();
        let tglkembali = $('#tglkembali').val();

        if (kodeinv.length == 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Kode Invoice Wajib Disi',
                timer: 1000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            });
        } else {
            Swal.fire({
                title: 'Selesai Transaksi ?',
                text: "Yakin, Transaksi ini Disimpan ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "/kembalibarang/selesaiTransaksi",
                        data: {
                            kodeinv: kodeinv,
                            tglkembali: tglkembali
                        },
                        dataType: "json",
                        success: function(e) {
                            if (e.error) {
                                Swal.fire({
                                    title: 'Warning',
                                    icon: 'warning',
                                    text: e.error
                                });
                            }

                            if (e.sukses) {
                                Swal.fire({
                                    title: 'Success Transaksi!',
                                    text: e.success,
                                    icon: 'success'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + '\n' + thrownError);
                        }
                    });
                }
            })
        }
    });


});
</script>

<?= $this->endSection('jspage')?>