<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	$route['default_controller'] = 'index';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

	// $route['(:any)/reservations'] = 'index/my_reservations/$1';
	// $route['(:any)/reservations/request'] = 'index/request/$1';
 	$route['login'] = 'index/login';
	$route['logout'] = 'index/logout';
	$route['my-reservations'] = 'user/my_reservations';
	$route['my-reservations/request'] = 'user/request';
	$route['my-reservations/cancel/(:any)'] = 'user/cancel_request/$1';


	$route['sign-up'] = 'user/sign_up';
	$route['profile'] = 'user/profile';

	$route['admin/login'] = 'admin/login';
	$route['admin/logout'] = 'admin/logout';
	$route['admin/dashboard'] = 'admin';
	$route['admin/facilities/add'] = 'admin/add_facility';
	$route['admin/facilities/edit/(:any)'] = 'admin/edit_facility/$1';
	$route['admin/facilities/delete/(:any)'] = 'admin/delete_facility/$1';

	$route['admin/reservations'] = 'admin/reservations';
	$route['admin/reservations/view/(:any)'] = 'admin/view_reservation/$1';
	$route['admin/reservations/approve/(:any)'] = 'admin/approve_reservation/$1';
	$route['admin/reservations/reject/(:any)'] = 'admin/reject_reservation/$1';

	$route['admin/events/(:any)'] = 'admin/events/$1';

	$route['admin/calendar/(:any)'] = 'admin/calendar/$1';

	$route['admin/admin/new'] = 'admin/add_admin';


	$route['schedules/calendar/(:any)'] = 'schedules/calendar/$1';