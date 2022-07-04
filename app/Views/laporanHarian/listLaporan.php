<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Laporan Harian</li>
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

                                <button type="button" class="btn btn-info tombol mr-2" style="background-color: #3c4b64; border:none;"><i class="fas fa-download"></i></button>
                                <button type="button" data-toggle="modal" data-target="#modal-tambah" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i> Tambah</button>
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
                                        <th>BUTIR KEGIATAN</th>
                                        <th>TARGET</th>
                                        <th>BUKTI DUKUNG</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_laporan_harian as $list) : ?>
                                        <tr>
                                            <td><?= $list['id']; ?></td>
                                            <td><?= $list['tgl_kegiatan']; ?></td>
                                            <td><?= $list['judul_kegiatan']; ?></td>
                                            <?php foreach ($list_target as $target) : ?>
                                                <?php if ($list['kd_target'] == $target['id']) : ?>
                                                    <td><?= $target['nama_target'] ?></td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <td><?= $list['bukti_dukung']; ?></td>
                                            <?php $bg = '';
                                            $status = '' ?>
                                            <?php if ($list['status'] == 'S') {
                                                $bg = 'badge bg-success';
                                                $status = 'selesai';
                                                $class = 'text-success mb-5';
                                                $icon = 'far fa-check-circle text-success';
                                            } elseif ($list['status'] == 'P') {
                                                $bg = 'badge bg-warning text-success';
                                                $status = 'proses';
                                                $class = 'text-warning mb-5';
                                                $icon = 'fas fa-tasks text-warning '; //ganti
                                            } else {
                                                $bg = 'badge bg-danger';
                                                $status = 'belum';
                                                $class = 'text-danger mb-5';
                                                $icon = 'far fa-times-circle text-danger'; //ganti
                                            } ?>
                                            <td><span class="<?= $bg ?>"><?= $status; ?></span></td>
                                            <td>
                                                <?php foreach ($list_target as $target) : ?>
                                                    <?php if ($list['kd_target'] == $target['id']) : ?>
                                                        <button type="button" id="btn-detail" class="btn btn-info btn-xs tombol" style="background-color: #E18939; border:none;" data-toggle="modal" data-target="#modal-detail" data-detail_id_kegiatan="<?= $list['id'] ?>" data-detail_butir_kegiatan="<?= $list['judul_kegiatan'] ?>" data-detail_tgl_kegiatan="<?= $list['tgl_kegiatan'] ?>" data-detail_waktu_mulai="<?= $list['waktu_mulai'] ?>" data-detail_waktu_selesai="<?= $list['waktu_selesai'] ?>" data-detail_hasil_kegiatan="<?= $list['hasil_kegiatan'] ?>" data-detail_uraian_kegiatan="<?= $list['uraian_kegiatan'] ?>" data-detail_nama_target="<?= $target['nama_target'] ?>" data-detail_bukti_dukung="<?= htmlspecialchars($list['bukti_dukung']) ?>" data-detail_status="<?= $status ?>" data-detail_class_span="<?= $class ?>" data-detail_class_icon="<?= $icon ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <button type="button" id="btn-edit" class="btn btn-info btn-xs tombol" style="background-color: #2D95C9; border:none;" data-toggle="modal" data-target="#modal-edit" data-id_kegiatan="<?= $list['id'] ?>" data-butir_kegiatan="<?= $list['judul_kegiatan'] ?>" data-tgl_kegiatan="<?= $list['tgl_kegiatan'] ?>" data-waktu_mulai="<?= $list['waktu_mulai'] ?>" data-waktu_selesai="<?= $list['waktu_selesai'] ?>" data-hasil_kegiatan="<?= $list['hasil_kegiatan'] ?>" data-uraian_kegiatan="<?= $list['uraian_kegiatan'] ?>" data-kd_target="<?= $list['kd_target'] ?>" data-bukti_dukung="<?= htmlspecialchars($list['bukti_dukung']) ?>" data-status="<?= $list['status'] ?>">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

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

<!-- MODAL TAMBAH KEGIATAN -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="<?= base_url('/saveLaporanHarian'); ?>" method="POST" class="modal-content">
            <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Laporan Kegiatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="tgl_kegiatan">Butir Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="butir_kegiatan" placeholder="Masukkan Butir Kegiatan ..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="target">Target</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <select name="kd_target" id="versi_target" class="form-control">
                                <?php foreach ($list_target as $list) : ?>
                                    <option value="<?= $list['id']; ?>"><?= $list['nama_target']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- KALO TARGET JAM, INI MUNCUL. KALO TARGET LAINNYO, INI HIDDEN INPUT DISABLED. di modal edit samo-->
                <div class="row" id="versi_jam">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="tgl_kegiatan">Tanggal</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" class="form-control" id="tgl_kegiatan_tunggal" name="tgl_kegiatan" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- KALO TARGET LAINNYO, INI MUNCUL. KALO TARGET JAM, INI HIDDEN INPUT DISABLED-->
                <div class="row" id="versi_lain">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="tgl_kegiatan">Tanggal</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group date datetimepicker" data-target-input="nearest">
                                <div class="input-group-prepend">
                                    <span class="btn" style="background-color: #3c4b64; color: white;">Mulai</span>
                                </div>
                                <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group date datetimepicker" data-target-input="nearest">
                                <div class="input-group-prepend">
                                    <span class="btn" style="background-color: #3c4b64; color: white;">Selesai</span>
                                </div>
                                <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label>Waktu Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <div class="input-group date datetimepicker" id="timepicker" data-target-input="nearest">
                                    <div class="input-group-prepend">
                                        <span class="btn" style="background-color: #3c4b64; color: white;">Mulai</span>
                                    </div>
                                    <input type="text" name="waktu_mulai" class="form-control datetimepicker-input" data-target="#timepicker" />
                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>

                    <div class="col-md-5">
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <div class="input-group date datetimepicker" id="timepicker2" data-target-input="nearest">
                                    <div class="input-group-prepend">
                                        <span class="btn" style="background-color: #3c4b64; color: white;">Selesai</span>
                                    </div>
                                    <input type="text" name="waktu_selesai" class="form-control datetimepicker-input" data-target="#timepicker2" />
                                    <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="uraian_kegiatan">Uraian Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea class="form-control" name="uraian_kegiatan" rows="3" placeholder="Masukkan Uraian Kegiatan ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="hasil_kegiatan">Hasil Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea class="form-control" name="hasil_kegiatan" rows="3" placeholder="Masukkan Hasil Kegiatan ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="bukti_dukung">Bukti Dukung</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea id="bukti_dukung" name="bukti_dukung"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label>Status</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- select -->
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="S">Selesai</option>
                                <option value="P">Proses</option>
                                <option value="B">Belum</option>
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

<!-- MODAL EDIT KEGIATAN -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="<?= base_url('/updateLaporanHarian'); ?>" method="POST" class="modal-content">
            <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
            <div class="modal-header">
                <h4 class="modal-title">Edit Laporan Kegiatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="tgl_kegiatan">Butir Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="butir_kegiatan" id="butir_kegiatan" placeholder="Masukkan Butir Kegiatan ..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="target">Target</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <select id="kd_target" name="kd_target" class="form-control">
                                <?php foreach ($list_target as $list) : ?>
                                    <option value="<?= $list['id']; ?>"><?= $list['nama_target']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="versi_jam_edit">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="tgl_kegiatan">Tanggal</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" class="form-control" id="tgl_kegiatan" name="tgl_kegiatan" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="versi_lain_edit">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="tgl_kegiatan">Tanggal</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group date datetimepicker" data-target-input="nearest">
                                <div class="input-group-prepend">
                                    <span class="btn" style="background-color: #3c4b64; color: white;">Mulai</span>
                                </div>
                                <input type="date" id="tgl_mulai_edit" name="tgl_mulai_edit" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <div class="input-group date datetimepicker" data-target-input="nearest">
                                <div class="input-group-prepend">
                                    <span class="btn" style="background-color: #3c4b64; color: white;">Selesai</span>
                                </div>
                                <input type="date" id="tgl_akhir_edit" name="tgl_akhir_edit" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label>Waktu Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <div class="input-group date datetimepicker" id="timepicker3" data-target-input="nearest">
                                    <div class="input-group-prepend">
                                        <span class="btn" style="background-color: #3c4b64; color: white;">Mulai</span>
                                    </div>
                                    <input type="text" id="waktu_mulai" name="waktu_mulai" class="form-control datetimepicker-input" data-target="#timepicker3" />
                                    <div class="input-group-append" data-target="#timepicker3" data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>

                    <div class="col-md-5">
                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <div class="input-group date datetimepicker" id="timepicker4" data-target-input="nearest">
                                    <div class="input-group-prepend">
                                        <span class="btn" style="background-color: #3c4b64; color: white;">Selesai</span>
                                    </div>
                                    <input type="text" id="waktu_selesai" name="waktu_selesai" class="form-control datetimepicker-input" data-target="#timepicker4" />
                                    <div class="input-group-append" data-target="#timepicker4" data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <i class="far fa-clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="uraian_kegiatan">Uraian Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea class="form-control" id="uraian_kegiatan" name="uraian_kegiatan" rows="3" placeholder="Masukkan Uraian Kegiatan ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="hasil_kegiatan">Hasil Kegiatan</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea class="form-control" id="hasil_kegiatan" name="hasil_kegiatan" rows="3" placeholder="Masukkan Hasil Kegiatan ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label for="bukti_dukung">Bukti Dukung</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea name="bukti_dukung" id="bukti_dukung2"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="float-left">
                            <label>Status</label>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <!-- select -->
                        <div class="form-group">
                            <select id="status" name="status" class="form-control">
                                <option value="S">Selesai</option>
                                <option value="P">Proses</option>
                                <option value="B">Belum</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Update</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL DETAIL -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-3" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center" style="max-height: 300px;">
                                    <i id="detail_icon_status" style="font-size: 150px;"></i>
                                    <span style="font-size: 40px;" id="detail_status"></span>
                                </div>
                                <div class="col-md-8 border-left px-3">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <h1 id="detail_butir_kegiatan"></h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>Tanggal</strong>
                                            <p class="mt-2 py-1" id="detail_tgl_kegiatan"></p>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <strong class="">Waktu Pengerjaan</strong>
                                                <div class="mt-2">
                                                    <span class="badge badge-secondary py-1 px-3 mr-2" id="detail_waktu_mulai"></span> s/d <span class="badge badge-secondary py-1 px-3 ml-2" id="detail_waktu_selesai"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <strong>Target Kegiatan</strong>
                                    <p class="mt-1" id="detail_nama_target"></p>

                                    <strong>Uraian Kegiatan</strong>
                                    <p class="mt-1" id="detail_uraian_kegiatan"></p>

                                    <strong>Hasil Kegiatan</strong>
                                    <p class="mt-1" id="detail_hasil_kegiatan"></p>

                                    <strong>Bukti Dukung</strong>
                                    <p class="mt-1" id="detail_bukti_dukung">

                                    </p>
                                    <div class="row">
                                        <div class="col-8"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('plugins/summernote/summernote-bs4.min.js') ?>"></script>

<script>
    //Mengambil Data edit dengan menggunakan Jquery
    $(document).on('click', '#btn-edit', function() {
        const bukti_dukung = $.parseHTML($(this).data('bukti_dukung'))

        $('#id_kegiatan').val($(this).data('id_kegiatan'));
        $('#butir_kegiatan').val($(this).data('butir_kegiatan'));
        $('#tgl_kegiatan').val($(this).data('tgl_kegiatan'));
        $('#waktu_mulai').val($(this).data('waktu_mulai'));
        $('#waktu_selesai').val($(this).data('waktu_selesai'));
        $('#uraian_kegiatan').val($(this).data('uraian_kegiatan'));
        $('#kd_target').val($(this).data('kd_target'));
        $('#hasil_kegiatan').val($(this).data('hasil_kegiatan'));
        $('#bukti_dukung2').summernote('code', $(this).data('bukti_dukung'));
        $('#status').val($(this).data('status'));
        if ($(this).data('kd_target') == 1) {
            jikaJamEdit()
        } else {
            jikaLainnyaEdit()
        }
    })
</script>
<script>
    //Mengambil Data detail dengan menggunakan Jquery
    $(document).on('click', '#btn-detail', function() {
        const detail_bukti_dukung = $.parseHTML($(this).data('detail_bukti_dukung'))

        $('#id_kegiatan').val($(this).data('detail_id_kegiatan'));
        $('#detail_butir_kegiatan').text($(this).data('detail_butir_kegiatan'));
        $('#detail_tgl_kegiatan').text($(this).data('detail_tgl_kegiatan'));
        $('#detail_waktu_mulai').text($(this).data('detail_waktu_mulai'));
        $('#detail_waktu_selesai').text($(this).data('detail_waktu_selesai'));
        $('#detail_uraian_kegiatan').text($(this).data('detail_uraian_kegiatan'));
        $('#detail_nama_target').text($(this).data('detail_nama_target'));
        $('#detail_hasil_kegiatan').text($(this).data('detail_hasil_kegiatan'));
        $('#detail_bukti_dukung').html($(this).data('detail_bukti_dukung'));
        $('#detail_status').text($(this).data('detail_status')).removeClass().addClass($(this).data('detail_class_span'));
        $('#detail_icon_status').removeClass().addClass($(this).data('detail_class_icon'));
    })
</script>
<script>
    $(function() {
        // Summernote
        $("#bukti_dukung").summernote({
            placeholder: 'Link/list bukti kegiatan',
            height: 120,
            style: false,
            toolbar: [
                ['para', ['ul', 'ol']],
                ['insert', ['link']],
            ]
        });
        $("#bukti_dukung2").summernote({
            placeholder: 'Link/list bukti kegiatan',
            height: 120,
            style: false,
            toolbar: [
                ['para', ['ul', 'ol']],
                ['insert', ['link']],
            ]
        });
    });
</script>

<script>
    $(document).ready(function() {
        if ($("#versi_target").val() == 1) {
            jikaJam()
        } else {
            jikaLainnya()
        }
    })

    function jikaJam() {
        $("#tgl_kegiatan_tunggal").prop("disabled", false)
        $("#tgl_mulai").prop("disabled", true)
        $("#tgl_akhir").prop("disabled", true)
        $('#versi_jam').removeClass('d-none')
        $('#versi_lain').addClass('d-none')
    }

    function jikaLainnya() {
        $("#tgl_kegiatan_tunggal").prop("disabled", true)
        $("#tgl_mulai").prop("disabled", false)
        $("#tgl_akhir").prop("disabled", false)
        $('#versi_jam').addClass('d-none')
        $('#versi_lain').removeClass('d-none')
    }
    $("#versi_target").change(function() {
        if ($("#versi_target").val() == 1) {
            jikaJam()
        } else {
            jikaLainnya()

        }
    });

    function jikaJamEdit() {
        $("#tgl_kegiatan").prop("disabled", false)
        $("#tgl_mulai_edit").prop("disabled", true)
        $("#tgl_akhir_edit").prop("disabled", true)
        $('#versi_jam_edit').removeClass('d-none')
        $('#versi_lain_edit').addClass('d-none')
    }

    function jikaLainnyaEdit() {
        $("#tgl_kegiatan").prop("disabled", true)
        $("#tgl_mulai_edit").prop("disabled", false)
        $("#tgl_akhir_edit").prop("disabled", false)
        $('#versi_jam_edit').addClass('d-none')
        $('#versi_lain_edit').removeClass('d-none')
    }
    $("#kd_target").change(function() {
        if ($("#kd_target").val() == 1) {
            jikaJamEdit()
        } else {
            jikaLainnyaEdit()

        }
    });
</script>

<?= $this->endSection(); ?>