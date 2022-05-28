<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Transaksi Pinjam Peralatan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-backward"></i> Kembali',[
'class'=>'btn btn-warning',
'onclick' => "location.href=('" . site_url('pinjambarang/index') . "')"
]) ?>
<?= $this->endSection('subjudul')?>


<?= $this->section('isi')?>


<div class="form-row">
    <div class="form-group col-md-6">
        <label for="">No. Invoice</label>
        <input type="text" class="form-control" name="kodeinv" placeholder="No. Invoice" id="kodeinv"
            value="<?= $kodeinv; ?>" readonly>
    </div>
    <div class="form-group col-md-6">
        <label for="">Tanggal Peminjaman</label>
        <input type="date" class="form-control" name="tglpinjam" id="tglpinjam" value="">
    </div>
    <div class="form-group col-md-6">
        <label for="">Stakeholder</label>
        <input type="text" class="form-control" name="stakeholder" placeholder="Stakeholder" id="stakeholder">
    </div>
    <div class="form-group col-md-2">
        <label for="">Jenis Stakeholder</label>
        <select class="form-control" name="jnsstakeholder">
            <option></option>
            <option>Pemerintah</option>
            <option>Swasta</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="">Lokasi</label>
        <input type="text" class="form-control" name="lokasi" placeholder="Lokasi Kegiatan" id="lokasi">
    </div>

    <div class="form-group col-md">
        <label for="">Kegiatan</label>
        <input type="text" class="form-control" name="kegiatan" placeholder="Kegiatan" id="kegiatan">
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
<div class="modalcaribarang" style="display: none;">

</div>

<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>

<script src="<?= base_url() ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script>
function dataTemp() {
    let kodeinv = $('#kodeinv').val();

    $.ajax({
        type: "post",
        url: "/pinjambarang/dataTemp",
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

function rform() {
    $('#namabarang').val('');
    $('#jumlah').val('');
    $('#kdbarang').val('');
    $('#kdbarang').focus();
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
                url: "/pinjambarang/hapusTempList",
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

function cariDataBarang() {
    let cari = $('#cari').val();

    $.ajax({
        type: "post",
        url: "/pinjambarang/detailCariBarang",
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
        url: "/pinjambarang/ambilDataBarang",
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


$(document).ready(function() {
    dataTemp();

    // $('#tglpinjam').datepicker();

    $('#kdbarang').keydown(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            ambildatabarang();
        }
    });

    $('#tombolSelesaiTransaksi').click(function(e) {
        e.preventDefault();
        // alert('jadi');
        let kodeinv = $('#kodeinv').val();
        let kodebarng = $('#kdbarang').val();
        let jumlah = $('#jumlah').val();
        let tglpinjam = $('#tglpinjam').val();
        let kegiatan = $('#kegiatan').val();
        let jnsstakeholder = $('#jnsstakeholder').val();
        let stakeholder = $('#stakeholder').val();
        let lokasi = $('#lokasi').val();

        if (kodeinv.length == 0) {
            Swal.fire({
                icon: 'warning',
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
                        url: "/pinjambarang/selesaiTransaksi",
                        data: {
                            kodeinv: kodeinv,
                            kegiatan: kegiatan,
                            jnsstakeholder: jnsstakeholder,
                            stakeholder: stakeholder,
                            tglpinjam: tglpinjam,
                            lokasi: lokasi
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

    $('#tombolTambahItem').click(function(e) {
        e.preventDefault();

        //var
        let kodeinv = $('#kodeinv').val();
        let kodebarng = $('#kdbarang').val();
        let jumlah = $('#jumlah').val();
        let kegiatan = $('#kegiatan').val();

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
        } else if (kegiatan.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Kegiatan Wajib Disi',
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
            $('#kegiatan').focus();
        } else {
            $.ajax({
                type: "post",
                url: "/pinjambarang/simpanTemp",
                data: {
                    kodeinv: kodeinv,
                    kodebarang: kodebarng,
                    jumlah: jumlah,
                },
                dataType: "json",
                success: function(e) {
                    if (e.sukses) {
                        dataTemp();
                        rform();
                        alert(e.sukses);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + '\n' + thrownError);
                }
            });
        }
        // alert('tombol tambah Item');
    });

    $('#tombolReload').click(function(e) {
        e.preventDefault();
        dataTemp();
    });

    $('#tombolCariBarang').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/pinjambarang/cariDataBarang",
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

});
</script>
<?= $this->endSection('jspage')?>