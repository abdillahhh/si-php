<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Routes Ke views dan controller Akses

$routes->get('/', 'masterAkses::index');
//routes Akses
$routes->post('/login', 'masterAkses::open');
//routes Logout
$routes->get('/logout', 'masterAkses::logout');

//Routes Ke views dan controller Dashboard
$routes->get('/dashboard', 'masterDashboard::index');

//Routes Ke views dan controller Dashboard
$routes->get('/profile', 'masterUser::profile'); //selanjutnya akan dilakukan perbaikan untuk mengirimkan (:segment) berupa id

//Routes Ke views dan controller list Laporan dan Input Kegiatan
$routes->get('/listLaporan', 'masterLaporanHarian::listLaporan');
$routes->get('/inputKegiatan', 'masterLaporanHarian::inputKegiatan');

//Routes Ke views dan controller Kelola Master
$routes->get('/masterUser', 'masterKelolaMaster::masterUser');
$routes->get('/masterPegawai', 'masterKelolaMaster::masterPegawai');
$routes->get('/masterKegiatan', 'masterKelolaMaster::masterKegiatan');

//Routes Ke views dan controller Kelola Master Tambah
$routes->get('/tambahUser', 'masterKelolaMaster::tambahUser');

//Routes Ke views dan controller Sistem
$routes->get('/kelolaUser', 'masterSistem::kelolaUser');
$routes->get('/kelolaLevel', 'masterSistem::kelolaLevel');
$routes->get('/kelolaMenu', 'masterSistem::kelolaMenu');
$routes->get('/kelolaSubMenu', 'masterSistem::kelolaSubMenu');

//Routes ke update dan controller sistem
$routes->post('/updateMenu', 'masterSistem::updateMenu');
$routes->post('/updateSubmenu', 'masterSistem::updateSubmenu');

//Routes ke save dan controller sistem
$routes->post('/saveMenu', 'masterSistem::saveMenu');
$routes->post('/saveSubmenu', 'masterSistem::saveSubmenu');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}