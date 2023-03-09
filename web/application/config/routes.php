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
$route['default_controller'] = 'C_Main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['web2/(.*)'] = 'frontend/$1';

// ---------------------------------------------- ROUTES ADMIN --------------------------------------------//

$route['Login'] = 'C_Main';
$route['Dashboard'] = 'C_Main/Dashboard';

$route['ModulKendaraan'] = 'frontend/Admin/C_ModulKendaraan';
$route['ModulKendaraan/(:any)'] = 'frontend/Admin/C_ModulKendaraan/$1';
$route['ModulKendaraan/(:any)/(:any)'] = 'frontend/Admin/C_ModulKendaraan/$1/$2';
$route['ModulKendaraan/(:any)/(:any)/(:any)'] = 'frontend/Admin/C_ModulKendaraan/$1/$2/$3';

$route['ModulRapat'] = 'frontend/Admin/C_ModulRapat';
$route['ModulRapat/(:any)'] = 'frontend/Admin/C_ModulRapat/$1';

$route['ModulATK'] = 'frontend/Admin/C_ModulATK';
$route['ModulATK/(:any)'] = 'frontend/Admin/C_ModulATK/$1';

$route['ModulArsip'] = 'frontend/Admin/C_ModulArsip';
$route['ModulArsip/(:any)'] = 'frontend/Admin/C_ModulArsip/$1';

// ---------------------------------------------- ROUTES USER -----------------------------------------------//

$route['LoginUser'] = 'C_Main/user';
$route['DashboardUser'] = 'C_Main/DashboardUser';

$route['ModulKendaraanUser'] = 'frontend/User/C_ModulKendaraan';
$route['ModulKendaraanUser/(:any)'] = 'frontend/User/C_ModulKendaraan/$1';
$route['ModulKendaraanUser/(:any)/(:any)'] = 'frontend/User/C_ModulKendaraan/$1/$2';

$route['ModulRapatUser'] = 'frontend/User/C_ModulRapat';
$route['ModulRapatUser/(:any)'] = 'frontend/User/C_ModulRapat/$1';

$route['ModulATKUser'] = 'frontend/User/C_ModulATK';
$route['ModulATKUser/(:any)'] = 'frontend/User/C_ModulATK/$1';

$route['ModulArsipUser'] = 'frontend/User/C_ModulArsip';
$route['ModulArsipUser/(:any)'] = 'frontend/User/C_ModulArsip/$1';


// ---------------------------------------------- ROUTES MANAGER --------------------------------------------//

$route['LoginManajer'] = 'C_Main/manager';
$route['DashboardManajer'] = 'C_Main/DashboardManager';

$route['ModulKendaraanManajer'] = 'frontend/Manajer/C_ModulKendaraan';
$route['ModulKendaraanManajer/(:any)'] = 'frontend/Manajer/C_ModulKendaraan/$1';
$route['ModulKendaraanManajer/(:any)/(:any)'] = 'frontend/Manajer/C_ModulKendaraan/$1/$2';
$route['ModulKendaraanManajer/(:any)/(:any)/(:any)'] = 'frontend/Manajer/C_ModulKendaraan/$1/$2/$3';

$route['ModulRapatManajer'] = 'frontend/Manajer/C_ModulRapat';
$route['ModulRapatManajer/(:any)'] = 'frontend/Manajer/C_ModulRapat/$1';

$route['ModulATKManajer'] = 'frontend/Manajer/C_ModulATK';
$route['ModulATKManajer/(:any)'] = 'frontend/Manajer/C_ModulATK/$1';

$route['ModulArsipManajer'] = 'frontend/Manajer/C_ModulArsip';
$route['ModulArsipManajer/(:any)'] = 'frontend/Manajer/C_ModulArsip/$1';
