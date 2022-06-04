<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Laporan Penggunaan Peralatan
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<?= $this->endSection('subjudul')?>
<?= $this->section('isi')?>

<?= session()->getFlashdata('sukses'); ?>
<div class="form-group mb-3">
    <label>Range Tanggal:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
            </span>
        </div>
        <input type="text" class="form-control float-right" name="datefilter" id="reservation" value="<?= $cari; ?>">
    </div>
</div>
<!-- <div class="listdatalpb" style="display: none;"></div> -->
<?= form_open('lpb/printLap'); ?>
<div class="input-group mb-3">
    <input type="hidden" id='tglawal' name="tglawal">
    <input type="hidden" id='tglakhir' name="tglakhir">
</div>
<?= 
form_submit('submitprint','Print',[
    'class'=>'btn btn-info tombolprint',
    'style'=>'display: none;']);?>
<?= form_close(); ?>
<br />
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

<?= $this->Section('csspage')?>
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.css">
<?= $this->endSection('csspage')?>


<?= $this->Section('jspage')?>
<script src="<?= base_url() ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/plugins/daterangepicker/daterangepicker.js"></script>


<script>
function detailItem(kodeinv) {
    // alert('muncul');
    $.ajax({
        type: "post",
        url: "/kembalibarang/detailItem",
        data: {
            kodeinv: kodeinv
        },
        dataType: "json",
        success: function(response) {
            $('.viewModal').html(response.data).show();
            $('#modalDetailItem').modal('show');
            $('#modalDetailItemTitle').text('Detail Item | No. Faktur : ' + kodeinv);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + '\n' + thrownError);
        }
    });
}

function print() {
    var start = moment().subtract(29, 'days');
    var end = moment();
    $.ajax({
        type: "POST",
        url: "printLap",
        data: {
            tanggal: $('#reservation').val(),
            startDate: start.format('MMMM D, YYYY'),
            endDate: end.format('MMMM D, YYYY'),
        },
        dataType: "json",
        success: function(response) {
            alert(response);
        }
    });
}



// function listdata() {
//     startdate = moment(event.start).format('YYYY-MM-DD');
//     enddate = moment(event.end).format('Y-MM-DD');
//     $.ajax({
//         type: "POST",
//         url: "listdata",
//         data: {
//             tanggal: $('#reservation').val(),
//             startDate: startdate,
//             endDate: enddate,
//         },
//         dataType: "json",
//         success: function(e) {
//             alert('sukses ' + $('#reservation').val());
//             // $('.viewModal').html(response.data);
//         }
//     });
// }


// $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
//     startdate = ;
//     enddate = moment(event.end).format('Y-MM-DD');
// });

$(document).ready(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();
    // var table = $('#tablelistdata').DataTable({
    //     scrollX: true,
    // });
    // 

    var table = $('#tablelistdata').DataTable({
        scrollX: true,
        searching: false,
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?= site_url('lpb/listtabeldata') ?>",
            type: "POST",
            data: function(d) {
                d.startDate = $('#tglawal').val();
                d.endDate = $('#tglakhir').val();
            }
        },
        columns: [{
                data: '',
                orderable: false
            },
            {
                data: 'kkdinv',
                orderable: false
            },
            {
                data: 'kegiatan',
                orderable: false
            },
            {
                data: 'tanggalpemakaian',
                name: 'tglpinjam',
                orderable: false
            },
            {
                data: 'tanggalpengembalian',
                name: 'tglkembali',
                orderable: false
            },
            {
                data: 'stakeholder',
                orderable: false
            },
            {
                data: 'lokasi',
                orderable: false

            },
            {
                data: 'jmlalat',
                orderable: false
            },
        ]
    });

    function cb(start, end) {
        console.log("Callback has been called!");
        console.log(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $.ajax({
            type: "POST",
            url: "listdata",
            data: {
                tanggal: $('#reservation').val(),
                startDate: start.format('MMMM D, YYYY'),
                endDate: end.format('MMMM D, YYYY'),
            },
            dataType: "json",
            success: function(response) {
                $('.listdatalpb').show();
                $('.listdatalpb').html(response.data);
                $('#tglawal').val(start.format('MMMM D, YYYY'));
                $('#tglakhir').val(end.format('MMMM D, YYYY'));
                table.ajax.reload();
                $('.tombolprint').show();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + thrownError);
            }
        });
    }

    $('#reservation').daterangepicker({
            startDate: start,
            endDate: end,
            minDate: '01/01/2020',
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1)
                    .endOf('month')
                ]
            },
            opens: 'right',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'DD/MM/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom Range',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                    'September', 'October', 'November', 'December'
                ],
                firstDay: 0
            }
        }, cb
        // function(start, end) {
        //     console.log("Callback has been called!");
        //     startDate = start;
        //     endDate = end;
        //    
        //     console.log(startDate.format('D MMMM YYYY') + ' - ' + endDate.format('D MMMM YYYY'))
        // }
    );




});
</script>

<?= $this->endSection('jspage')?>