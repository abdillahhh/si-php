<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Level</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Level</li>
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
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search" />
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
                            <div class="float-right">
                                <div class="input-group">
                                    <button type="button" class="btn btn-info tombol mr-2" style="background-color: #3c4b64; border:none;"><i class="fas fa-download"></i></button>
                                    <button type="button" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus mr-2"></i> Tambah</button>
                                </div>
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
                                        <th>LEVEL/ROLE</th>
                                        <th>HAK AKSES</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Monitoring</td>
                                        <td><button type="button" class="btn btn-info btn-xs tombol" style="background-color: #3c4b64; border:none;" data-toggle="modal" data-target="#modal-hakAkses">Edit Hak Akses</button></td>
                                        <td>
                                            <a href="#" type="button" class="btn btn-info btn-xs tombol" style="background-color: #E18939; border:none;"><i class="fas fa-eye"></i></a>
                                            <button type="button" class="btn btn-info btn-xs tombol" style="background-color: #2D95C9; border:none;" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-pen"></i></button>
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
    <!-- MODAL HAK AKSES -->
    <div class="modal fade" id="modal-hakAkses">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <form action="" method="POST" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Hak Akses Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body table-responsive p-0">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">NO.</th>
                                        <th>MENU</th>
                                        <th style="width: 60px">VIEW</th>
                                        <th style="width: 60px">ADD</th>
                                        <th style="width: 60px">EDIT</th>
                                        <th style="width: 60px">DELETE</th>
                                        <th style="width: 60px">PRINT</th>
                                        <th style="width: 60px">UPLOAD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Update software</td>
                                        <td class="sel">
                                            <label for="view" class="ikon-sel">
                                                <input class="d-none" type="checkbox" name="view" id="view" />
                                                <i class="far fa-times-circle text-red"></i>
                                            </label>
                                        </td>
                                        <td class="sel">
                                            <label for="add" class="ikon-sel">
                                                <input class="d-none" type="checkbox" name="add" id="add" />
                                                <i class="far fa-times-circle text-red"></i>
                                            </label>
                                        </td>
                                        <td class="sel">
                                            <label for="edit" class="ikon-sel">
                                                <input class="d-none" type="checkbox" name="edit" id="edit" />
                                                <i class="far fa-times-circle text-red"></i>
                                            </label>
                                        </td>
                                        <td class="sel">
                                            <label for="delete" class="ikon-sel">
                                                <input class="d-none" type="checkbox" name="delete" id="delete" checked />
                                                <i class="far fa-check-circle text-green"></i>
                                            </label>
                                        </td>
                                        <td class="sel">
                                            <label for="print" class="ikon-sel">
                                                <input class="d-none" type="checkbox" name="print" id="print" />
                                                <i class="far fa-times-circle text-red"></i>
                                            </label>
                                        </td>
                                        <td class="sel">
                                            <label for="upload" class="ikon-sel">
                                                <input class="d-none" type="checkbox" name="upload" id="upload" />
                                                <i class="far fa-times-circle text-red"></i>
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- MODAL TAMBAH LEVEL -->
    <div class="modal fade" style="padding-top: 13%;" id="modal-tambah">
        <div class="modal-dialog">
            <form action="" method="POST" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Level</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Level</label>
                        <input type="nama_level" name="nama_level" class="form-control" placeholder="Nama Level ...">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- MODAL EDIT LEVEL -->
    <div class="modal fade" style="padding-top: 13%;" id="modal-edit">
        <div class="modal-dialog">
            <form action="" method="POST" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Level</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Level</label>
                        <input type="nama_level" name="nama_level" class="form-control" placeholder="Nama Level ...">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            if ($(this).prop('checked') == true) {
                $(this).siblings().addClass('fa-check-circle text-green').removeClass('fa-times-circle text-red')
            } else if ($(this).prop('checked') == false) {
                $(this).siblings().removeClass('fa-check-circle text-green').addClass('fa-times-circle text-red')
            }
        })
    })
</script>

<?= $this->endSection(); ?>