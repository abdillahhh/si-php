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
                <div class="col-md-12">
                    <div class="row mb-3 d-flex align-items-center">

                        <form class="col-md-6">
                            <div class="input-group">
                                <!-- <select class="form-control mr-2" style="border-radius: 5px;">
                                    <option selected disabled>- Pilih Bidang -</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Super Admin</option>
                                </select> -->
                                <button id="btn-tambah" type="button" class="btn btn-info tombol" data-toggle="modal" data-target="#modal-tambah" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i> Tambah</button>
                            </div>
                        </form>
                        <div class="col-md-6 d-flex align-items-center float-right">
                            <h6 class="w-100 text-right">Tabel Pegawai</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="" method="get" class="input-group input-group-md pt-3 px-4" style="width: 250px">
                                    <input type="search" value="<?= $keyword ? $keyword : ""; ?>" name="keyword" class="form-control float-right" placeholder="Search" />
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
                                                <th>IMAGE</th>
                                                <th>NAMA PEGAWAI</th>
                                                <th>NIP LAMA</th>
                                                <th>NIP BARU</th>
                                                <th>GOL</th>
                                                <th>TMT</th>
                                                <th>KETERANGAN</th>
                                                <th>PENDIDIKAN</th>
                                                <th>TAHUN</th>
                                                <th>JK</th>
                                                <th>TGL LAHIR</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php if ($list_pegawai != null) : ?>
                                                <?php foreach ($list_pegawai as $pegawai) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td class="text-center">
                                                            <?php if ($list_user != null) : ?>
                                                                <?php foreach ($list_user as $user) : ?>
                                                                    <?php if ($pegawai['nip_lama'] == $user['nip_lama_user']) : ?>
                                                                        <img class="" style="width: 90px;" src="<?= base_url('/images/' . $user['image']) ?>" alt="">
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= $pegawai['nama_pegawai']; ?></td>
                                                        <td><?= $pegawai['nip_lama']; ?></td>
                                                        <td><?= $pegawai['nip_baru']; ?></td>
                                                        <?php foreach ($list_golongan as $golongan) : ?>
                                                            <?php if ($pegawai['gol_kd'] == $golongan['id']) : ?>
                                                                <td><?= $golongan['golongan']; ?></td>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <td><?= $pegawai['tmt']; ?></td>
                                                        <td><?= $pegawai['ket_jabatan']; ?></td>
                                                        <?php foreach ($list_pendidikan as $pendidikan) : ?>
                                                            <?php if ($pegawai['pendidikan_kd'] == $pendidikan['kd_pendidikan']) : ?>
                                                                <td><?= $pendidikan['tk_pendidikan']; ?></td>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <td><?= $pegawai['tahun_pdd']; ?></td>
                                                        <td><?php if ($pegawai['jk'] == 1) {
                                                                echo 'Laki-laki';
                                                            } else {
                                                                echo 'perempuan';
                                                            } ?></td>
                                                        <td><?= $pegawai['tgl_lahir']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('/showDetailPegawai/' . $pegawai['id']); ?>" type="button" id="btn-detail" class="btn btn-info btn-xs tombol" style="background-color: #E18939; border:none;">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="<?= base_url('/showEditPegawai/' . $pegawai['id']); ?>" type="button" id="btn-edit" class="btn btn-info btn-xs tombol" style="background-color: #2D95C9; border:none;">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
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
        <form action="<?= base_url('/savePegawai') ?>" method="POST" class="modal-content">
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
                                <option>--Pilih Golongan--</option>
                                <?php foreach ($list_golongan as $golongan) : ?>
                                    <option value="<?= $golongan['id']; ?>"><?= $golongan['golongan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai Terhitung</label>
                            <input type="date" name="tmt" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option>--Pilih Jabatan--</option>
                                <?php foreach ($list_jabatan as $jabatan) : ?>
                                    <option value="<?= $jabatan['id']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
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
                                <option>--Pilih pendidikan--</option>
                                <?php foreach ($list_pendidikan as $pendidikan) : ?>
                                    <option value="<?= $pendidikan['kd_pendidikan']; ?>"><?= $pendidikan['tk_pendidikan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tahun Pendidikan</label>
                            <input type="text" name="tahun_pdd" class="form-control" placeholder="Masukkan Tahun Pendidikan ...">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control mr-2" style="border-radius: 5px;">
                                <option>--Pilih Jenis Kelamin--</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Satuan Kerja</label>
                            <select name="satker_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option>--Pilih Satuan Kerja--</option>
                                <?php foreach ($list_satker as $satker) : ?>
                                    <option value="<?= $satker['kd_satker']; ?>"><?= $satker['satker']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fungsi/Bagian</label>
                            <select name="es3_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option>--Pilih Fungsi/Bagian--</option>
                                <?php foreach ($list_bidang as $bidang) : ?>
                                    <option value="<?= $bidang['kd_es3']; ?>"><?= $bidang['deskripsi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seksi</label>
                            <select name="es4_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option>--Pilih Seksi--</option>
                                <?php foreach ($list_seksi as $seksi) : ?>
                                    <option value="<?= $seksi['kd_es4']; ?>"><?= $seksi['deskripsi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jafung</label>
                            <select name="fungsional_kd" class="form-control mr-2" style="border-radius: 5px;">
                                <option>--Pilih Jafung--</option>
                                <?php foreach ($list_fungsional as $fungsional) : ?>
                                    <option value="<?= $fungsional['id']; ?>"><?= $fungsional['jabatan_fungsional']; ?></option>
                                <?php endforeach; ?>
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

<!-- MODAL EDIT PEGAWAI -->
<div class="modal fade" id="<?= $modal_edit; ?>" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <form action="<?= base_url('/updatePegawai') ?>" method="POST" class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pegawai</h4>
                <a href="<?= base_url('/masterPegawai'); ?>" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <?php if ($pegawai_tertentu != null) : ?>
                <input type="hidden" name="id_pegawai_tertentu" id="id_pegawai_tertentu" value="<?= $pegawai_tertentu['id']; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIP Lama</label>
                                <input type="text" name="nip_lama" class="form-control" value="<?= $pegawai_tertentu['nip_lama']; ?>">
                            </div>
                            <div class="form-group">
                                <label>NIP Baru</label>
                                <input type="text" name="nip_baru" class="form-control" value="<?= $pegawai_tertentu['nip_baru']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" class="form-control" value="<?= $pegawai_tertentu['nama_pegawai']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Golongan</label>
                                <select name="gol_kd" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['gol_kd']; ?>"><?php foreach ($list_golongan as $golongan) {
                                                                                            if ($pegawai_tertentu['gol_kd'] == $golongan['id']) {
                                                                                                echo $golongan['golongan'];
                                                                                            }
                                                                                        } ?></option>
                                    <?php foreach ($list_golongan as $golongan) : ?>
                                        <?php if ($pegawai_tertentu['gol_kd'] != $golongan['id']) :  ?>
                                            <option value="<?= $golongan['id']; ?>"><?= $golongan['golongan']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun Mulai Terhitung</label>
                                <input type="date" name="tmt" class="form-control" value="<?= $pegawai_tertentu['tmt']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="jabatan_kd" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['jabatan_kd']; ?>"><?php foreach ($list_jabatan as $jabatan) {
                                                                                                if ($pegawai_tertentu['jabatan_kd'] == $jabatan['id']) {
                                                                                                    echo $jabatan['nama_jabatan'];
                                                                                                }
                                                                                            } ?></option>
                                    <?php foreach ($list_jabatan as $jabatan) : ?>
                                        <?php if ($pegawai_tertentu['jabatan_kd'] != $jabatan['id']) :  ?>
                                            <option value="<?= $jabatan['id']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Jabatan</label>
                                <textarea name="ket_jabatan" rows='5' class="form-control"><?= $pegawai_tertentu['ket_jabatan']; ?></textarea>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <select name="pendidikan_kd" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['pendidikan_kd']; ?>"><?php foreach ($list_pendidikan as $pendidikan) {
                                                                                                    if ($pegawai_tertentu['pendidikan_kd'] == $pendidikan['kd_pendidikan']) {
                                                                                                        echo $pendidikan['tk_pendidikan'];
                                                                                                    }
                                                                                                } ?></option>
                                    <?php foreach ($list_pendidikan as $pendidikan) : ?>
                                        <?php if ($pegawai_tertentu['pendidikan_kd'] != $pendidikan['kd_pendidikan']) :  ?>
                                            <option value="<?= $pendidikan['kd_pendidikan']; ?>"><?= $pendidikan['tk_pendidikan']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tahun Pendidikan</label>
                                <input type="text" name="tahun_pdd" class="form-control" value="<?= $pegawai_tertentu['tahun_pdd']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jk" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['jk']; ?>"><?php if ($pegawai_tertentu['jk'] == 1) {
                                                                                        echo 'Laki-laki';
                                                                                    } else {
                                                                                        echo 'perempuan';
                                                                                    } ?></option>
                                    <?php if ($pegawai_tertentu['jk'] != 1) {
                                        echo '<option value="1">Laki-laki</option>';
                                    } else {
                                        echo ' <option value="2">Perempuan</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="<?= $pegawai_tertentu['tgl_lahir']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Satuan Kerja</label>
                                <select name="satker_kd" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['satker_kd']; ?>"><?php foreach ($list_satker as $satker) {
                                                                                                if ($pegawai_tertentu['satker_kd'] == $satker['kd_satker']) {
                                                                                                    echo $satker['satker'];
                                                                                                }
                                                                                            } ?></option>
                                    <?php foreach ($list_satker as $satker) : ?>
                                        <?php if ($pegawai_tertentu['satker_kd'] != $satker['kd_satker']) :  ?>
                                            <option value="<?= $satker['kd_satker']; ?>"><?= $satker['satker']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fungsi/Bagian</label>
                                <select name="es3_kd" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['es3_kd']; ?>"><?php foreach ($list_bidang as $bidang) {
                                                                                            if ($pegawai_tertentu['es3_kd'] == $bidang['kd_es3']) {
                                                                                                echo $bidang['deskripsi'];
                                                                                            }
                                                                                        } ?></option>
                                    <?php foreach ($list_bidang as $bidang) : ?>
                                        <?php if ($pegawai_tertentu['es3_kd'] != $bidang['kd_es3']) :  ?>
                                            <option value="<?= $bidang['kd_es3']; ?>"><?= $bidang['deskripsi']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Seksi</label>
                                <select name="es4_kd" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['es4_kd']; ?>"><?php foreach ($list_seksi as $seksi) {
                                                                                            if ($pegawai_tertentu['es4_kd'] == $seksi['kd_es4']) {
                                                                                                echo $seksi['deskripsi'];
                                                                                            }
                                                                                        } ?></option>
                                    <?php foreach ($list_seksi as $seksi) : ?>
                                        <?php if ($pegawai_tertentu['es4_kd'] != $seksi['kd_es4']) :  ?>
                                            <option value="<?= $seksi['kd_es4']; ?>"><?= $seksi['deskripsi']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jafung</label>
                                <select name="fungsional_kd" class="form-control mr-2" style="border-radius: 5px;">
                                    <option value="<?= $pegawai_tertentu['fungsional_kd']; ?>"><?php foreach ($list_fungsional as $fungsional) {
                                                                                                    if ($pegawai_tertentu['fungsional_kd'] == $fungsional['id']) {
                                                                                                        echo $fungsional['jabatan_fungsional'];
                                                                                                    }
                                                                                                } ?></option>

                                    <?php foreach ($list_fungsional as $fungsional) : ?>
                                        <?php if ($pegawai_tertentu['fungsional_kd'] != $fungsional['id']) :  ?>
                                            <option value="<?= $fungsional['id']; ?>"><?= $fungsional['jabatan_fungsional']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <a href="<?= base_url('/masterPegawai'); ?>" type="button" class="btn btn-default">Tutup</a>
                    <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Update</button>
                </div>

        </form>
    <?php endif; ?>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- MODAL DETAIL -->
<div class="modal fade" id="<?= $modal_detail; ?>" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header py-3" style="border: none;">
                <h4 class="modal-title">Detail Pegawai</h4>
                <a href="<?= base_url('/masterPegawai'); ?>" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <?php if ($detail_pegawai != null) : ?>
                <div class="modal-body px-5 py-3">
                    <div class="row">
                        <div class="col-md-2 text-center border-right">
                            <?php if ($image_pegawai != null) : ?>
                                <img class="img-fluid" style="width: 100%;" src="<?= base_url('/images/' . $image_pegawai['image']) ?>" alt="">
                                <br>
                                <label for="username">Username Akun :</label>
                                <p><?= $image_pegawai['username']; ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-5 p-2">
                        <h2 class="font-weight-bold"><?= $detail_pegawai['nama_pegawai']; ?></h2>
                        <hr>
                        <div class="row mb-3" style="background-color: #ebebeb;">
                            <div class="col-12 py-1">
                                <i>Informasi Dasar</i>
                            </div>
                        </div>

                        <strong>NIP Lama</strong>
                        <p class="text-muted"> <?= $detail_pegawai['nip_lama']; ?>

                        </p>
                        <hr>

                        <strong>NIP Baru</strong>
                        <p class="text-muted"><?= $detail_pegawai['nip_baru']; ?></p>
                        <hr>

                        <strong>Tanggal Lahir</strong>
                        <p class="text-muted"> <?= $detail_pegawai['tgl_lahir']; ?> </p>
                        <hr>

                        <strong>Jenis Kelamin</strong>
                        <p class="text-muted"> <?php if ($detail_pegawai['nama_pegawai'] == '1') {
                                                    echo 'Laki-laki';
                                                } else {
                                                    echo "perempuan";
                                                }; ?>

                        </p>

                        <div class="row mt-4 mb-3" style="background-color: #ebebeb;">
                            <div class="col-12 py-1">
                                <i>Pendidikan</i>
                            </div>
                        </div>

                        <strong>Tingkat Pendidikan</strong>
                        <p class="text-muted"><?= $detail_pegawai['tk_pendidikan']; ?> </p>
                        <hr>

                        <strong>Tahun Pendidikan</strong>
                        <p class="text-muted"> <?= $detail_pegawai['tahun_pdd']; ?></p>
                        <hr>

                    </div>
                    <div class="col-md-5 p-2">
                        <div class="row mt-4 mb-3" style="background-color: #ebebeb;">
                            <div class="col-12 py-1">
                                <i>Posisi Jabatan</i>
                            </div>
                        </div>

                        <strong>Jabatan</strong>
                        <p class="text-muted"><?= $detail_pegawai['nama_jabatan']; ?></p>
                        <hr>

                        <strong>Keterangan Jabatan</strong>
                        <p class="text-muted"> <?= $detail_pegawai['ket_jabatan']; ?> </p>
                        <hr>

                        <strong>Golongan</strong>
                        <p class="text-muted"> <?= $detail_pegawai['golongan']; ?> </p>
                        <hr>

                        <strong>Jabatan fungsional</strong>
                        <p class="text-muted"> <?= $detail_pegawai['jabatan_fungsional']; ?> </p>
                        <hr>

                        <strong>Tahun Mulai Terhitung</strong>
                        <p class="text-muted"> <?= $detail_pegawai['tmt']; ?> </p>


                        <div class="row mt-4 mb-3" style="background-color: #ebebeb;">
                            <div class="col-12 py-1">
                                <i>Unit Kerja</i>
                            </div>
                        </div>
                        <strong>Satker</strong>

                        <p class="text-muted"><?= $detail_pegawai['satker']; ?> </p>
                        <hr>

                        <strong>Bagian/fungsi</strong>
                        <?php foreach ($list_bidang as $bidang) : ?>
                            <?php if ($detail_pegawai['es3_kd'] == $bidang['kd_es3']) : ?>
                                <p class="text-muted"> <?= $bidang['deskripsi']; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <hr>

                        <strong>Seksi</strong>
                        <?php foreach ($list_seksi as $seksi) : ?>
                            <?php if ($detail_pegawai['es4_kd'] == $seksi['kd_es4']) : ?>
                                <p class="text-muted"> <?= $seksi['deskripsi']; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    </div>
                    <hr>

                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<script>
    $(document).on('click', '#openInputan', function() {
        $('#keterangan').toggleClass('d-none');
        $('#inputan').toggleClass('d-none');
    })
    $(document).on('click', '#batal', function() {
        $('#keterangan').removeClass('d-none');
        $('#inputan').addClass('d-none');
    })

    $(document).ready(function() {
        $("#modal-edit").modal("show");
        $("#modal-detail").modal("show");
    })
</script>

<?= $this->endSection(); ?>