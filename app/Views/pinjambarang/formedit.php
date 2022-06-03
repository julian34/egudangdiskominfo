<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Edit Transaksi Peminjaman
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('pinjambarang/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>
<input type="hidden" id='kodeinv' value="<?= $kodeinv?>">

<table class="table table-sm table-striped table-hover" style="width: 100%;">
    <tr>
        <td style="width: 20%;">No. Invoice</td>
        <td style="width: 2%;">:</td>
        <td style="width: 28%;"><?= $kodeinv?></td>
        <td rowspan="6" style="vertical-align: middle; text-align:center; font-weight:bold; font: size 25pt;"
            id="totalBarang"></td>
    </tr>
    <tr>
        <td style="width: 20%;">Tanggal Pinjam</td>
        <td style="width: 2%;">:</td>
        <td style="width: 28%;"><?= date('d-m-Y',strtotime($tglpinjam)) ?></td>
    </tr>
    <tr>
        <td style="width: 20%;">Kegiatan</td>
        <td style="width: 2%;">:</td>
        <td style="width: 28%;"><?= $kegiatan ?></td>
    </tr>
    <tr>
        <td style="width: 20%;">Stakeholder</td>
        <td style="width: 2%;">:</td>
        <td style="width: 28%;"><?= $stakeholder ?></td>
    </tr>
    <tr>
        <td style="width: 20%;">Jenis Stakeholder</td>
        <td style="width: 2%;">:</td>
        <td style="width: 28%;"><?= $jnsstakholder ?></td>
    </tr>
</table>



<!--  -->

<!--  -->
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
                <input type="hidden" name="idDetail" id="idDetail">
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
                    <button style="display: none;" type="button" class="btn btn-sm btn-primary" title="Edit Item"
                        id="tombolEditItem">
                        <i class="fa fa-edit"></i>
                    </button>
                    &nbsp;
                    <button style="display: none;" type="button" class="btn btn-sm btn-secondary" title="Reload"
                        id="tombolReload">
                        <i class="fa fa-sync-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row" id="tampilDataDetail"></div>
    </div>
</div>
<div class="modalcaribarang" style="display: none;"></div>
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>

<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script>
function dataDetail() {
    let kodeinv = $('#kodeinv').val();

    $.ajax({
        type: "post",
        url: "<?= site_url('pinjambarang/dataDetail') ?>",
        data: {
            kodeinv: kodeinv
        },
        dataType: "json",
        success: function(respons) {
            if (respons.data) {
                $('#tampilDataDetail').html(respons.data);
                $('#totalBarang').html("TOTAL BARANG : " + respons.totalBarang)
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function hapusItem(id) {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Untuk Menghapus Data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "post",
                url: "<?= site_url('pinjambarang/hapusTempList') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(e) {
                    if (e.sukses) {
                        Swal.fire(
                            'Deleted!',
                            e.success,
                            'success'
                        );
                        dataTemp();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });
        }
    })
}

function editItem(id) {
    $('#idDetail').val(id);
    $.ajax({
        type: "post",
        url: "<?= site_url('pinjambarang/editItem') ?>",
        data: {
            idDetail: $('#idDetail').val()
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                let data = response.sukses;
                $('#kdbarang').val(data.kodebarang);
                $('#namabarang').val(data.namabarang);
                $('#jumlah').val(data.jumlah);
            }
            $('#tombolEditItem').fadeIn();
            $('#tombolReload').fadeIn();
            $('#tombolTambahItem').fadeOut();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function hapusItem(id) {
    Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Untuk Menghapus Data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                type: "post",
                url: "<?= site_url('pinjambarang/hapusItemDetail') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(e) {
                    if (e.sukses) {
                        Swal.fire(
                            'Deleted!',
                            e.success,
                            'success'
                        );
                        dataDetail();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });
        }
    })
}

function cariDataBarang() {
    let cari = $('#cari').val();

    $.ajax({
        type: "post",
        url: "<?= site_url('pinjambarang/detailCariBarang') ?>",
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
    let kodebarang = $('#kdbarang').val();
    $.ajax({
        type: "post",
        url: "<?= site_url('pinjambarang/ambilDataBarang') ?>",
        data: {
            kodebarang: kodebarang
        },
        dataType: "json",
        success: function(e) {

            if (e.error) {
                rform();
                alert(e.error);
            }

            if (e.sukses) {
                let data = e.sukses;
                $('#namabarang').val(data.namabarang);
                $('#jumlah').focus();
            }


        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}


function rform() {

    $('#kdbarang').val('');
    $('#namabarang').val('');
    $('#jumlah').val('');
    $('#kdbarang').focus();
}

$(document).ready(function() {
    dataDetail();

    $('#tombolReload').click(function(e) {
        e.preventDefault();
        $(this).hide();
        $('#tombolEditItem').hide();
        $('#tombolTambahItem').fadeIn();
        $('#idDetail').val('');
        rform();
    });

    $('#kdbarang').keydown(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            ambildatabarang();
        }
    });

    $('#tombolTambahItem').click(function(e) {
        e.preventDefault();
        let kodeinv = $('#kodeinv').val();
        let kodebarng = $('#kdbarang').val();
        let jumlah = $('#jumlah').val();
        if (kodeinv.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Nomor Faktur Wajib Disi',
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
            $('#kodeinv').focus();
        } else if (kodebarng.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kode Barang Wajib Disi',
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
            $('#kdbarang').focus();
        } else if (jumlah.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jumblah Wajib Disi',
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
            $('#jumlah').focus();
        } else {
            $.ajax({
                type: "post",
                url: "<?= site_url('pinjambarang/simpanDetail') ?>",
                data: {
                    kodeinv: kodeinv,
                    kodebarang: kodebarng,
                    jumlah: jumlah
                },
                dataType: "json",
                success: function(e) {
                    if (e.sukses) {
                        dataDetail();
                        rform();
                        alert(e.sukses);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });
        }
    });

    // $('#tombolReload').click(function(e) {
    //     e.preventDefault();
    //     dataDetail();
    // });

    $('#tombolCariBarang').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('pinjambarang/cariDataBarang') ?>",
            dataType: "json",
            success: function(response) {
                if (response.data) {
                    $('.modalcaribarang').html(response.data).show();
                    $('#modalcaribarang').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError);
            }
        });
    });

    $('#tombolEditItem').click(function(e) {
        e.preventDefault();

        let kodeinv = $('#kodeinv').val();
        let kodebarng = $('#kdbarang').val();
        let jumlah = $('#jumlah').val();

        $.ajax({
            type: "post",
            url: "<?= site_url('pinjambarang/updateItem') ?>",
            data: {
                iddetail: $('#idDetail').val(),
                kodeinv: kodeinv,
                kodebarang: kodebarng,
                jumlah: jumlah
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    dataDetail();
                    rform();
                    alert(response.sukses);
                    $('#tombolTambahItem').fadeIn();
                    $('#tombolEditItem').hide();
                    $('#tombolReload').hide();
                    $('#idDetail').val('');

                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError);
            }
        });

    });

    //Akhir Document Ready 
});
</script>
<?= $this->endSection('jspage')?>