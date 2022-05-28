<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Main::index');

$routes->get('/kategori/hapus/(:any)', 'Kategori::index');
$routes->delete('/kategori/hapus/(:any)', 'Kategori::hapus/$1');

$routes->get('/satuan/hapus/(:any)', 'Satuan::index');
$routes->delete('/satuan/hapus/(:any)', 'Satuan::hapus/$1');

$routes->get('/barang/hapus/(:any)', 'Barang::index');
$routes->delete('/barang/hapus/(:any)', 'Barang::hapus/$1');

$routes->get('/pinjambarang/hapusTransaksi/(:any)', 'Pinjambarang::index');
$routes->delete('/pinjambarang/hapusTransaksi/(:any)', 'Pinjambarang::hapusTransaksi/$1');

$routes->get('/pdf/cetak', 'PdfController::cetak');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}