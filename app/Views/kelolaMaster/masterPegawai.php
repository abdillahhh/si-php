<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Master Pegawai</li>
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
                                    <img class="img-fluid" style="width: 100%;" src="<?= base_url('images/default.jpg') ?>" alt="">
                                </div>
                                <div class="col-md-6 p-2">
                                    <h2 class="font-weight-bold">John Doe</h2>
                                    <p class="text-gray">Administrator</p>
                                    <button id="openInputan" class="btn btn-info btn-sm tombol" style="background-color: #2D95C9; border:none;"><i class="fas fa-pen mr-1"></i> Edit Data</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <!-- FORM -->
                                <form action="" method="POST" enctype="multipart/form-data" class="col-md-12 px-5">
                                    <!-- KETERANGAN -->
                                    <div id="keterangan" class="col-md-12">
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
                                    <!-- INPUT -->
                                    <div id="inputan" class="col-md-12 d-none">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" name="nip" class="form-control" placeholder="NIP ..." value="19901109 201402 1 007">
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat/Tanggal Lahir</label>
                                            <input type="text" name="ttl" class="form-control" placeholder="Tempat/Tanggal Lahir ..." value="Jambi, 1 Januari 1998">
                                        </div>
                                        <div class="form-group">
                                            <label>Jennis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control mr-2" style="border-radius: 5px;">
                                                <option selected disabled>- Pilih Jenis Kelamin -</option>
                                                <option selected>Laki-laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="telephone" name="telepon" class="form-control" placeholder="Nomor telepon ..." value="0812 3456 7890">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat ...">Jl.A. Yani No.4 Telanaipura, Jambi, Indonesia, Telp (62-741) 60497, Mailbox :bps1500@bps.go.id</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Foto </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="exampleInputFile" />
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
                                            <button type="button" id="batal" class="btn btn-danger" style=" border:none;">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4>Daftar Pegawai</h4>
                        </div>
                        <form class="col-md-6">
                            <div class="input-group">
                                <select class="form-control mr-2" style="border-radius: 5px;">
                                    <option selected disabled>- Pilih Bidang -</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Super Admin</option>
                                </select>
                                <button id="btn-tambah" type="button" class="btn btn-info tombol" data-toggle="modal" data-target="#modal-tambah" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i> Tambah</button>
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

<!-- MODAL TAMBAH PEGAWAI -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <form action="<?= base_url() ?>" method="POST" class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIP Lama</label>
                            <input type="text" name="nip_lama" class="form-control" placeholder="NIP Lama ...">
                        </div>
                        <div class="form-group">
                            <label>NIP Baru</label>
                            <input type="text" name="nip_baru" class="form-control" placeholder="NIP Baru ...">
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai ...">
                        </div>
                        <div class="form-group">
                            <label>Golongan</label>
                            <select name="gol_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="">GOLONGAN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun Tamat</label>
                            <input type="date" name="tmt" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="">Jabatan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan Jabatan</label>
                            <textarea name="ket_jabatan" rows='5' class="form-control" placeholder="Keterangan Jabatan ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pendidikan</label>
                            <select name="pendidikan_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="">Pendidikan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun Pendidikan</label>
                            <input type="text" name="tahun_pdd" class="form-control" placeholder="Masukkan Tahun Pendidikan ...">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Satker</label>
                            <select name="satker_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="">satker</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Es3</label>
                            <select name="es3_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="">es3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Es4</label>
                            <select name="ss4_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="">Es4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fungsional</label>
                            <select name="fungsional_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option value="">Fungsional</option>
                            </select>
                        </div>
                    </div>
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
    $(document).on('click', '#openInputan', function() {
        $('#keterangan').toggleClass('d-none');
        $('#inputan').toggleClass('d-none');
    })
    $(document).on('click', '#batal', function() {
        $('#keterangan').removeClass('d-none');
        $('#inputan').addClass('d-none');
    })
</script>

<?= $this->endSection(); ?>