<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary">
                        <form action="" method="POST" class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid" src="/images/1.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><strong id="nama-lengkap">Nina Mcintire</strong> <button type="button" id="enableEdit" class="btn btn-info btn-xs tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-pen"></i></button></h3>

                            <p class="text-muted text-center">Software Engineer</p>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username ..." disabled>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label>Nama lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap ..." disabled>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email ..." disabled>
                            </div>
                            <hr>
                            <div class="d-none" id="button">
                                <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
                                <button type="button" id="batal" class="btn btn-danger" style=" border:none;">Batal</button>
                                <button type="button" class="btn btn-info" style="border: none;" data-toggle="modal" data-target="#modal-ubah-password">Ubah Password</button>
                            </div>
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-8">

                    <!-- DATA PEGAWAI-->
                    <div class="card card-primary card-outline" style="border: #3c4b64;">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Data Kepegawaian</strong></h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>NIP Lama</strong>

                                    <p class="text-muted">
                                        131689211
                                    </p>

                                    <hr>

                                    <strong>NIP Baru</strong>

                                    <p class="text-muted">19901109 201402 1 007</p>

                                    <hr>

                                    <strong>Nama Lengkap</strong>

                                    <p class="text-muted">
                                        Nina Mcintire
                                    </p>

                                    <hr>

                                    <strong> Notes</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>NIP Lama</strong>

                                    <p class="text-muted">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </p>

                                    <hr>

                                    <strong>NIP Baru</strong>

                                    <p class="text-muted">Malibu, California</p>

                                    <hr>

                                    <strong>Nama Lengkap</strong>

                                    <p class="text-muted">
                                        <span class="tag tag-danger">UI Design</span>
                                        <span class="tag tag-success">Coding</span>
                                        <span class="tag tag-info">Javascript</span>
                                        <span class="tag tag-warning">PHP</span>
                                        <span class="tag tag-primary">Node.js</span>
                                    </p>

                                    <hr>

                                    <strong> Notes</strong>

                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                </div>
                            </div>



                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
</div>
<!-- MODAL UBAH PASSWORD -->
<div class="modal fade" style="padding-top: 11%;" id="modal-ubah-password">
    <div class="modal-dialog">
        <form action="" method="POST" class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password ...">
                </div>
                <div class="form-group">
                    <label>Token</label>
                    <input type="text" name="token" class="form-control" placeholder="Token ...">
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

<script>
    $(document).on('input', "#nama", function() {
        $('#nama-lengkap').html($('#nama').val());
    });
</script>
<script>
    const enableEdit = document.querySelector('#enableEdit');
    const button = document.querySelector('#button');
    const batal = document.querySelector('#batal');
    const inputan = document.getElementsByTagName('input');

    enableEdit.addEventListener('click', function() {
        for (i = 0; i < inputan.length; i++) {
            inputan[i].disabled = false;
        }
        button.classList.remove('d-none');
        enableEdit.classList.add('d-none');
    })
    batal.addEventListener('click', function() {
        for (i = 0; i < inputan.length; i++) {
            inputan[i].disabled = true;
        }
        button.classList.add('d-none');
        enableEdit.classList.remove('d-none');
    })
</script>

<?= $this->endSection(); ?>