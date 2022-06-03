<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Pengembalian Peralatan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Data Pengembalian',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('kembalibarang/add') . "')"
]) ?>
<?= $this->endSection('subjudul')?>
<?= $this->section('isi')?>
<?= session()->getFlashdata('sukses'); ?>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="col-lg grid-margin">
            <table class="table table-striped table-bordered" style="width: 100%;" id="tablelistdata">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Invoice</th>
                        <th>Kegiatan</th>
                        <th style="width: 15%;">Tanggal Pemakaian</th>
                        <th style="width: 15%;">Tanggal Pegembalian</th>
                        <th>Stakeholder</th>
                        <th>Lokasi</th>
                        <th>Jumlah Item</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="viewModal" style="display: none;"></div>
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>

<script>
function detailItem(kodeinv) {
    // alert('muncul');
    $.ajax({
        type: "post",
        url: "<?= site_url('kembalibarang/detailItem') ?>",
        data: {
            kodeinv: kodeinv
        },
        dataType: "json",
        success: function(response) {
            $('.viewModal').html(response.data).show();
            $('#modalDetailItem').modal('show');
            $('#modalDetailItemTitle').text('Detail Item | No. Invoice : ' + kodeinv);
            $('#tabeldetailitem').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: "<?= site_url('kembalibarang/listdetailitem') ?>/" + kodeinv,
                columns: [{
                        data: '',
                        orderable: false
                    },
                    {
                        data: 'brgkode'
                    },
                    {
                        data: 'brgnama'
                    },
                    {
                        data: 'detjml',
                        orderable: false
                    }
                ]
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function edit(id) {
    window.location.href = ('edit/') + id;
}

function hapus(id) {
    pesan = confirm('Yakin Data Dihapus ?');
    if (pesan) {
        return true;
    } else {
        return false;
    }
}

function print(id) {
    window.location.href = ('printInvPdf/') + id;
}

$(document).ready(function() {
    var tabel = $('#tablelistdata').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "<?= site_url('kembalibarang/listtabeldata') ?>",
        columns: [{
                data: '',
                orderable: false
            },
            {
                data: 'kkdinv'
            },
            {
                data: 'kegiatan'
            },
            {
                data: 'tanggalpemakaian',
                name: 'tglpinjam'
            },
            {
                data: 'tanggalpengembalian',
                name: 'tglkembali'
            },
            {
                data: 'stakeholder'
            },
            {
                data: 'lokasi'
            },
            {
                data: 'jmlalat',
                orderable: false
            },
            {
                data: 'aksi',
                orderable: false
            },
        ]
    });
});
</script>
<?= $this->endSection('jspage')?>