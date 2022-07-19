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
                <div class="<?= $class_modal_default; ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <img class="img-fluid" style="width: 100%;" src="<?= base_url('images/default.jpg') ?>" alt="">
                                </div>
                                <div class="col-md-6 p-2">
                                    <h2 class="font-weight-bold">Username</h2>
                                    <p id="oldRole" class="text-gray">Level User</p>
                                    <!-- FORM -->
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 px-5">
                                    <!-- KETERANGAN -->
                                    <div class="col-md-12">
                                        <strong>Nama Lengkap</strong>
                                        <p class="text-muted">
                                            -
                                        </p>

                                        <strong>NIP Lama</strong>
                                        <p class="text-muted">
                                            -
                                        </p>

                                        <strong>Email</strong>
                                        <p class="text-muted">-</p>

                                        <strong>Status Akun</strong>
                                        <div>
                                            <span class="badge badge px-2">
                                                -
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="<?= $class_modal_setup; ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <img class="img-fluid" style="width: 100%;" src="<?= base_url('images/default.jpg') ?>" alt="">
                                    <?php if ($show_data_user != NULL) : ?>
                                        <input type="hidden" name='image' value="<?= $show_data_user['image']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 p-2">
                                    <h2 class="font-weight-bold"><?php if ($show_data_user != NULL) {
                                                                        echo $show_data_user['username'];
                                                                    }  ?></h2>
                                    <div class="row">
                                        <?php if ($show_list_level != NULL) : ?>
                                            <?php foreach ($show_list_level as $level) : ?>
                                                <p>&nbsp;&nbsp;</p>
                                                <p id="oldRole" class="text-gray"><?= $level['nama_level']; ?></p>
                                                <p>&nbsp;&nbsp;|</p>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                    <!-- FORM -->
                                    <form action="<?= base_url() ?>" method="POST" enctype="multipart/form-data" id="roleForm" class="row d-none">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Role/level</label>
                                                <div id="roles">
                                                    <!-- foreach disini -->
                                                    <?php if ($show_list_level != NULL) : ?>
                                                        <?php for ($i = 0; $i < count($show_list_level); $i++) : ?>
                                                            <select name="level_id<?= $i; ?>" class="form-control form-control-sm mr-2 mb-2" style="border-radius: 5px;">
                                                                <option value="<?= $show_list_level[$i]['level_id']; ?>"><?= $show_list_level[$i]['nama_level']; ?></option>
                                                                <?php if ($level_tersedia != NULL) : ?>
                                                                    <?php foreach ($level_tersedia as $tersedia) : ?>
                                                                        <option value="<?= $tersedia['id']; ?>"><?= $tersedia['nama_level']; ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                    <!-- endforeach -->
                                                    <div class="row">
                                                        <div class="col-12 ">
                                                            <div class="float-right">
                                                                <button type="button" data-toggle="modal" data-target="#modal-tambah-role" class="btn btn-success btn-sm tombol" style="background-color: #3c4b64; border: none;">Tambah Role</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <?php if ($show_data_user != NULL) : ?>
                                                    <label for="role">Status</label>
                                                    <select name="is_active" class="form-control form-control-sm mr-2" style="border-radius: 5px;">
                                                        <option value="<?php if ($show_data_user['is_active'] == 'Y') {
                                                                            echo 'Y';
                                                                        } else {
                                                                            echo 'N';
                                                                        } ?>"><?php if ($show_data_user['is_active'] == 'Y') {
                                                                                    echo 'Active';
                                                                                } else {
                                                                                    echo 'Non-active';
                                                                                } ?></option>
                                                        <option value="<?php if ($show_data_user['is_active'] != 'Y') {
                                                                            echo 'Y';
                                                                        } else {
                                                                            echo 'N';
                                                                        } ?>"><?php if ($show_data_user['is_active'] != 'Y') {
                                                                                    echo 'Active';
                                                                                } else {
                                                                                    echo 'Non-active';
                                                                                } ?></option>
                                                    </select>
                                                <?php endif; ?>
                                            </div>

                                            <div>
                                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save mr-1"></i> Simpan</button>
                                                <button type="button" id="cancel" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                            </div>
                                        </div>

                                    </form>
                                    <button id="openRole" class="btn btn-info btn-sm tombol" style="background-color: #2D95C9; border:none;"><i class="fas fa-pen mr-1"></i> Ubah Data</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 px-5">
                                    <!-- KETERANGAN -->

                                    <?php if ($show_data_user != NULL) : ?>
                                        <input type="hidden" name='id_user' value="<?= $show_data_user['id']; ?>">
                                        <input type="hidden" name='password' value="<?= $show_data_user['password']; ?>">
                                        <input type="hidden" name='token' value="<?= $show_data_user['token']; ?>">
                                        <div class="col-md-12">
                                            <strong>Nama Lengkap</strong>
                                            <input type="hidden" name='fullname' value="<?= $show_data_user['fullname']; ?>">
                                            <p class="text-muted">
                                                <?= $show_data_user['fullname']; ?>
                                            </p>

                                            <strong>NIP Lama</strong>
                                            <input type="hidden" name='nip_lama_user' value="<?= $show_data_user['nip_lama_user']; ?>">
                                            <p class="text-muted">
                                                <?= $show_data_user['nip_lama_user']; ?>
                                            </p>

                                            <strong>Email</strong>
                                            <input type="hidden" name='email' value="<?= $show_data_user['email']; ?>">
                                            <p class="text-muted"><?= $show_data_user['email']; ?></p>

                                            <strong>Status Akun</strong>
                                            <input type="hidden" name='is_active' value="<?= $show_data_user['is_active']; ?>">
                                            <div>
                                                <?php if ($show_data_user['is_active'] == 'Y') : ?>
                                                    <span class="badge badge-success px-2">active</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger px-2">non-active</span>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
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
                                <select class="form-control filter mr-2" style="border-radius: 5px;">
                                    <option selected disabled>- Status Akun -</option>
                                    <option value="active">Active</option>
                                    <option value="non-active">Non-active</option>
                                </select>
                                <button type="button" data-toggle="modal" data-target="#modal-tambah-user" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i> Tambah</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="input-group input-group-md pt-3 px-4" style="width: 250px">
                                    <input type="search" id="pencarian" name="table_search" class="form-control float-right" placeholder="Search ..." />
                                </div>

                                <form action="/showDataUser" method="POST">
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive px-0 overflow-hidden">
                                        <table class="table table-hover text-nowrap" id="tabelData">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">NO.</th>
                                                    <th>USERNAME</th>
                                                    <th>STATUS AKUN</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                <?php foreach ($list_user as $list) : ?>

                                                    <tr>
                                                        <td class="text-center"><?= $no++ ?></td>
                                                        <td><?= $list['username']; ?></td>
                                                        <td>
                                                            <?php if ($list['is_active'] == 'Y') {

                                                                echo '<span class="badge bg-success">active</span>';
                                                            } else {
                                                                echo '<span class="badge bg-danger">non-active</span>';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('/showDataUser/' . $list['id']); ?>" type="submit" class="btn btn-info btn-xs tombol" style="background-color: #2D95C9; border:none;"><i class="fas fa-pen"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL TAMBAH USER -->
<div class="modal fade" id="modal-tambah-user">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <form action="<?= base_url('') ?>" method="POST" class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Pilih Level</label>
                <div class="d-flex flex-row justify-content-start align-content-center mb-4">
                    <div class="pilih-level">
                        <label for="administrator" class="checkbox-level">
                            <input class="d-none" type="checkbox" name="administrator" id="administrator" checked>
                            <i class="far fa-check-square"></i>
                            Administrator
                        </label>
                    </div>

                    <div class="pilih-level">
                        <label for="pegawai" class="checkbox-level active">
                            <input class="d-none" type="checkbox" name="pegawai" id="pegawai">
                            <i class="far fa-square"></i>
                            Pegawai
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username ...">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="XyHwupo01A" disabled>
                </div>
                <hr class="mb-5">
                <div class="form-group">
                    <label>Cari Pegawai</label>
                    <input type="text" id="cari_pegawai" class="form-control" placeholder="Search ...">
                </div>

                <div class="row">
                    <div class="col-5 pr-4">
                        <img class="img-fluid" style="width: 100%;" src="<?= base_url('images/default.jpg') ?>" alt="">
                    </div>
                    <div class="col-7 pl-4 border-left">
                        <strong>Nama Lengkap</strong>
                        <p class="text-muted">

                        </p>

                        <strong>NIP Lama</strong>
                        <p class="text-muted">

                        </p>

                        <strong>Email</strong>
                        <p class="text-muted"></p>

                        <strong>Telepon</strong>
                        <p class="text-muted">

                        </p>

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

<!-- MODAL TAMBAH ROLE -->
<div class="modal fade" style="padding-top: 13%;" id="modal-tambah-role">
    <div class="modal-dialog">
        <form action="<?= base_url('') ?>" method="POST" class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Level</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Level</label>
                    <select name="role" class="form-control" style="border-radius: 5px;">
                        <?php if ($level_tersedia != NULL) : ?>
                            <?php foreach ($level_tersedia as $tersedia) : ?>
                                <option value="<?= $tersedia['id']; ?>"><?= $tersedia['nama_level']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
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

<!-- jQuery -->
<!-- 
<script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/jquery-ui.min.js') ?>"></script> -->
<!-- AUTOFILL PEGAWAI -->
<script>
    $(document).ready(function() {
        $("#cari_pegawai").autocomplete({
            minLength: 2,
            source: '<?php echo site_url('masterUser/get_autofillPegawai/?') ?>',
            focus: function(event, ui) {
                $("#cari_pegawai").val(ui.item.label);
                return false;
            },
            select: function(event, ui) {
                $("#cari_pegawai").val(ui.item.label);
                return false;
            }
        })
        console.log(ui.item.label)
    });
</script>
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


<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            if ($(this).prop('checked') == true) {
                $(this).parent().toggleClass('active')
                $(this).siblings().removeClass().addClass('far fa-check-square')
            } else if ($(this).prop('checked') == false) {
                $(this).parent().toggleClass('active')
                $(this).siblings().removeClass().addClass('far fa-square')
            }
        })
    })
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
        "pageLength": 10

    });

    $('.filter').on('change', function() {
        $('#tabelData').DataTable().search(
            $(this).val()
        ).draw();
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
</script>


<?= $this->endSection(); ?>