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
                        <form method="" action="" class="col-md-5 py-1">
                            <div class="input-group">
                                <?php if ($tanggal_input_terakhir != null) {
                                    if (date('Y-m-d') != $tanggal_input_terakhir['tgl_kegiatan']) {
                                        echo '<button type="button" id="btn-modal-tambah" class="btn btn-info tombol mr-2" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i>Tambah</button>';
                                    }
                                } else {
                                    echo '<button type="button" id="btn-modal-tambah" class="btn btn-info tombol mr-2" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i>Tambah</button>';
                                } ?>


                                <select name="bulan" class="form-control mr-2 bulan" style="border-radius: 5px;">
                                    <option value="">--PILIH BULAN--</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="12">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <select name="tahun" class="form-control tahun" style="border-radius: 5px;">
                                    <option value="">--PILIH TAHUN--</option>
                                    <?php if ($tahun_tersedia != null) : ?>
                                        <?php foreach ($tahun_tersedia as $tahun) : ?>
                                            <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </form>

                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6 py-1">
                            <form action="" method="get">
                                <div class="input-group input-group-md float-right" style="width: 250px">
                                    <input type="text" name="keyword" class="form-control float-right auto_search" value="<?= $keyword ? $keyword : ""; ?>" placeholder="Search" onkeypress="return event.keyCode != 13" />
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default" id="btn-search">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                            <!-- tabel lama -->
                            <table class="table table-hover " id="tabelData">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>TANGGAL</th>
                                        <th>URAIAN KEGIATAN</th>
                                        <th>JUMLAH</th>
                                        <th>SATUAN</th>
                                        <th>BUKTI DUKUNG</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $start = 0;
                                    $no = 1;
                                    $page = 1;
                                    if ($list_laporan_harian != NULL) : ?>
                                        <?php
                                        $start = 1;
                                        $page = isset($_GET['page_list_laporan_harian']) ? $_GET['page_list_laporan_harian'] : 1;
                                        $no = 1 + ($itemsCount * ($page - 1));
                                        if ($keyword == null) {
                                            $laporan_digunakan = $list_laporan_harian;
                                        } else {
                                            $laporan_digunakan = $list_full_laporan_harian;
                                        }

                                        foreach ($laporan_digunakan as $list) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $list['tgl_kegiatan']; ?></td>
                                                <?php $laporan = $list['uraian_kegiatan']; ?>
                                                <?php $data = json_decode($laporan); ?>
                                                <?php $list_uraian = $data->uraian; ?>
                                                <td class="p-2">
                                                    <?php foreach ($list_uraian as $uraian) : ?>
                                                        <div class="p-2 mb-1 rounded-sm card-laporan">
                                                            <?= $uraian; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </td>
                                                <?php $list_jumlah = $data->jumlah; ?>
                                                <td><?php foreach ($list_jumlah as $jumlah) : ?>
                                                        <div class="p-2 mb-1 text-center rounded-sm card-laporan">
                                                            <?= $jumlah; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </td>
                                                <?php $list_satuan2 = $data->satuan; ?>
                                                <td><?php foreach ($list_satuan2 as $satuan) : ?>
                                                        <div class="p-2 mb-1 text-center rounded-sm card-laporan">
                                                            <?= $satuan; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </td>
                                                <?php $list_bukti_dukung = $data->bukti_dukung; ?>
                                                <td>
                                                    <?php $data_user = session('data_user'); ?>
                                                    <?php $folderNIP = $data_user['nip_lama_user'];  ?>
                                                    <?php foreach ($list_bukti_dukung as $bukti_dukung) : ?>
                                                        <div class="p-2 mb-1 rounded-sm card-bukti-laporan">
                                                            <?php foreach ($bukti_dukung as $b) : ?>
                                                                <a title="<?= $b; ?>" target="_blank" href="<?= base_url('berkas/' . $folderNIP . '/' . $list['tgl_kegiatan'] . '/' . $b) ?>"> <?= $b; ?></a>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </td>
                                                <td>
                                                    <a href="<?= base_url('/showDetailLaporanHarian/' . $list['id']) ?>" type="button" id="btn-detail" class="btn btn-info btn-xs tombol" style="background-color: #E18939; border:none;">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?= base_url('/showEditLaporanHarian/' . $list['id']) ?>" type="button" id="btn-edit" class="btn btn-info btn-xs tombol" style="background-color: #2D95C9; border:none;">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <!-- PAGINATION -->
                        <div class="card-footer clearfix">
                            <div class="row py-2">
                                <div class="col-md-6">

                                    <i class="text-sm text-gray">Menampilkan <?= $start + ($itemsCount * ($page - 1)) ?> - <?= $no - 1 ?> data dari <?= $total ?> entry</i>
                                </div>
                                <?= $pager->links('list_laporan_harian', 'custom_simple'); ?>

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
    <div class="modal-dialog modal-dialog-scrollable modal-xl ">
        <form id="form-tambah" action="<?= base_url('/saveLaporanHarian'); ?>" method="post" class="modal-content" enctype="multipart/form-data">
            <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Laporan Kegiatan</h4>
                <button id="btn-close-modal-tambah" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="form-group">
                            <p>tanggal Kegiatan
                            </p>
                            <h2 class="mb-3" id="tanggal-tambah"></h2>
                            <input type="date" class="form-control d-none" name="tanggal" id="hari-ini" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- lama -->
                <div id="lama">
                    <div class="row rounded position-relative pt-2 kegiatan-baru ">
                        <div class="col-xl-1 baris-kegiatan">
                            <div class="row"><strong>NO</strong></div>
                            <div class="row">1</div>
                        </div>
                        <div class="col-xl-4 baris-kegiatan">
                            <div class="row"><strong>Uraian Kegiatan</strong></div>
                            <div class="row px-1  w-100">
                                <div class="form-group  w-100">
                                    <textarea class="form-control  w-100" name="field_uraian[]" rows="3" placeholder="Masukkan Uraian Kegiatan ..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 baris-kegiatan">
                            <div class="row"><strong>Jumlah</strong></div>
                            <div class="row px-1  w-100">
                                <div class="form-group  w-100">
                                    <input type="number" class="form-control  w-100" name="field_jumlah[]" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 baris-kegiatan">
                            <div class="row"><strong>Satuan</strong></div>
                            <div class="row px-1  w-100">
                                <div class="input-group  w-100">
                                    <select class=" form-control  w-100" name="field_satuan[]" required>
                                        <?php if ($list_satuan != NULL) : ?>
                                        <?php foreach ($list_satuan as $satuan) : ?>
                                        <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 baris-kegiatan">
                            <div class="row"><strong>Hasil Kegiatan</strong></div>
                            <div class="row px-1  w-100">
                                <div class="form-group  w-100">
                                    <textarea class="form-control  w-100" name="field_hasil[]" rows="3" placeholder="Masukkan Hasil Kegiatan ..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 baris-kegiatan mb-2">
                            <div class="row"><strong>Bukti Dukung</strong></div>
                            <div class="row w-100">
                                <div class="input-group w-100">
                                    <div class="custom-file w-100 position-relative">
                                        <input type="file" class="custom-file-input w-100" name="field_bukti1[]" id="formFileMultiple" accept=".png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip" required multiple />
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        <p class="file-tip d-none">
                                            <strong class="mt-2 d-flex align-items-center">
                                                <i class="fas fa-exclamation-circle fa-2x text-yellow mr-2"></i>
                                                Jenis file :
                                            </strong> <br>
                                            .png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip <br><br>
                                            <strong>
                                                Ukuran File Maks : 200kb
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                                <!-- <div class="form-group w-100">
                                    <input class="form-control" type="file" name="field_bukti1[]" id="formFileMultiple" multiple />
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- baru -->
                <div id="baru">

                </div>
                <!-- tombol -->
                <div class="row ">
                    <div class="col-12 py-3 px-0">
                        <button id="tambah-baris" type="button" class="btn btn-info w-100">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button id="btn-close-modal-tambah2" type="button" class="btn btn-default">Tutup</button>
                <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL EDIT KEGIATAN -->
<div class="modal fade" id="<?= $modal_edit; ?>" data-keyboard="false" data-backdrop="static">
    <div class=" modal-dialog modal-dialog-scrollable modal-xl">
        <form action="<?= base_url('/updateLaporanHarian'); ?>" method="post" class="modal-content" enctype="multipart/form-data">
            <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
            <div class="modal-header">
                <h4 class="modal-title">Edit Laporan Kegiatan</h4>
                <a href="<?= base_url('/listLaporan'); ?>" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="form-group">
                            <p>tanggal Kegiatan
                            </p>
                            <h2 class="mb-3" id="tanggal-edit"></h2>
                            <?php if ($laporan_harian_tertentu != NULL) : ?>
                                <input type="hidden" name="laporan_id_edit" value="<?= $laporan_harian_tertentu['id']; ?>">
                                <input type="date" class="d-none" id="tanggal-kegiatan" name="tanggal" value="<?= $laporan_harian_tertentu['tgl_kegiatan']; ?>" class="form-control">
                                <p>Last Modified : <?= $laporan_harian_tertentu['updated_at'];; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if ($laporan_harian_tertentu != NULL) : ?>
                    <input type="hidden" name="id_laporan_harian_tertentu" value="<?= $laporan_harian_tertentu['id']; ?>">
                <?php endif; ?>
                <!-- lama -->
                <div id="lama2">
                    <?php if ($laporan_harian_tertentu != NULL) : ?>
                        <?php $laporan = $laporan_harian_tertentu['uraian_kegiatan']; ?>
                        <?php $data = json_decode($laporan); ?>
                        <?php for ($i = 0; $i < count($list_uraian = $data->uraian); $i++) : ?>
                            <div class="row mt-4 rounded position-relative pt-2 kegiatan">
                                <div class="col-xl-1 baris-kegiatan">
                                    <div class="row"><strong>NO</strong></div>
                                    <div class="row"><?= $i + 1; ?></div>
                                </div>
                                <div class="col-xl-4 baris-kegiatan">
                                    <div class="row"><strong>Uraian Kegiatan</strong></div>
                                    <div class="row px-1 w-100">
                                        <div class="form-group w-100">
                                            <textarea class="form-control w-100" name="field_uraian[]" rows="3" required><?= $list_uraian[$i]; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-1 baris-kegiatan">
                                    <?php $list_jumlah = $data->jumlah; ?>
                                    <div class="row"><strong>Jumlah</strong></div>
                                    <div class="row px-1 w-100">
                                        <div class="form-group w-100">
                                            <input type="number" min="1" class="form-control w-100" name="field_jumlah[]" value="<?= $list_jumlah[$i]; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 baris-kegiatan">
                                    <?php $list_satuan2 = $data->satuan; ?>
                                    <div class="row"><strong>Satuan</strong></div>
                                    <div class="row px-1 w-100">
                                        <div class="input-group w-100">
                                            <select class=" form-control w-100" name="field_satuan[]" required>
                                                <option value="<?= $list_satuan2[$i] ?>"><?= $list_satuan2[$i] ?></option>
                                                <?php if ($list_satuan != NULL) : ?>
                                                    <?php foreach ($list_satuan as $satuan) : ?>
                                                        <?php if ($satuan['nama_satuan'] != $list_satuan2[$i]) : ?>
                                                            <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 baris-kegiatan">
                                    <?php $list_hasil = $data->hasil; ?>
                                    <div class="row"><strong>Hasil Kegiatan</strong></div>
                                    <div class="row px-1 w-100">
                                        <div class="form-group w-100">
                                            <textarea class="form-control w-100" name="field_hasil[]" rows="3" required><?= $list_hasil[$i]; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 baris-kegiatan">
                                    <?php $list_bukti_dukung = $data->bukti_dukung; ?>
                                    <div class="row"><strong>Bukti Dukung</strong></div>
                                    <div class="row w-100">
                                        <div class="form-group w-100">
                                            <?php for ($a = 0; $a < count($list_bukti_dukung[$i]); $a++) : ?>
                                                <div title="<?= $list_bukti_dukung[$i][$a]; ?>" class="file-list">
                                                    <input type="hidden" name="field_bukti_lama<?= $i + 1; ?>[]" value="<?= $list_bukti_dukung[$i][$a]; ?>">
                                                    <span class="w-75 text-truncate p-0"><?= $list_bukti_dukung[$i][$a]; ?></span>
                                                    <?php if (count($list_bukti_dukung[$i]) != 1) : ?>
                                                        <button class="btn-silang" type="button" id="btn-edit-hapus" data-toggle="modal" data-target="#modal-edit-hapus" data-id_laporan_tertentu="<?= $laporan_harian_tertentu['id']; ?>" data-posisi_array="<?= $i; ?>" data-posisi_dalam_array="<?= $a; ?>" data-nama_bukti_dukung="<?= $list_bukti_dukung[$i][$a]; ?>" data-tanggal_hapus="<?= $laporan_harian_tertentu['tgl_kegiatan']; ?>"><i class="fas fa-times" style="color: #80772d;"></i></button>
                                                    <?php endif; ?>
                                                </div>

                                            <?php endfor; ?>

                                            <div class="input-group w-100">
                                                <div class="custom-file w-100">
                                                    <input type="file" id="field_bukti_edit<?= $i + 1; ?>" name="field_bukti<?= $i + 1; ?>[]" class="custom-file-input w-100" id="formFileMultiple" accept=".png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip" multiple />
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    <div id="resp<?= $i + 1; ?>"></div>
                                                    <p class="file-tip d-none">
                                                        <strong class="mt-2 d-flex align-items-center">
                                                            <i class="fas fa-exclamation-circle fa-2x text-yellow mr-2"></i>
                                                            Jenis file :
                                                        </strong> <br>
                                                        .png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip <br><br>
                                                        <strong>
                                                            Ukuran File Maks : 200kb
                                                        </strong>
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- <input class="form-control" type="file" name="field_bukti<?= $i + 1; ?>[]" id="formFileMultiple" multiple /> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
                <!-- baru -->
                <div id="baru2">

                </div>
                <!-- tombol -->
                <div class="row ">
                    <div class="col-12 py-3 px-0">
                        <button id="tambah-baris2" type="button" class="btn btn-info w-100">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="<?= base_url('/listLaporan'); ?>" type="button" class="btn btn-default">Tutup</a>
                <button type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Update</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal -->

<!-- MODAL DETAIL -->
<div class="modal fade" id="<?= $modal_detail; ?>" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-3" style="border: none;">
                <a href="<?= base_url('/listLaporan'); ?>" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row mb-2">
                    <div class="col-md-12 p-0">
                        <p>Tanggal Kegiatan
                        </p>
                        <?php if ($laporan_harian_tertentu != NULL) : ?>
                            <h1> <?= $laporan_harian_tertentu['tgl_kegiatan']; ?></h1>
                            <p>Last Modified : <?= $laporan_harian_tertentu['updated_at'];; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>URAIAN</th>
                                    <th>JUMLAH</th>
                                    <th>SATUAN</th>
                                    <th>HASIL KEGIATAN</th>
                                    <th>BUKTI DUKUNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($laporan_harian_tertentu != NULL) : ?>
                                    <input type="hidden" name="id_laporan_harian_tertentu" value="<?= $laporan_harian_tertentu['id']; ?>">
                                    <?php $laporan = $laporan_harian_tertentu['uraian_kegiatan']; ?>
                                    <?php $data = json_decode($laporan); ?>
                                    <?php for ($i = 0; $i < count($list_uraian = $data->uraian); $i++) : ?>
                                        <tr>
                                            <td>
                                                <?= $i + 1; ?>
                                            </td>
                                            <td>
                                                <?= $list_uraian[$i]; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php $list_jumlah = $data->jumlah; ?>
                                                <?= $list_jumlah[$i]; ?>
                                            </td>
                                            <td>
                                                <?php $list_satuan2 = $data->satuan; ?>
                                                <?= $satuan['nama_satuan']; ?>
                                            </td>
                                            <td>
                                                <?php $list_hasil = $data->hasil; ?>
                                                <?= $list_hasil[$i]; ?>
                                            </td>
                                            <td>
                                                <?php $list_bukti_dukung = $data->bukti_dukung; ?>
                                                <?php for ($a = 0; $a < count($list_bukti_dukung[$i]); $a++) : ?>
                                                    <div title="<?= $list_bukti_dukung[$i][$a]; ?>" class="file-list">
                                                        <a title="<?= $list_bukti_dukung[$i][$a]; ?>" href="<?= base_url('berkas/' . $folderNIP . '/' . $laporan_harian_tertentu['tgl_kegiatan'] . '/' . $list_bukti_dukung[$i][$a]) ?>"> <?= $list_bukti_dukung[$i][$a]; ?></a>
                                                    </div>
                                                <?php endfor; ?>

                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL HAPUS BUKTI DUKUNG -->
<div class="modal fade" id="modal-edit-hapus" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <form action="<?= base_url('/hapusBuktiDukung') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header pt-3" style="border: none;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-5 py-3 ">
                    <div class="row mb-2">
                        <div class="col-md-12 p-0 d-flex flex-column justify-content-center align-content-center">
                            <i class="fas fa-exclamation-circle fa-2x text-red"></i>
                            <input type="hidden" id="id_laporan_tertentu" name="id_laporan_tertentu">
                            <input type="hidden" name="posisi_array" id="posisi_array">
                            <input type="hidden" name="tanggal_hapus" id="tanggal_hapus">
                            <input type="hidden" name="posisi_dalam_array" id="posisi_dalam_array">
                            <h2 class=" mb-3" id="">Yakin Hapus Bukti Dukung?</h2>
                            <p id="nama_bukti_dukung"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Summernote -->
<script src="<?= base_url('/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- dropzonejs -->
<script src="<?= base_url('/plugins/dropzone/min/dropzone.min.js') ?>"></script>
<script src="<?= base_url('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('/plugins/jquery-validation/additional-methods.min.js') ?>"></script>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>


</script>

<script src="<?= base_url('/js/tanggal.js') ?>"></script>
<script>
    $(document).ready(function() {
        $("#modal-edit").modal("show");
        $("#modal-detail").modal("show");

        $(document).on("click", "#hapus-baris", function() {
            $(this).parent().remove();
        });

        function appendBaris(modal, noBaris) {
            $(modal).append(
                `
        <div class="row mt-4 rounded position-relative pt-2 kegiatan-baru">
                    <span id="hapus-baris" type="button" class="delete-kegiatan"><i class="fas fa-times"></i></span>
                    <div class="col-xl-1 baris-kegiatan">
                        <div class="row"><strong>NO</strong></div>
                        <div class="row">` +
                noBaris +
                `</div>
                    </div>
                    <div class="col-xl-4 baris-kegiatan">
                        <div class="row"><strong>Uraian Kegiatan</strong></div>
                        <div class="row px-1 w-100">
                            <div class="form-group w-100">
                                <textarea class="form-control w-100" name="field_uraian[]" rows="3" placeholder="Masukkan Uraian Kegiatan ..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 baris-kegiatan">
                        <div class="row"><strong>Jumlah</strong></div>
                        <div class="row px-1 w-100">
                            <div class="form-group w-100">
                                <input type="number" min="1" class="form-control w-100" name="field_jumlah[]" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan">
                        <div class="row"><strong>Satuan</strong></div>
                        <div class="row px-1 w-100">
                            <div class="input-group w-100">
                            <select class=" form-control w-100" name="field_satuan[]" required>
                                    <?php if ($list_satuan != NULL) : ?>
                                        <?php foreach ($list_satuan as $satuan) : ?>
                                            <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan">
                        <div class="row"><strong>Hasil Kegiatan</strong></div>
                        <div class="row px-1 w-100">
                            <div class="form-group w-100">
                                <textarea class="form-control w-100" name="field_hasil[]" rows="3" placeholder="Masukkan Hasil Kegiatan ..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 baris-kegiatan mb-2">
                        <div class="row"><strong>Bukti Dukung</strong></div>
                        <div class="row w-100">
                            <div class="input-group w-100">
                                <div class="custom-file w-100">
                                    <input type="file" class="custom-file-input w-100" name="field_bukti` +
                noBaris +
                `[]" id="formFileMultiple" accept=".png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip" required multiple />
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    <p class="file-tip d-none">
                                    <strong class="mt-2 d-flex align-items-center">
                                                <i class="fas fa-exclamation-circle fa-2x text-yellow mr-2"></i>
                                                Jenis file :
                                            </strong> <br>
                                            .png, .jpg, .jpeg, .pdf, .xlsx, .docx, .ppt, .txt, .rar, .zip <br><br>
                                            <strong>
                                                Ukuran File Maks : 200kb
                                            </strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
    `
            );
        }

        $('[id^="tambah-baris"]').click(function() {
            let noBaris = $("#lama").children().length + $("#baru").children().length + 1;
            appendBaris("#baru", noBaris);
            bsCustomFileInput.init();
        });

        $('[id^="tambah-baris2"]').click(function() {
            let noBaris2 = $("#lama2").children().length + $("#baru2").children().length + 1;
            appendBaris("#baru2", noBaris2);
            bsCustomFileInput.init();
        });
    });
</script>
<script>
    var date = new Date();
    var currentDate = date.toISOString().slice(0, 10);
    document.getElementById('hari-ini').value = currentDate;

    $('#tanggal-tambah').html(ubahFormatTanggal(currentDate))
    $('#tanggal-edit').html(ubahFormatTanggal($('#tanggal-kegiatan').val()))
</script>

<script>
    $(document).on("mouseover", '#formFileMultiple', function() {
        $(this).next().next().removeClass('d-none')
    })
    $(document).on("mouseout", '#formFileMultiple', function() {
        $(this).next().next().addClass('d-none')
    })
</script>

<script>
    // Mengambil Data edit dengan menggunakan Jquery
    $(document).on('click', '#btn-edit-hapus', function() {
        $('#id_laporan_tertentu').val($(this).data('id_laporan_tertentu'));
        $('#posisi_array').val($(this).data('posisi_array'));
        $('#posisi_dalam_array').val($(this).data('posisi_dalam_array'));
        $('#tanggal_hapus').val($(this).data('tanggal_hapus'));
        $('#nama_bukti_dukung').text($(this).data('nama_bukti_dukung'));

    })
</script>

<script>
    $('#btn-modal-tambah').click(function() {
        $('#modal-tambah').modal('show');
    })

    $('#btn-close-modal-tambah').click(function() {
        $('#modal-tambah').modal('hide');
    })

    $('#btn-close-modal-tambah2').click(function() {
        $('#modal-tambah').modal('hide');
    })
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $('#tabelData').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "responsive": true,
        'ordering': false,
        "info": false,
        "autoWidth": false

    });

    function filterData() {
        $('#tabelData').DataTable().search(
            $('.tahun').val() + '-' + $('.bulan').val()
        ).draw();
    }
    $('.tahun').on('change', function() {
        filterData();
    });

    $('.bulan').on('change', function() {
        filterData();
    });

    function filterData2() {
        $('#tabelData').DataTable().search(
            $('.auto_search').val()
        ).draw();
    }
    $('#btn-search').on('click', function() {
        filterData2();
    });


    $(document).ready(function() {
        $('#tabelData').DataTable().search(
            $('.auto_search').val()
        ).draw();
    })


    $(document).ready(function() {
        console.log()
        $('#tabelData_wrapper').children().first().addClass('d-none')
    })
</script>
<?= $this->endSection(); ?>