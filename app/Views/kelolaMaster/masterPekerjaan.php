<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Pekerjaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Master Pekerjaan</li>
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
                            <h6 class="w-100 text-right">Tabel Pekerjaan</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="input-group input-group-md pt-3 px-4">
                                    <div class="row">
                                        <div class="col">
                                            <input type="search" id="pencarian" name="keyword" class="form-control float-right rounded" placeholder="Search ..." />

                                        </div>
                                    </div>

                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive px-0">
                                    <table class="table table-hover text-nowrap" id="tabelData">
                                        <thead>
                                            <tr>
                                                <th>NO.</th>
                                                <th>NAMA PEKERJAAN</th>
                                                <th>TANGGAL DIBUAT</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php if ($list_pekerjaan != null) : ?>
                                                <?php foreach ($list_pekerjaan as $pekerjaan) : ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $pekerjaan['nmkerjaan']; ?></td>
                                                        <td><?= $pekerjaan['created_at']; ?></td>
                                                        <td>
                                                            <a href="<?= base_url('/hapusMasterPekerjaan/' . $pekerjaan['id']) ?>" type="button" title="Hapus" id="del-pekerjaan" class="btn btn-info btn-xs tombol" style="background-color: #FF0000; border:none;">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL TAMBAH PEKERJAAN -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <form action="<?= base_url('/tambahPekerjaan') ?>" method="POST" class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pekerjaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="nama_pekerjaan" class="form-control" placeholder="Pekerjaan ...">
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



<script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
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

    $(document).on('change', '#es3_kd', function() {
        var selectedValue = $(this).val();
        $('#es4_kd option').each(function() {
            var optionValue = $(this).val();
            if (optionValue.substring(0, 1) === selectedValue) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
</script>



<script type="text/javascript">
    $('#tabelData').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        'ordering': false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 30,
        columnDefs: [{
                responsivePriority: 1,
                targets: 1
            },
        ]

    });

    $('#tabelData_wrapper').children().first().addClass('d-none')
    $('.dataTables_paginate').addClass('Pager2').addClass('float-right')
    $('.dataTables_info').addClass('text-sm text-gray py-2')
    $('.dataTables_paginate').parent().parent().addClass('card-footer clearfix')

    $(document).on('keyup', '#pencarian', function() {
        $('#tabelData').DataTable().search(
            $(this).val()
        ).draw();
    })
    $(document).on('change', '#satker', function() {
        $('#tabelData').DataTable().search(
            $(this).val()
        ).draw();
    })

    <?php if (session()->getFlashdata('pesan')) { ?>
        Swal.fire({
            title: "<?= session()->getFlashdata('pesan') ?>",
            icon: "<?= session()->getFlashdata('icon') ?>",
            showConfirmButton: true,
        });
    <?php } ?>
</script>
</script>

<?= $this->endSection(); ?>