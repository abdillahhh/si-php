<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <img class="img-fluid" style="width: 100%;" src="/images/default.jpg" alt="">
                                </div>
                                <div class="col-md-6 p-2">
                                    <h2 class="font-weight-bold">John Doe</h2>
                                    <p id="oldRole" class="text-gray">Administrator</p>
                                    <!-- FORM -->
                                    <form action="" method="POST" enctype="multipart/form-data" id="roleForm" class="row d-none">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select name="jenis_kelamin" class="form-control form-control-sm mr-2" style="border-radius: 5px;">
                                                    <option selected disabled>- Pilih Role -</option>
                                                    <option>Regular User</option>
                                                    <option>Pegawai</option>
                                                    <option>Admin Kepegawaian</option>
                                                    <option>Administrasi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                                            <button type="button" id="cancel" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                        </div>
                                    </form>
                                    <button id="openRole" class="btn btn-info btn-sm tombol" style="background-color: #2D95C9; border:none;"><i class="fas fa-pen mr-1"></i> Ubah Role</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 px-5">
                                    <!-- KETERANGAN -->
                                    <div class="col-md-12">
                                        <strong>NIP</strong>
                                        <p class="text-muted">
                                            19901109 201402 1 007
                                        </p>

                                        <strong>Tempat/tanggal lahir</strong>
                                        <p class="text-muted">Jambi, 1 Januari 1998</p>

                                        <strong>Telepon</strong>
                                        <p class="text-muted">
                                            0812 3456 7890
                                        </p>

                                        <strong>Alamat</strong>
                                        <p class="text-muted">Jl.A. Yani No.4 Telanaipura, Jambi, Indonesia, Telp (62-741) 60497, Mailbox :bps1500@bps.go.id</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4>Daftar User</h4>
                        </div>
                        <form class="col-md-6">
                            <div class="input-group">
                                <select class="form-control mr-2" style="border-radius: 5px;">
                                    <option selected disabled>- Pilih Role -</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Super Admin</option>
                                </select>
                                <a href="/tambahUser" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i> Tambah</a>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="input-group input-group-md pt-3 px-4" style="width: 250px">
                                    <input type="search" name="table_search" class="form-control float-right" placeholder="Search" />
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive px-4">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>USERNAME</th>
                                                <th>ROLE</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>John Doe</td>
                                                <td>
                                                    Administrasi
                                                </td>
                                                <td>
                                                    <a href="#" type="button" class="btn btn-info btn-xs tombol pb-0" style="background-color: #E18939; border:none;"><i class="fas fa-plus"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>David M. Adams</td>
                                                <td>
                                                    Regular User
                                                </td>
                                                <td>
                                                    <a href="#" type="button" class="btn btn-info btn-xs tombol pb-0" style="background-color: #E18939; border:none;"><i class="fas fa-plus"></i></a>
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
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    const openRole = document.querySelector('#openRole');
    const cancel = document.querySelector('#cancel');
    const roleForm = document.querySelector('#roleForm');
    const oldRole = document.querySelector('#oldRole');

    openRole.addEventListener('click', function() {
        roleForm.classList.toggle('d-none');
        openRole.classList.toggle('d-none');
        oldRole.classList.toggle('d-none');
    })
    cancel.addEventListener('click', function() {
        roleForm.classList.toggle('d-none');
        openRole.classList.toggle('d-none');
        oldRole.classList.toggle('d-none');
    })
</script>
<?= $this->endSection(); ?>