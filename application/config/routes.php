<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Auth
$route['login'] = 'Auth';
$route['logout'] = 'Auth/logout';
$route['forget-password'] = 'Auth/forgetPassword';
// Beasiswa
$route['beasiswa'] = 'Beasiswa';
$route['add-beasiswa'] = 'Beasiswa/form';
$route['update-beasiswa/(:num)'] = 'Beasiswa/form/$1';
$route['delete-beasiswa/(:num)'] = 'Beasiswa/delete/$1';
// Detail Beasiswa
$route['detailbeasiswa/(:num)'] = 'Detailbeasiswa/index/$1';
$route['add-detailbeasiswa/(:num)'] = 'Detailbeasiswa/form/$1';
$route['update-detailbeasiswa/(:num)/(:num)'] = 'Detailbeasiswa/form/$1/$2';
$route['delete-detailbeasiswa/(:num)/(:num)'] = 'Detailbeasiswa/delete/$1/$2';
// Kriteria
$route['kriteria'] = 'Kriteria';
$route['add-kriteria'] = 'Kriteria/form';
$route['update-kriteria/(:num)'] = 'Kriteria/form/$1';
$route['delete-kriteria/(:num)'] = 'Kriteria/delete/$1';
// Detail Kriteria
$route['detailkriteria/(:num)'] = 'Detailkriteria/index/$1';
$route['add-detailkriteria/(:num)'] = 'Detailkriteria/form/$1';
$route['update-detailkriteria/(:num)/(:num)'] = 'Detailkriteria/form/$1/$2';
$route['delete-detailkriteria/(:num)/(:num)'] = 'Detailkriteria/delete/$1/$2';
// Mahasiswa
$route['mahasiswa'] = 'Mahasiswa';
$route['add-mahasiswa'] = 'Mahasiswa/form';
$route['update-mahasiswa/(:num)'] = 'Mahasiswa/form/$1';
$route['delete-mahasiswa/(:num)'] = 'Mahasiswa/delete/$1';
// Prodi
$route['prodi'] = 'Prodi';
$route['add-prodi'] = 'Prodi/form';
$route['update-prodi/(:num)'] = 'Prodi/form/$1';
$route['delete-prodi/(:num)'] = 'Prodi/delete/$1';
// Kuota
$route['kuota'] = 'Kuota';
$route['add-kuota'] = 'Kuota/form';
$route['update-kuota/(:num)'] = 'Kuota/form/$1';
$route['delete-kuota/(:num)'] = 'Kuota/delete/$1';
//Pendaftaran
$route['daftar'] = 'Pendaftaran';
$route['daftar/(:any)'] = 'Pendaftaran/register/$1';
// Datamahasiswa
$route['datamahasiswa'] = 'Datamahasiswa';
$route['add-datamahasiswa/(:any)/(:num)'] = 'Datamahasiswa/form/$1/$2';
$route['update-datamahasiswa/(:any)/(:num)/(:num)'] = 'Datamahasiswa/form/$1/$2/$3';
$route['delete-datamahasiswa/(:num)'] = 'Datamahasiswa/delete/$1';
// User
$route['user'] = 'User';
$route['add-user'] = 'User/form';
$route['update-user/(:num)'] = 'User/form/$1';
$route['delete-user/(:num)'] = 'User/delete/$1';
$route['change-password'] = 'User/updatePassword';
// Perhitungan
$route['hitung'] = 'Perhitungan';
$route['proses-hitung'] = 'Perhitungan/hitung';
// Laporan
$route['laporan/(:num)'] = 'Laporan/index/$1';
$route['ranking/(:num)'] = 'Laporan/rank/$1';
$route['konfirmasi/(:num)/(:num)'] = 'Laporan/konfirmasi/$1/$2';
$route['hasil/(:num)/(:num)'] = 'Laporan/hasil/$1/$2';
$route['cetak-hasil/(:num)/(:num)/(:num)'] = 'Laporan/cetak/$1/$2/$3';
