<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('/plugins/fontawesome-free/css/all.min.css') ?>" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url('/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>" />
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('/plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('/dist/css/adminlte.min.css') ?>" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('/plugins/daterangepicker/daterangepicker.css') ?>" />
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('/plugins/summernote/summernote-bs4.min.css') ?>" />
  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?= base_url('/plugins/fullcalendar/main.css') ?>" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
  <!-- custom css -->
  <link rel="stylesheet" href="<?= base_url('/css/custom.css') ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="<?= base_url('/images/bps.png') ?>">
  <title><?= $title; ?></title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url('/images/1.jpg') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url('/images/1.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url('/images/1.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Profile Dropdown Menu -->
        <li class="nav-item dropdown">

          <a class="nav-link" data-toggle="dropdown" href="#"><?= session('fullname'); ?><i class="right fas fa-angle-down" style="margin-left: 10px"></i> </a>

          <div class="dropdown-menu dropdown-menu-md">
            <a href="<?= base_url('/profile') ?>" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <?php $list_level = session('list_user_level') ?>
            <?php foreach ($list_level as $list) : ?>
              <form action="<?= base_url('/switchLevel') ?>" method="POST">
                <input type="text" name="id" id="id" value="<?= $list['id']; ?>" class="d-none">
                <button type="submit" class="dropdown-item roles <?= ($list['id'] == session('level_id')) ? 'aktif' : '' ?>"><?= $list['nama_level']; ?></button>
              </form>
            <?php endforeach; ?>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('/logout') ?>" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #3c4b64;">
      <!-- Brand Logo -->
      <a href=" <?= base_url('/dashboard') ?>" class="brand-link" style="border: none">
        <img src="<?= base_url('images/BPS.png') ?>" alt="Logo BPS" class="brand-image image-circle" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">SIPHP</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 d-flex"></div>
        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: #4D5F7C; border: none;" />
            <div class="input-group-append">
              <button class="btn btn-sidebar" style="background-color: #3A4B68;">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php $list_menu = session('list_menu') ?>
            <?php $angle = '#' ?>
            <?php $list_submenu = session('list_submenu') ?>
            <?php foreach ($list_menu as $list) : ?>

              <?php if ($list['is_active'] == 'Y' && $list['view_level'] == 'Y') : ?>
                <li class="nav-item <?= ($menu == $list['nama_menu']) ? 'menu-open' : '' ?>">
                  <a href="<?= base_url($list['link']); ?>" class="nav-link <?= ($menu == $list['nama_menu']) ? 'active' : '' ?>">
                    <i class="nav-icon <?= $list['icon']; ?>"></i>
                    <p><?= $list['nama_menu']; ?>
                      <?php foreach ($list_submenu as $sub) {
                        if ($sub['menu_id'] == $list['id'])
                          $angle = 'right fas fa-angle-left';
                      }  ?>
                      <i class="<?= $angle; ?>"></i>
                    </p>
                  </a>
                  <?php if ($angle != '#') : ?>
                    <ul class="nav nav-treeview">
                      <?php foreach ($list_submenu as $sub) : ?>
                        <?php if (($sub['menu_id'] == $list['id']) && $sub['is_active'] == 'Y' && $sub['view_level'] == 'Y') :  ?>
                          <li class="nav-item">
                            <a href="<?= base_url($sub['link']); ?>" class="nav-link <?= ($subMenu == $sub['nama_submenu']) ? 'active' : '' ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p><?= $sub['nama_submenu']; ?></p>
                            </a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>
              <?php endif; ?>

            <?php endforeach; ?>


        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- jQuery -->
    <script src="<?= base_url('/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- RENDER DARI HALAMAN LAIN -->
    <div>
      <?= $this->renderSection('content'); ?>
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; Magang 2022. </strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Powered by</b> <a target="_blank" href="https://adminlte.io">AdminLTE.io</a>
      </div>
    </footer>

    <!-- date-range-picker -->
    <script src="<?= base_url('/plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('/plugins/chart.js/Chart.min.js') ?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('/plugins/sparklines/sparkline.js') ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('/plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/dist/js/adminlte.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('/dist/js/demo.js') ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('/dist/js/pages/dashboard.js') ?>"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="<?= base_url('/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('/plugins/fullcalendar/main.js') ?>"></script>
    <script src="<?= base_url('/js/kalender.js') ?>"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?= base_url('/plugins/chart.js/Chart.min.js') ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('/dist/js/pages/dashboard3.js') ?>"></script>
    <script src="<?= base_url('/js/waktu.js') ?>"></script>
</body>

</html>