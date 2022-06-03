<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Input Barang Masuk
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= form_button('','<i class="fa fa-plus-circle"></i> Input Transaksi',[
'class'=>'btn btn-primary',
'onclick' => "location.href=('" . site_url('barangmasuk/index') . "')"
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
                        <th>Faktur</th>
                        <th>Tanggal</th>
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
function detailItem(faktur) {
    // alert('muncul');
    $.ajax({
        type: "post",
        url: "<?= site_url('barangmasuk/detailItem') ?>",
        data: {
            faktur: faktur
        },
        dataType: "json",
        success: function(response) {
            $('.viewModal').html(response.data).show();
            $('#modalDetailItem').modal('show');
            $('#modalDetailItemTitle').text('Detail Item | No. Faktur : ' + faktur);
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

$(document).ready(function() {
    var tabel = $('#tablelistdata').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "<?= site_url('barangmasuk/listtabeldata') ?>",
        columns: [{
                data: '',
                orderable: false
            },
            {
                data: 'faktur'
            },
            {
                data: 'tglfaktur'
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