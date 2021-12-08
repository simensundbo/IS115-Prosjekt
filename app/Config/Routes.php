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

//routs som man kan navigere til i webapp-en 
$routes->get('/', 'Home::index');
$routes->get("/users", "Home::test");

$routes->get("/login", "UserController::loginView");
$routes->get("/register", "UserController::RegisterView");
$routes->get("/logout", "UserController::logout");

$routes->get("/dashboard", "DashboardController::index", ['filter' => 'authGuard']);

$routes->get("/addmemberView", "MemberController::addMemberView", ['filter' => 'authGuard']);
$routes->post("/addmember", "MemberController::addMember", ['filter' => 'authGuard']);
$routes->get("/listMembers", "MemberController::listMembers", ['filter' => 'authGuard']);
$routes->get("/updateView/(:num)", "MemberController::updateView/$1", ['filter' => 'authGuard']);
$routes->get("/memberProfile/(:num)", "MemberController::memberProfile/$1", ['filter' => 'authGuard']);
$routes->match(['get', 'delete'], "/deleteMember/(:num)", "MemberController::delete/$1", ['filter' => 'authGuard']);
$routes->post("/updateMember/(:num)", "MemberController::update/$1", ['filter' => 'authGuard']);
$routes->post('/uploadImage/(:num)', "MemberController::uploadProfileImage/$1", ['filter' => 'authGuard']);
$routes->get('/getsearchsuggestion/(:segment)', 'MemberController::getsearchSuggestion/$1', ['filter' => 'authGuard']);

$routes->get("/listActivities", "ActivityController::listActivities", ['filter' => 'authGuard']);
$routes->get("/addActivityView", "ActivityController::addActivityView", ['filter' => 'authGuard']);
$routes->post("/addActivity", "ActivityController::addActivity", ['filter' => 'authGuard']);
$routes->get("/comingActivities", "ActivityController::comingActivities", ['filter' => 'authGuard']);
$routes->get("/activityinfo/(:num)", "ActivityController::activityInfo/$1", ['filter' => 'authGuard']);
$routes->match(['get', 'delete'],'/deleteActivity/(:num)', "ActivityController::delete/$1", ['filter' => 'authGuard']);
$routes->get('/activityUpdateView/(:num)', "ActivityController::updateView/$1", ['filter' => 'authGuard']);
$routes->post('/activityUpdate/(:num)', "ActivityController::update/$1", ['filter' => 'authGuard']);
$routes->post('/activityUpdate/(:num)', "ActivityController::update/$1", ['filter' => 'authGuard']);
$routes->get("/registerMemberView/(:num)", "ActivityController::registerMemberView/$1", ['filter' => 'authGuard']);
$routes->post("/registerMember/(:num)", "ActivityController::registerMember/$1", ['filter' => 'authGuard']);
$routes->match(['get', 'delete'], "/deleteActivityMember/(:num)/(:num)", "ActivityController::deleteActivityMember/$1/$2", ['filter' => 'authGuard']);

$routes->get('/addInterestView/(:num)', 'InterestController::addInterestView/$1', ['filter' => 'authGuard']);
$routes->post('addInterest/(:num)' , 'InterestController::addInterest/$1', ['filter' => 'authGuard']);
$routes->get('/filterInterestView', "InterestController::filterInterestsView", ['filter' => 'authGuard']);
$routes->post('/filterInterestsAsync/(:num)', "InterestController::filterInterestsAsync/$1, ['filter' => 'authGuard']");
$routes->get('/deleteInterests/(:num)/(:num)', "InterestController::deleteInterests/$1/$2", ['filter' => 'authGuard']);

$routes->get('/mailDashboard', "MailController::index", ['filter' => 'authGuard']);
$routes->get('/sendMailView', "MailController::sendMailView", ['filter' => 'authGuard']);
$routes->post('/sendMail', "MailController::sendMail", ['filter' => 'authGuard']);
$routes->get('/sendNewsMailView', "MailController::sendNewsMailView", ['filter' => 'authGuard']);
$routes->get('/sendNewsMail/(:segment)', "MailController::sendNewsMail/$1", ['filter' => 'authGuard']);

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
