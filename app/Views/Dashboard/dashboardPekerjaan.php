<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold">Dashboard Pekerjaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="form-group">
                <form action="<?= base_url('/dashboardPekerjaan') ?>" method="GET" id="filterForm">
                    <label for="Tanggal">Pilih Periode</label>
                    <div class="d-flex align-items-center">
                        <input type="month" class="form-control" name="selected_date" id="Tanggal" style="max-width: 295px;" value="<?= esc($selectedDate) ?>">
                        <button type="submit" class="btn btn-sm btn-primary ml-2">Filter</button>
                            <a href="<?= base_url('/dashboardPekerjaan/showAll') ?>" class="btn btn-sm btn-secondary ml-2">Tampilkan Keseluruhan</a>
                    </div>
                </form>
            </div>




            <div class="row">
            <div class="col-md-3">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Total Pekerjaan Berdasarkan Status Penyelesaian</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="paiChartPenyelesaian" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                    <img class="img-fluid rounded" style="width: 100%;" src="<?= base_url('/images/bps.png') ?>">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 d-flex justify-content-center align-items-center flex-column" style="min-height: 313px;  height: 313px;  max-height: 313px;">
                                    <h6>DATABASE PEKERJAAN</h6>
                                    <h2 class="fa-3x"><strong id="jam"></strong></h2>
                                    <h6 id="hari-ini"></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Tingkat Penyelesaian (Selesai dan Belum Selesai)</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div> -->
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Total Pekerjaan Berdasarkan Kab Kota</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartGolongan" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Total Pekerjaan Berdasarkan Fungsi</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartTotalFungsi" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Skor Rata-Rata Fungsi</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartSkorFungsi" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Skor Rata-Rata BPS Kab/Kota</strong></h6>
                        </div>
                        <div class="card-body">
                            <canvas id="barChartPeringkat" style="min-height: 250px;  height: 250px;  max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Pekerjaan Fungsi Umum</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartFungsiUmum" style="min-height: 250px;  height:800px;  max-height: 1000px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Pekerjaan Fungsi Sosial</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartFungsiSosial" style="min-height: 250px;  height:800px;  max-height: 1000px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Pekerjaan Fungsi Neraca</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartFungsiNeraca" style="min-height: 250px;  height:800px;  max-height: 1000px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Pekerjaan Fungsi Produksi</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartFungsiProduksi" style="min-height: 250px;  height:800px;  max-height: 1000px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Pekerjaan Fungsi Distribusi</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartFungsiDistribusi" style="min-height: 250px;  height:800px;  max-height: 1000px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-0 pt-4">
                            <h6 class="text-center"><strong>Pekerjaan Fungsi IPDS</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <canvas class="embed-responsive-item" id="barChartFungsiIPDS" style="min-height: 250px;  height:800px;  max-height: 1000px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>


    <!-- /.content -->
</div>
<!-- ChartJS -->
<script src="<?= base_url('/plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('/js/tanggal.js') ?>"></script>
<!-- BARCHART -->
<script>

    var pekerjaanChartData = {
        labels: [
            <?php if ($list_satker != null) : ?>
                <?php for ($i = 2 ; $i<13 ; $i++) : ?> 
                    "<?= $list_satker[$i]['kd_satker']; ?>",
                <?php endfor; ?>
            <?php endif; ?>
        ],
        datasets: [{
            backgroundColor: "#3c4b64",
            data: [<?php if ($list_pekerjaan_kab != null) : ?>
                    <?php for ($g = 2; $g < 13; $g++) : ?>
                        <?= isset($list_pekerjaan_kab[$g]) ? $list_pekerjaan_kab[$g]['count'] : 0; ?>,
                    <?php endfor ?>
                <?php endif; ?>
            ],
        }],
    };

    console.log(pekerjaanChartData);

    var peringkatChartData = {
        labels: [
            <?php if ($list_satker != null) : ?>
                <?php for ($i = 2 ; $i<13 ; $i++) : ?> 
                    "<?= $list_satker[$i]['kd_satker']; ?>",
                <?php endfor; ?>
            <?php endif; ?>
        ],
        datasets: [{
            backgroundColor: "#3c4b64",
            data: [<?php if ($list_peringkat_kab != null) : ?>
                    <?php for ($g = 2; $g < 13; $g++) : ?>
                        <?= isset($list_peringkat_kab[$g]) ? $list_peringkat_kab[$g]['average_score'] : 0; ?>,
                    <?php endfor ?>
                <?php endif; ?>
            ],
        }],
    };

    var skorFungsiChartData = {
        labels: [
            <?php if ($list_es3 != null) : ?>
                <?php for ($i = 1 ; $i<7 ; $i++) : ?> 
                    "<?= $list_es3[$i]['deskripsi']; ?>",
                <?php endfor; ?>
            <?php endif; ?>
        ],
        datasets: [{
            backgroundColor: "#3c4b64",
            data: [<?php if ($list_peringkat_fungsi != null) : ?>
                    <?php for ($g = 0; $g < 7; $g++) : ?>
                         <?= isset($list_peringkat_fungsi[$g]) ? $list_peringkat_fungsi[$g]['average_score'] : 0; ?>,
                    <?php endfor ?>
                <?php endif; ?>
            ],
        }],
    };

    var totalFungsiChartData = {
        labels: [
            <?php if ($list_es3 != null) : ?>
                <?php for ($i = 1 ; $i<7 ; $i++) : ?> 
                    "<?= $list_es3[$i]['deskripsi']; ?>",
                <?php endfor; ?>
            <?php endif; ?>
        ],
        datasets: [{
            backgroundColor: "#3c4b64",
            data: [<?php if ($list_pekerjaan_fungsi != null) : ?>
                    <?php for ($g = 1; $g < 7; $g++) : ?>
                        <?= $list_pekerjaan_fungsi[$g]['count']; ?>,
                    <?php endfor ?>
                <?php endif; ?>
            ],
        }],
    };

    var penyelesaianChartData = {
    labels: ["Selesai", "Belum Selesai"],
    datasets: [{
        data: [
            <?= isset($status_penyelesaian[1]['count']) ? $status_penyelesaian[1]['count'] : 0; ?>, 
            <?= isset($status_penyelesaian[0]['count']) ? $status_penyelesaian[0]['count'] : 0; ?>
        ],
        backgroundColor: [
            "#3c4b64",
            "#e3bfe0",
        ],
    }]
};



    

    // var barChartPendidikanCanvas = $("#barChartPendidikan").get(0).getContext("2d");
    var barChartGolonganCanvas = $("#barChartGolongan").get(0).getContext("2d");
    var barChartPeringkatCanvas = $("#barChartPeringkat").get(0).getContext("2d");
    var barChartSkorFungsiCanvas = $("#barChartSkorFungsi").get(0).getContext("2d");
    var barChartTotalFungsiCanvas = $("#barChartTotalFungsi").get(0).getContext("2d");
    var pieChartPenyelesaianCanvas = $("#paiChartPenyelesaian").get(0).getContext("2d");

    // var barChartFungsiUmum = $("#barChartFungsiUmum").get(0).getContext("2d");
    // var barChartFungsiSosial = $("#barChartFungsiSosial").get(0).getContext("2d");
    // var barChartFungsiNeraca = $("#barChartFungsiNeraca").get(0).getContext("2d");
    // var barChartFungsiProuksi = $("#barChartFungsiProduksi").get(0).getContext("2d");
    // var barChartFungsiDistribusi = $("#barChartFungsiDistribusi").get(0).getContext("2d");
    // var barChartFungsiIPDS = $("#barChartFungsiIPDS").get(0).getContext("2d");


    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        legend: false,
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: false,
                },
                ticks: {
                    autoSkip: false, // Disable auto-skipping of labels
                    maxRotation: 90, // Rotate labels by 90 degrees
                    minRotation: 0, // Minimum rotation angle
                },
            }, ],
            yAxes: [{
                display: true,
                gridLines: {
                    display: true,
                },
                ticks: {
                beginAtZero: true, // Start y-axis from 0
                },
            }],
        },
    };

    var barChartOptionsSkor = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false,
    legend: false,
    scales: {
        xAxes: [{
            display: true,
            gridLines: {
                display: false,
            },
            ticks: {
                autoSkip: false,
                maxRotation: 90,
                minRotation: 0,
            },
        }],
        yAxes: [{
            display: true,
            gridLines: {
                display: true,
            },
            ticks: {
                suggestedMin: 0,  // Mulai dari nilai 0
                suggestedMax: 5,  // Berakhir pada nilai 5
            },
        }],
    },
};


    var pieChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            position: 'bottom'
        }
    };

    // new Chart(barChartPendidikanCanvas, {
    //     type: "bar",
    //     data: areaChartData,
    //     options: barChartOptions,
    // });
    new Chart(barChartGolonganCanvas, {
        type: "bar",
        data: pekerjaanChartData,
        options: barChartOptions,
    });

    new Chart(barChartPeringkatCanvas, {
    type: "bar",
    data: peringkatChartData,
    options: barChartOptionsSkor, // Pastikan variabel barChartOptions sudah terdefinisi
    });

    new Chart(barChartSkorFungsiCanvas, {
    type: "bar",
    data: skorFungsiChartData,
    options: barChartOptionsSkor, // Pastikan variabel barChartOptions sudah terdefinisi
    });

    new Chart(barChartTotalFungsiCanvas, {
    type: "bar",
    data: totalFungsiChartData,
    options: barChartOptions, // Pastikan variabel barChartOptions sudah terdefinisi
    });

    new Chart(pieChartPenyelesaianCanvas, {
    type: "pie",
    data: penyelesaianChartData,
    options: pieChartOptions, // Pastikan variabel barChartOptions sudah terdefinisi
    });

    // new Chart(barChartFungsiUmum, {
    //     type: "horizontalBar",
    //     data: fungsiUmumChartData,
    //     options: barChartOptions,
    // });
    // new Chart(barChartFungsiSosial, {
    //     type: "horizontalBar",
    //     data: fungsiSosialChartData,
    //     options: barChartOptions,
    // });
    // new Chart(barChartFungsiNeraca, {
    //     type: "horizontalBar",
    //     data: fungsiNeracaChartData,
    //     options: barChartOptions,
    // });
    // new Chart(barChartFungsiProduksi, {
    //     type: "horizontalBar",
    //     data: fungsiProduksiChartData,
    //     options: barChartOptions,
    // });
    // new Chart(barChartFungsiDistribusi, {
    //     type: "horizontalBar",
    //     data: fungsiDistribusiChartData,
    //     options: barChartOptions,
    // });
    // new Chart(barChartFungsiIPDS, {
    //     type: "horizontalBar",
    //     data: fungsiIPDSChartData,
    //     options: barChartOptions,
    // });
</script>

<!-- DONUT -->
<script>

    let searchParams = new URLSearchParams(window.location.search)
    searchParams.has('satker_choose') // true

    if (searchParams.has('satker_choose')) {
        $('.reset-satker').removeClass('d-none')
    }
    let param = searchParams.get('satker_choose')
    $('#satker_choose').val(param)
    $(document).on('change', '#satker_choose', function() {
        $('#btn-submit').click()

        $(this).val()
    })


    var date = new Date();

    var currentDate = '<?php

                        use CodeIgniter\I18n\Time;

                        $myTime = Time::today('Asia/Jakarta');
                        echo $myTime->toLocalizedString('yyyy-MM-dd');
                        ?>';
    document.getElementById('hari-ini').value = currentDate;

    $('#hari-ini').html(ubahFormatTanggal(currentDate))

    setInterval(customClock, 500);

    function customClock() {
        var time = new Date();
        var hrs = (time.getHours() < 10 ? '0' : '') + time.getHours();
        var min = (time.getMinutes() < 10 ? '0' : '') + time.getMinutes();
        var sec = time.getSeconds();

        document.getElementById('jam').innerHTML = hrs + ":" + min + " WIB";
    }

    
</script>

<?= $this->endSection(); ?>