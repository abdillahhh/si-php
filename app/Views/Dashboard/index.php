<?= $this->extend('layout/template'); ?>

<?php if (allowHalaman(session('level_id'), 'Dashboard')) : ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 fw-bold">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">
                            <h3 style="font-size: 70px;">44</h3>

                            <p style="font-weight: bold;">Jumlah Kegiatan</p>
                        </div>

                        <a href="#" class="selanjutnya">
                            <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">
                            <h3 style="font-size: 70px;">23</h3>

                            <p style="font-weight: bold;">Sedang dikerjakan</p>
                        </div>

                        <a href="#" class="selanjutnya">
                            <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">
                            <h3 style="font-size: 70px;">9</h3>

                            <p style="font-weight: bold;">Belum Dikerjakan</p>
                        </div>

                        <a href="#" class="selanjutnya">
                            <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6 widget" style="cursor: pointer;">
                    <!-- small box -->
                    <div class="small-box" style="border: 1px solid gray; padding: 0;">
                        <div class="inner" style="color: #55415C; padding-left: 15px;">
                            <h3 style="font-size: 70px;">12</h3>

                            <p style="font-weight: bold;">Selesai</p>
                        </div>

                        <a href="#" class="selanjutnya">
                            <p style="margin:0;">More info</p> <i class="fas fa-arrow-circle-down"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </section>

    <!-- CALENDAR -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="mb-3">
                        <div class="card">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- LINE CHART -->
                <div class="col-md-5">
                    <div class=" mb-3">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Ini Line Chart</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">820</span>
                                        <span>Visitors Over Time</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        <span class="text-success">
                                            <i class="fas fa-arrow-up"></i> 12.5%
                                        </span>
                                        <span class="text-muted">Since last week</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <canvas id="visitors-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square" style="color: #3C4B64;"></i> Minggu Ini
                                    </span>

                                    <span>
                                        <i class="fas fa-square" style="color: #E2D7E1;"></i> Minggu lalu
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('dist/js/pages/dashboard.js') ?>"></script>
<?= $this->endSection(); ?>
<?php endif; ?>