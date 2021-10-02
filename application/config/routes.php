<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] 				= 'Login/proses';
$route['logout'] 				= 'Login/logout';
$route['dashboard']				= 'Dashboard';

//admin
$route['pengguna'] 				    = 'Pengguna';
$route['tambah-pengguna'] 	        = 'Pengguna/tambah';
$route['tambah-pengguna-modal'] 	= 'Pengguna/tambah_modal';
$route['edit-pengguna/(:any)'] 	    = 'Pengguna/edit/$1';
$route['hapus-pengguna/(:any)']     = 'Pengguna/hapus/$1';
$route['setting']			    	= 'Pengguna/setting';

$route['paket'] 				    = 'Paket';
$route['tambah-paket'] 	        	= 'Paket/tambah';
$route['edit-paket/(:any)'] 	    = 'Paket/edit/$1';
$route['hapus-paket/(:any)']     	= 'Paket/hapus/$1';

$route['pelanggan'] 				    = 'Pelanggan';
$route['tambah-pelanggan'] 	        	= 'Pelanggan/tambah';
$route['edit-pelanggan/(:any)'] 	    = 'Pelanggan/edit/$1';
$route['hapus-pelanggan/(:any)']     	= 'Pelanggan/hapus/$1';

$route['tambah-tagihan']	= 'Tagihan/tambah';
$route['tagihan']			= 'Tagihan';
$route['riwayat-tagihan']	= 'Tagihan/riwayat';
$route['bayar-tagihan/(:any)']		= 'Tagihan/bayar/$1';
$route['cetak-tagihan/(:any)']		= 'Tagihan/cetak/$1';
$route['notif-pelanggan/(:any)']		= 'Tagihan/notifikasi/$1';
$route['notif-pelanggan-sudah-bayar/(:any)']		= 'Tagihan/notifikasi_sudah_bayar/$1';