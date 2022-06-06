<?= $this->extend('main/layout');?>


<?= $this->section('judul')?>
Dashboard
<?= $this->endSection('judul')?>

<?= $this->section('subjudul')?>
<b>Garfik</b>
<?= $this->endSection('subjudul')?>

<?= $this->section('isi')?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- PIE CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Jenis Stakeholder</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Pemakaian Peralatan Perbulan Tahun <?= date('Y'); ?></h3>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
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
<?= $this->endSection('isi')?>

<?= $this->Section('jspage')?>
<script src="<?=base_url()?>/plugins/chart.js/Chart.min.js"></script>
<script>
$(document).ready(function() {
    var donutData;
    var table = $('#tablelistdata').DataTable({
        scrollX: true,
        searching: false,
        processing: true,
        serverSide: true,
        ajax: "<?= site_url('main/listdatatabel') ?>",
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

    $.ajax({
        type: "POST",
        url: "<?= site_url('main/datadashboard') ?>",
        dataType: "json",
        success: function(response) {
            // alert(response.pai.toString());
            var donutData = {
                labels: response.label,
                datasets: [{
                    data: response.dtg,
                    backgroundColor: ['#00c0ef', '#00a65a'],
                }]
            }

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.

            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })



            var areaChartData = {
                labels: response.labelbar,
                datasets: [{
                    label: 'Data Penggunaan Peralatan',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: response.databar
                }]
            }

            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                        }
                    }]
                }
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions

            })
        }
    });




});
</script>
<?= $this->endSection('jspage')?>