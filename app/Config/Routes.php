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
$routes->get('/', 'Home::index');
$routes->get("/users", "Home::test");

$routes->get("/login", "UserController::loginView");
$routes->get("/register", "UserController::RegisterView");
$routes->get("/logout", "UserController::logout");

$routes->get("/dashboard", "DashboardController::index", ['filter' => 'authGuard']);

$routes->get("/addmemberView", "MemberController::addMemberView");
$routes->post("/addmember", "MemberController::addMember");
$routes->get("/listMembers", "MemberController::listMembers");
$routes->get("/updateView/(:num)", "MemberController::updateView/$1");
$routes->get("/memberProfile/(:num)", "MemberController::memberProfile/$1");
$routes->match(['get', 'delete'], "/deleteMember/(:num)", "MemberController::delete/$1");
$routes->post("/updateMember/(:num)", "MemberController::update/$1");
$routes->post('/uploadImage/(:num)', "MemberController::uploadProfileImage/$1");
$routes->get('/getsearchsuggestion/(:segment)', 'MemberController::getsearchSuggestion/$1');

$routes->get("/listActivities", "ActivityController::listActivities");
$routes->get("/addActivityView", "ActivityController::addActivityView");
$routes->post("/addActivity", "ActivityController::addActivity");
$routes->get("/comingActivities", "ActivityController::comingActivities");
$routes->get("/activityinfo/(:num)", "ActivityController::activityInfo/$1");
$routes->get('/deleteActivity/(:num)', "ActivityController::delete/$1");
$routes->get('/activityUpdateView/(:num)', "ActivityController::updateView/$1");
$routes->post('/activityUpdate/(:num)', "ActivityController::update/$1");

$routes->get('/addInterestView/(:num)', 'InterestController::index/$1');
$routes->post('addInterest/(:num)' , 'InterestController::addInterest/$1');
$routes->get('/filterInterestView', "InterestController::filterInterestsView");
$routes->post('/filterInterest', "InterestController::filterInterests");
$routes->post('/filterInterestsAsync/(:num)', "InterestController::filterInterestsAsync/$1");

$routes->get('/mailDashboardView', "MailController::mailView");
$routes->get('/sendMailView', "MailController::sendMail");
$routes->get('/filterInterestView', "InterestController::filterInterestsView");

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
