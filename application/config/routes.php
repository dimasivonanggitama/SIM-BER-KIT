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
$route['default_controller'] = 'guestController';

$route['admin'] 									= 'adminController/index';
$route['adminIntersection/(:any)/(:any)']			= 'adminController/adminIntersection';	//(1) = adminIntersection (2) = (:any) function name, (3) = (:any) page URL
$route['adminIntersection/(:any)/(:any)/(:any)']	= 'adminController/adminIntersection';	//(1) = adminIntersection (2) = (:any) function name, (3) = (:any) page URL, (4) = (:any) table name
$route['dataDistribusi'] 							= 'adminController/getDataDistribusi';
$route['dataDistribusi/(:num)'] 					= 'adminController/getDataDistribusi';
$route['dataKonsumen'] 								= 'adminController/getDataKonsumen';
$route['dataKonsumen/(:num)'] 						= 'adminController/getDataKonsumen';
$route['dataPermintaan'] 							= 'adminController/getDataPermintaan';
$route['dataPermintaan/(:num)'] 					= 'adminController/getDataPermintaan';
$route['dataVarietasBenihSumberJeruk'] 				= 'adminController/getDataVarietasBenihSumberJeruk';
$route['dataVarietasBenihSumberJeruk/(:num)'] 		= 'adminController/getDataVarietasBenihSumberJeruk';
$route['deleteData/(:any)/(:any)']					= 'adminController/deleteData';
$route['editDataTable/(:any)'] 						= 'adminController/editDataTable';
$route['filterTable/(:any)'] 						= 'guestController/filterTable';
$route['guestIntersection/(:any)/(:any)'] 			= 'guestController/guestIntersection';	//(1) = guestIntersection (2) = (:any) function name, (3) = (:any) page URL
$route['guestIntersection/(:any)/(:any)/(:any)'] 	= 'guestController/guestIntersection';	//(1) = guestIntersection (2) = (:any) function name, (3) = (:any) page URL
$route['infoDistribusi'] 							= 'guestController/getInfoDistribusi';
$route['infoDistribusi/(:num)'] 					= 'guestController/getInfoDistribusi';
$route['infoKonsumen'] 								= 'guestController/getInfoKonsumen';
$route['infoKonsumen/(:num)'] 						= 'guestController/getInfoKonsumen';
$route['infoPermintaan'] 							= 'guestController/getInfoPermintaan';
$route['infoVarietasBenihSumberJeruk'] 				= 'guestController/getInfoVarietasBenihSumberJeruk';
$route['infoVarietasBenihSumberJeruk/(:num)'] 		= 'guestController/getInfoVarietasBenihSumberJeruk';
$route['postData/(:any)'] 							= 'adminController/postData';
$route['reset_filterTable/(:any)'] 					= 'guestController/reset_filterTable';
$route['reset_sortTable/admin/(:any)'] 				= 'adminController/reset_sortTable';
$route['reset_sortTable/guest/(:any)'] 				= 'guestController/reset_sortTable';
$route['sortTable/admin/(:any)'] 					= 'adminController/sortTable';
$route['sortTable/guest/(:any)'] 					= 'guestController/sortTable';
$route['home'] 										= 'guestController/index';
$route['login'] 									= 'guestController/login';
$route['logout'] 									= 'adminController/logout';
$route['permintaan'] 								= 'guestController/permintaan';
$route['permintaan_add'] 							= 'guestController/permintaan_add';

$route['test'] 										= 'guestController/test_page';

//$route['default_controller'] = '';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;