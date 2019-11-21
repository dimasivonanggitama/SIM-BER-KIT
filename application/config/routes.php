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
$route['default_controller'] = 'user';

$route['admin'] 								= 'adminController/index';
$route['adminIntersection/(:any)/(:any)'] 		= 'adminController/adminIntersection';
$route['dataKonsumen'] 							= 'adminController/dataKonsumen';
$route['dataKonsumen/(:num)'] 					= 'adminController/dataKonsumen';
$route['dataKonsumen_add'] 						= 'adminController/dataKonsumen_add';
$route['dataKonsumen_delete'] 					= 'adminController/dataKonsumen_delete';
$route['dataKonsumen_delete_all'] 				= 'adminController/dataKonsumen_delete_all';
$route['dataKonsumen_filter'] 					= 'adminController/dataKonsumen_filter';
$route['dataKonsumen_filter_reset'] 			= 'adminController/dataKonsumen_filter_reset';
$route['dataKonsumen_sort'] 					= 'adminController/dataKonsumen_sort';
$route['dataKonsumen_sort_reset'] 				= 'adminController/dataKonsumen_sort_reset';
$route['dataKonsumen_update'] 					= 'adminController/dataKonsumen_update';
$route['dataVarietasBenihSumberJeruk'] 			= 'adminController/getDataVarietasBenihSumberJeruk';
$route['dataVarietasBenihSumberJeruk/(:num)'] 	= 'adminController/getDataVarietasBenihSumberJeruk';
$route['deleteData/(:any)/(:any)']				= 'adminController/deleteData';
$route['editDataTable/(:any)'] 					= 'adminController/editDataTable';
$route['filterTable/(:any)'] 					= 'user/filterTable';
$route['guestIntersection/(:any)/(:any)'] 		= 'user/guestIntersection';
$route['infoVarietasBenihSumberJeruk'] 			= 'user/getInformasiVarietas';
$route['infoVarietasBenihSumberJeruk/(:num)'] 	= 'user/getInformasiVarietas';
$route['postData/(:any)'] 						= 'adminController/postData';
$route['reset_filterTable/(:any)'] 				= 'user/reset_filterTable';
$route['reset_sortTable/admin/(:any)'] 			= 'adminController/reset_sortTable';
$route['reset_sortTable/guest/(:any)'] 			= 'user/reset_sortTable';
$route['sortTable/admin/(:any)'] 				= 'adminController/sortTable';
$route['sortTable/guest/(:any)'] 				= 'user/sortTable';
$route['home'] 									= 'user/index';
$route['login'] 								= 'user/login';
$route['logout'] 								= 'adminController/logout';
$route['permintaan'] 							= 'user/permintaan';
$route['permintaan_add'] 						= 'user/permintaan_add';

$route['test'] 									= 'user/test_page';

// $route['admin/editNews'] 	= 'admin_Konten/editNews';
// $route['admin/ourClient'] 	= 'admin_Konten/addClient';
// $route['admin/getNews'] 	= 'admin_Konten/getNews';
// $route['admin/manageAccount'] 	= 'admin_Sistem/addAccount';
//$route['admin_Sistem/addNews'] = '/user/login';

//$route['default_controller'] = '';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;