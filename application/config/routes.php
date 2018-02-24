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
$route['default_controller'] 							= 'home';
$route['404_override'] 									= '';
$route['translate_uri_dashes'] 							= FALSE;
$route['login/([1-2]{1})']								= 'auth/login/$1';
$route['register/([1-2]{1})']							= 'auth/register/$1';
$route['dich-vu']										= 'service';
$route['lien-he']										= 'contact';
$route['tuyen-dung']									= 'recruit';
$route['account']										= 'profile/userInfo';
$route['viec-lam-phu-hop']								= 'profile/suitableJob';
$route['quan-ly-ho-so']									= 'profile/managementProfile';
$route['viec-lam-da-luu']								= 'profile/jobSave';
$route['viec-lam-da-ung-tuyen']							= 'profile/jobApplication';
$route['cau-hinh-thong-bao']							= 'profile/notification';
$route['quan-ly-ho-so/ho-so-ca-nhan']					= 'profile/personal';
$route['ung-vien']										= 'candidate';
$route['ung-vien/(:num)/(:any)']						= 'candidate/detailCandidate/$1/$2';
$route['thong-tin-nha-tuyen-dung']						= 'profile_recruit/infoRecruit';
$route['ho-so-da-luu']									= 'profile_recruit/profileSave';
$route['ho-so-da-ung-tuyen']							= 'profile_recruit/profileApplication';
$route['quan-ly-tuyen-dung']							= 'profile_recruit/managementRecruit';
$route['quan-ly-tuyen-dung/dang-tuyen-dung']			= 'profile_recruit/postNewRecruit';
$route['quan-ly-tuyen-dung/sua-tuyen-dung/(:num)']		= 'profile_recruit/postEditRecruit/$1';
$route['kich-hoat']										= 'auth/active';
$route['logout']										= 'auth/logout';
$route['forget-password']								= 'auth/forgetPassword';
$route['change-pass']									= 'profile/change_pass';
$route['quan-ly-ho-so/dinh-kem-file']					= 'profile/fileCV';
$route['tuyen-dung/(:num)/(:any)']						= 'recruit/detailRecruit/$1/$2';
//ajax
$route['info-general']									= 'ajax/infoGeneral';
$route['target']										= 'ajax/target';
$route['education']										= 'ajax/education';
$route['delete-edu']									= 'ajax/deleteEducation';
$route['language']										= 'ajax/language';
$route['delete-lang']									= 'ajax/deleteLanguage';
$route['work-exp']										= 'ajax/workExperience';
$route['delete-exp']									= 'ajax/deleteWorkExp';
$route['refresh']										= 'ajax/refresh';
$route['remove-profile']								= 'ajax/removeProfile';
$route['remove-file']									= 'ajax/removeFile';
$route['change-search']									= 'ajax/changeSearch';
$route['remove-recruit']								= 'ajax/removeRecruit';
$route['tick']											= 'ajax/tick';

