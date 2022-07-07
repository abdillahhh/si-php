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
                        <form action="" method="POST" enctype="multipart/form-data" class="card-body box-profile">

                            <div class="text-center">

                                <img class="profile-user-img img-fluid" src="<?= base_url('/images/profil/' . $data_profil_user['image']) ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><strong id="username-lengkap"><?= $data_profil_user['username']; ?></strong> <button type="button" id="enableEdit" class="btn btn-info btn-xs tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-pen"></i></button></h3>
                            <p class="text-muted text-center">
                                <?php foreach ($list_level as $level) : ?>
                                    <?= $level['nama_level'] ?> |
                                <?php endforeach; ?>
                            </p>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" id="username" name="username" class="form-control" value="<?= $data_profil_user['username']; ?>" disabled>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label>Nama lengkap</label>
                                <input type="text" name="nama" class="form-control" value="<?= $data_profil_user['fullname']; ?>" disabled>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $data_profil_user['email']; ?>" disabled>
                            </div>
                            <hr>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" value="<?= $data_profil_user['image']; ?>" disabled />
                                    <label class="custom-file-label" for="exampleInputFile"><?= $data_profil_user['image']; ?></label>
                                </div>
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
                    <div class="card card-primary card-outline" style="border: none;">
                        <div class="card-header" style="background-color: #3c4b64; color: white;">
                            <h3 class="card-title">Data Kepegawaian</h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3" style="background-color: #ebebeb;">
                                        <div class="col-12 py-1">
                                            <i>title here</i>
                                        </div>
                                    </div>
                                    <strong>NIP Lama</strong>
                                    <p class="text-muted">
                                        <?= $data_pegawai_user['nip_lama']; ?>
                                    </p>
                                    <hr>

                                    <strong>NIP Baru</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['nip_baru']; ?></p>
                                    <hr>

                                    <strong>Nama Lengkap</strong>
                                    <p class="text-muted">
                                        <?= $data_pegawai_user['nama_pegawai']; ?>
                                    </p>
                                    <hr>

                                    <strong>Tanggal Lahir</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['tgl_lahir']; ?></p>
                                    <hr>

                                    <strong>Jenis Kelamin</strong>
                                    <p class="text-muted">
                                        <?= ($data_pegawai_user['jk'] == 1) ? 'Laki-laki' : 'Perempuan' ?>
                                    </p>

                                    <div class="row mt-4 mb-3" style="background-color: #ebebeb;">
                                        <div class="col-12 py-1">
                                            <i>Pendidikan</i>
                                        </div>
                                    </div>

                                    <strong>Tingkat Pendidikan</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['tk_pendidikan']; ?></p>
                                    <hr>

                                    <strong>Tahun Pendidikan</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['tahun_pdd']; ?></p>
                                    <hr>

                                    <strong>Tahun tamat</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['tmt']; ?></p>

                                    <div class="row mt-4 mb-3" style="background-color: #ebebeb;">
                                        <div class="col-12 py-1">
                                            <i>title here</i>
                                        </div>
                                    </div>

                                    <strong>Jabatan</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['nama_jabatan']; ?></p>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong>Keterangan Jabatan</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['ket_jabatan']; ?></p>
                                    <hr>

                                    <strong>Golongan</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['golongan']; ?></p>
                                    <hr>

                                    <strong>Jabatan fungsional</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['jabatan_fungsional']; ?></p>
                                    <hr>

                                    <strong>Kode fungsional</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['fungsional_kd']; ?></p>

                                    <div class="row mt-4 mb-3" style="background-color: #ebebeb;">
                                        <div class="col-12 py-1">
                                            <i>title here</i>
                                        </div>
                                    </div>

                                    <strong>Kode Satker</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['satker_kd']; ?></p>
                                    <hr>
                                    <strong>Satker</strong>

                                    <p class="text-muted"> <?= $data_pegawai_user['satker']; ?></p>
                                    <hr>

                                    <strong>Kode es3</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['es3_kd']; ?></p>
                                    <hr>

                                    <strong>Kode es4</strong>
                                    <p class="text-muted"> <?= $data_pegawai_user['es4_kd']; ?></p>
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
    $(document).on('input', "#username", function() {
        $('#username-lengkap').html($('#username').val());
    });
</script>
<script>
    $(document).on('click', '#enableEdit', function() {
        $('#enableEdit').children().toggleClass('fa-times')
        $('#enableEdit').toggleClass('bg-danger')
        if ($('#username').is(':disabled')) {
            $('input').prop('disabled', false);
        } else {
            $('input').prop('disabled', true);
        }
        $('#button').toggleClass('d-none');
    })

    $(document).on('click', '#batal', function() {
        $('#enableEdit').children().toggleClass('fa-times')
        $('#enableEdit').toggleClass('bg-danger')
        if ($('#username').is(':disabled')) {
            $('input').prop('disabled', false);
        } else {
            $('input').prop('disabled', true);
        }
        $('#button').toggleClass('d-none');
    })
</script>

<?= $this->endSection(); ?>