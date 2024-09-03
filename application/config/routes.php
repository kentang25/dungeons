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
$route['default_controller'] = '';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;

// --- Admin ---
$route['admin'] = 'dg_admin/dashboard';
$route['admin/data-barang'] = 'dg_admin/data_barang';
$route['admin/invoices'] = 'dg_admin/invoice';
$route['admin/search'] = 'dg_admin/search';

$route['admin/data-barang/edit/(:num)'] 	= 'dg_admin/data_barang/edit/$1';
$route['admin/data-barang/delete/(:num)'] 	= 'dg_admin/data_barang/delete/$1';
$route['admin/data-barang/detail/(:num)'] 	= 'dg_admin/data_barang/detail/$1';

$route['admin/invoices/detail/(:num)']	= 'dg_admin/invoice/detail/$1';

// --- Auth ---

$route['admin/halaman-register'] 	= 'auth/register';
$route['admin/halaman-login'] 	= 'auth/login';

// --- Auth-User ---

$route['halaman-register'] = 'dungeons/auth_user/register';
$route['halaman-login'] = 'dungeons/auth_user/login';

// --- Dungeons ---
$route['dashboard']		= 'dungeons/dashboard';

// --- Kategori ---
$route['categories/pakaian-pria']	= 'kategori/pakaian_pria';
$route['categories/shoes']			= 'kategori/shoes';
$route['categories/accessories']	= 'kategori/accessories';
$route['categories/cassette']		= 'kategori/kaset';

// --- detail barang ---

$route['detail-barang/(:num)']		= 'dungeons/cart/detail/$1';

// --- shop ---

$route['shop']	= 'dungeons/dashboard/shop';

// --- search ---

$route['search'] = 'dungeons/dashboard/search';

// --- keranjang ---

$route['keranjang'] 	= 'dungeons/cart';
$route['tambah-keranjang/(:num)'] = 'dungeons/cart/addCart/$1';
$route['contents-keranjang'] = 'dungeons/cart/contents';

// $route['keranjang/(:num)'] 	= 'dungeons/dashboard/keranjang/$1';
// $route['keranjang/detail']	= 'dungeons/dashboard/detail_keranjang';
$route['keranjang/detail/(:any)']	= 'dungeons/cart/view_cart/$1';
$route['keranjang/total']	= 'dungeons/cart/total_cart';
$route['keranjang/hapus']	= 'dungeons/dashboard/hapus_keranjang';

// --- pembayaran ---

$route['checkout/(:any)'] = 'dungeons/pembayaran/checkout/$1';
$route['cart/pembayaran/(:any)'] = 'dungeons/cart/pembayaran/$1';
$route['transaksi/(:any)/(:any)'] = 'dungeons/pembayaran/transaksi/$1/$2';
$route['beli/(:num)'] = 'dungeons/dashboard/beli/$1';
$route['proses-pembayaran'] = 'dungeons/pembayaran/delete_data';

