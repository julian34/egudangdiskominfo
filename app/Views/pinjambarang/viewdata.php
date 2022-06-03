<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Pinjam Peralatan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Data Peminjaman',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('pinjambarang/add') . "')"
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
                        <th>No</th>
                        <th>Invoice</th>
                        <th style="width:15%">Tanggal Pemakaian</th>
                        <th>Kegiatan</th>
                        <th>Stakeholder</th>
                        <th>Lokasi</th>
                        <th>Jumlah Item</th>
                        <th style="width:15%">Aksi</th>
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
        url: "<?= site_url('pinjambarang/detailItem') ?>",
        data: {
            kodeinv: kodeinv
        },
        dataType: "json",
        success: function(response) {
            $('.viewModal').html(response.data).show();
            $('#modalDetailItem').modal('show');
            $('#modalDetailItemTitle').text('Detail Item | No. Invoice : ' + kodeinv);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function edit(id) {
    window.location.href = ('edit/') + id;
}


function print(id) {
    window.location.href = ('printInvPdf/') + id;
}

$(document).ready(function() {
    var tabel = $('#tablelistdata').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "<?= site_url('pinjambarang/listtabeldata') ?>",
        columns: [{
                data: '',
                orderable: false
            },
            {
                data: 'kodeinv'
            },
            {
                data: 'tanggalpemakaian',
                name: 'tglpinjam'
            },
            {
                data: 'kegiatan'
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