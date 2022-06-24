<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Laporan Harian</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- TABLE HEADER-->
            <div class="card card-primary card-outline" style="border: #3c4b64;">
                <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-6 py-1">
                            <div class="input-group input-group-md" style="width: 250px">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search" />
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                        <form method="" action="" class="col-md-5 py-1">
                            <div class="input-group">
                                <select class="form-control mr-2" style="border-radius: 5px;">
                                    <option selected disabled>- Pilih Tanggal -</option>
                                    <option>Terbaru</option>
                                    <option>Kemarin</option>
                                    <option>7 Hari yang lalu</option>
                                    <option>30 Hari yang lalu</option>
                                    <option>Bulan yang lalu</option>
                                </select>
                                <select class="form-control mr-2" style="border-radius: 5px;">
                                    <option selected disabled>- Pilih Status -</option>
                                    <option>Status</option>
                                    <option>Selesai</option>
                                    <option>Proses</option>
                                    <option>Belum</option>
                                </select>

                                <button type="button" id="enableEdit" class="btn btn-info tombol mr-2"
                                    style="background-color: #3c4b64; border:none;"><i
                                        class="fas fa-download"></i></button>
                                <a href="<?= base_url('/inputKegiatan'); ?>" type="button" id="enableEdit"
                                    class="btn btn-info tombol" style="background-color: #3c4b64; border:none;"><i
                                        class="fas fa-plus mr-2"></i> Tambah</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>TANGGAL</th>
                                        <th>URAIAN KEGIATAN</th>
                                        <th>HASIL KEGIATAN</th>
                                        <th>BUKTI DUKUNG</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>11-7-2014</td>
                                        <td>
                                            <ul>
                                                <li>Lorem, ipsum dolor.</li>
                                                <li>Lorem, ipsum dolor.</li>
                                            </ul>
                                        </td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td><span class="badge bg-success">selesai</span></td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-info btn-xs tombol"
                                                style="background-color: #E18939; border:none;"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="#" type="button" class="btn btn-info btn-xs tombol"
                                                style="background-color: #2D95C9; border:none;"><i
                                                    class="fas fa-pen"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>11-7-2014</td>
                                        <td>
                                            <ul>
                                                <li>Lorem, ipsum dolor.</li>
                                                <li>Lorem, ipsum dolor.</li>
                                            </ul>
                                        </td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td>Lorem, ipsum dolor.</td>
                                        <td><span class="badge bg-warning">Proses</span></td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-info btn-xs tombol"
                                                style="background-color: #E18939; border:none;"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="#" type="button" class="btn btn-info btn-xs tombol"
                                                style="background-color: #2D95C9; border:none;"><i
                                                    class="fas fa-pen"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Menampilkan 6 data dari 33</p>
                                </div>
                                <div class="col-md-6">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item">
                                            <a class="page-link" href="#">&laquo;</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">&raquo;</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>

<?= $this->endSection(); ?>