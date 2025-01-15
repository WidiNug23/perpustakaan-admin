<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->setAutoRoute(true);
$routes->get('home', 'PerpusController::index');
$routes->addRedirect('/', 'home');

$routes->get('admin-perpustakaan/buku', 'PerpusController::buku');
$routes->get('admin-perpustakaan/tambah-buku', 'PerpusController::tambahBuku');
$routes->post('admin-perpustakaan/tambah-buku', 'PerpusController::tambahBuku');
$routes->get('admin-perpustakaan/edit-buku/(:num)', 'PerpusController::editBuku/$1'); 
$routes->post('admin-perpustakaan/edit-buku/(:num)', 'PerpusController::updateBuku/$1');  
$routes->get('admin-perpustakaan/hapus-buku/(:num)', 'PerpusController::hapusBuku/$1'); 

$routes->get('admin-perpustakaan/member', 'PerpusController::member');
$routes->get('admin-perpustakaan/tambah-member', 'PerpusController::tambahMember');
$routes->post('admin-perpustakaan/tambah-member', 'PerpusController::tambahMember');
$routes->get('admin-perpustakaan/edit-member/(:num)', 'PerpusController::editMember/$1');  
$routes->post('admin-perpustakaan/edit-member/(:num)', 'PerpusController::editMember/$1');    
$routes->get('admin-perpustakaan/hapus-member/(:num)', 'PerpusController::hapusMember/$1'); 

$routes->get('admin-perpustakaan/petugas', 'PerpusController::petugas');
$routes->get('admin-perpustakaan/tambah-petugas', 'PerpusController::tambahPetugas');
$routes->post('admin-perpustakaan/tambah-petugas', 'PerpusController::tambahPetugas');
$routes->get('admin-perpustakaan/edit-petugas/(:num)', 'PerpusController::editPetugas/$1');  
$routes->post('admin-perpustakaan/edit-petugas/(:num)', 'PerpusController::editPetugas/$1');    
$routes->get('admin-perpustakaan/hapus-petugas/(:num)', 'PerpusController::hapusPetugas/$1'); 

$routes->get('admin-perpustakaan/peminjaman', 'PerpusController::peminjaman');
$routes->get('admin-perpustakaan/tambah-peminjaman', 'PerpusController::tambahPeminjaman');
$routes->post('admin-perpustakaan/tambah-peminjaman', 'PerpusController::tambahPeminjaman');
$routes->get('admin-perpustakaan/edit-peminjaman/(:num)', 'PerpusController::editPeminjaman/$1');  
$routes->post('admin-perpustakaan/edit-peminjaman/(:num)', 'PerpusController::editPeminjaman/$1');    
$routes->get('admin-perpustakaan/hapus-peminjaman/(:num)', 'PerpusController::hapusPeminjaman/$1'); 
$routes->get('admin-perpustakaan/done-peminjaman/(:num)', 'PerpusController::donePeminjaman/$1');
$routes->get('admin-perpustakaan/get-peminjaman-detail/(:num)', 'PerpusController::getPeminjamanDetail/$1');

$routes->get('admin-perpustakaan/pengembalian', 'PerpusController::pengembalian');
$routes->get('admin-perpustakaan/tambah-pengembalian', 'PerpusController::tambahPengembalian');
$routes->post('admin-perpustakaan/tambah-pengembalian', 'PerpusController::tambahPengembalian');
$routes->get('admin-perpustakaan/hapus-pengembalian/(:num)', 'PerpusController::hapusPengembalian/$1'); 

