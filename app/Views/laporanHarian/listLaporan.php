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
                                        <th>URAIAN KEGIATAN</th>
                                        <th>JUMLAH</th>
                                        <th>SATUAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($list_laporan_harian != NULL) : ?>
                                        <?php foreach ($list_laporan_harian as $list) : ?>
                                            <tr>
                                                <td><?= $list['id']; ?></td>
                                                <td><?= $list['tgl_kegiatan']; ?></td>
                                                <?php $laporan = $list['uraian_kegiatan']; ?>
                                                <?php $data = json_decode($laporan); ?>
                                                <?php $list_uraian = $data->uraian; ?>
                                                <td><?php foreach ($list_uraian as $uraian) : ?>
                                                        <?= $uraian; ?>
                                                        <br>
                                                    <?php endforeach; ?>
                                                </td>
                                                <?php $list_jumlah = $data->jumlah; ?>
                                                <td><?php foreach ($list_jumlah as $jumlah) : ?>
                                                        <?= $jumlah; ?>
                                                        <br>
                                                    <?php endforeach; ?>
                                                </td>
                                                <?php $list_satuan2 = $data->satuan; ?>
                                                <td><?php foreach ($list_satuan2 as $satuan) : ?>
                                                        <?= $satuan; ?>
                                                        <br>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>
                                                    <button type="button" id="btn-detail" class="btn btn-info btn-xs tombol" style="background-color: #E18939; border:none;" data-toggle="modal" data-target="#modal-detail">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button" id="btn-edit" class="btn btn-info btn-xs tombol" style="background-color: #2D95C9; border:none;" data-toggle="modal" data-target="#modal-edit">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>

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
        <form action="<?= base_url('/saveLaporanHarian'); ?>" method="post" class="modal-content" enctype="multipart/form-data">
            <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Laporan Kegiatan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="form-group">

                            <input type="date" id="hari-ini" class="form-control" disabled>
                            <input type="date" class="d-none" name="tanggal" id="hari-ini-2" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- lama -->
                <div id="lama">
                    <div class="row rounded position-relative pt-2 bg-gray-light">
                        <div class="col-1 baris-kegiatan">
                            <div class="row"><strong>NO</strong></div>
                            <div class="row">1</div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Uraian Kegiatan</strong></div>
                            <div class="row px-1">
                                <div class="form-group">
                                    <textarea class="form-control" name="field_uraian[]" rows="3" placeholder="Masukkan Uraian Kegiatan ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Jumlah</strong></div>
                            <div class="row px-1">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="field_jumlah[]" placeholder="Jumlah ...">
                                </div>
                            </div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Satuan</strong></div>
                            <div class="row px-1">
                                <div class="input-group ">
                                    <select class=" form-control" name="field_satuan[]">
                                        <?php if ($list_satuan != NULL) : ?>
                                            <?php foreach ($list_satuan as $satuan) : ?>
                                                <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Hasil Kegiatan</strong></div>
                            <div class="row px-1">
                                <div class="form-group">
                                    <textarea class="form-control" name="field_hasil[]" rows="3" placeholder="Masukkan Hasil Kegiatan ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 baris-kegiatan">
                            <div class="row"><strong>Bukti Dukung</strong></div>
                            <div class="row w-100">
                                <div class="form-group w-100">
                                    <input class="form-control" type="file" name="field_bukti1[]" id="formFileMultiple" multiple />
                                </div>
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
<script src="<?= base_url('Plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('Plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- dropzonejs -->
<script src="<?= base_url('Plugins/dropzone/min/dropzone.min.js') ?>"></script>

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
    var date = new Date();
    var currentDate = date.toISOString().slice(0, 10);
    document.getElementById('hari-ini').value = currentDate;
    document.getElementById('hari-ini-2').value = currentDate;
    $(document).ready(function() {
        jalankanSummernote()
    })

    function jalankanSummernote() {
        // Summernote
        $('[id^="bukti_dukung"]').each(function() {
            $(this).summernote({
                placeholder: 'Link/list bukti kegiatan',
                height: 120,
                style: false,
                toolbar: [
                    ['para', ['ul', 'ol']],
                    ['insert', ['link', 'picture', 'video', 'file']],
                ]
            });
        })
    };
</script>

<script>
    $(document).ready(function() {

        $(document).on("click", '#hapus-baris', function() {
            $(this).parent().remove()
        })


        $('[id^="tambah-baris"]').click(function() {
            let noBaris = $('#lama').children().length + $('#baru').children().length + 1;
            $('#baru').append(`
        <div class="row mt-4 rounded position-relative pt-2 bg-gray-light">
                        <span id="hapus-baris" type="button" class="delete-kegiatan"><i class="fas fa-times"></i></span>
                        <div class="col-1 baris-kegiatan">
                            <div class="row"><strong>NO</strong></div>
                            <div class="row">` + noBaris + `</div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Uraian Kegiatan</strong></div>
                            <div class="row px-1">
                                <div class="form-group">
                                    <textarea class="form-control" name="field_uraian[]" rows="3" placeholder="Masukkan Uraian Kegiatan ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Jumlah</strong></div>
                            <div class="row px-1">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="field_jumlah[]" placeholder="Jumlah ...">
                                </div>
                            </div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Satuan</strong></div>
                            <div class="row px-1">
                                <div class="input-group ">
                                <select class=" form-control" name="field_satuan[]">
                                        <?php if ($list_satuan != NULL) : ?>
                                            <?php foreach ($list_satuan as $satuan) : ?>
                                                <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 baris-kegiatan">
                            <div class="row"><strong>Hasil Kegiatan</strong></div>
                            <div class="row px-1">
                                <div class="form-group">
                                    <textarea class="form-control" name="field_hasil[]" rows="3" placeholder="Masukkan Hasil Kegiatan ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 baris-kegiatan">
                            <div class="row"><strong>Bukti Dukung</strong></div>
                            <div class="row w-100">
                                <div class="form-group w-100">
                                    <input class="form-control" type="file" name="field_bukti` + noBaris + `[]" id="formFileMultiple" multiple />
                                </div>
                            </div>
                        </div>
                    </div>
        `)
            jalankanSummernote()
        })
    })
</script>

<?= $this->endSection(); ?>