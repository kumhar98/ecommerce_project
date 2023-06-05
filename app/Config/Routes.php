<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index',['filter'=>'Auth']);
$routes->get('/viewAll', 'viewAllController::productsFechall',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/login', 'Login::loginData',['filter'=>'Noauth']);
$routes->match(['get', 'post'],'/signup', 'SignUp::signupData',['filter'=>'Noauth']);
$routes->get('/logOut', 'Logout::Logout',['filter'=>'Auth']);
$routes->get('/categorys/(:any)', 'Categorys::categorysData/$1',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/proDetails/(:any)', 'AddCard::AddCard/$1',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/proDetails', 'AddCard::Add',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/card/(:any)', 'Card::Card/$1',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/quantity', 'Card::UpdateQty',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/card', 'Card::removeAddCardData',['filter'=>'Auth']);
$routes->get('/checkout/(:any)', 'checkoutController::checkout/$1',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/checkout', 'checkoutController::saveAddress',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/AddressFetch', 'checkoutController::AddressFetch',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/updateAddress', 'checkoutController::updateAddress',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/paymentProcess', 'PaymentProcess::paymentProcess',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/success/(:any)', 'PaymentProcess::success/$1',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/track/(:any)', 'TrackController::track/$1',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/buyProduct', 'BuyProductController::buyProduct',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/buyCheckout/(:any)', 'BuyProductController::buyCheckout/$1',['filter'=>'Auth']);
$routes->match(['get', 'post'],'/buypaymentProcess', 'BuyProductController::buypaymentProcess',['filter'=>'Auth']);

// $routes->match(['get', 'post'],'/proDetails', 'AddCard::AddCard',['filter'=>'Auth']);

// admin Routes
$routes->get('admin/index', 'admin\AdminControlle::index',['filter'=>'AuthAdmin']);
$routes->post('admin/updateStatus', 'admin\AdminControlle::updateStatus',['filter'=>'AuthAdmin']);
$routes->post('admin/updateStatusSave', 'admin\AdminControlle::updateStatusSave',['filter'=>'AuthAdmin']);
$routes->get('admin/table', 'admin\ProductTable::index',['filter'=>'AuthAdmin']);
$routes->post('admin/productDelete', 'admin\ProductUpdate::ProductDelete',['filter'=>'AuthAdmin']);
$routes->match(['get', 'post'],'admin/productUpdate/(:any)', 'admin\ProductUpdate::ProductUpdate/$1' ,['filter'=>'AuthAdmin']);
$routes->match(['get', 'post'],'admin/products', 'admin\products::Products',['filter'=>'AuthAdmin']);
$routes->match(['get', 'post'],'admin/login', 'admin\Adminlogin::Adminlogin',['filter'=>'NoauthAdmin']);
$routes->match(['get', 'post'],'admin/signUp', 'admin\SignUpController::SignUp',['filter'=>'NoauthAdmin']);
$routes->get('admin/LogOut', 'admin\LogOut::LogOut');
$routes->match(['get', 'post'],'admin/category', 'admin\CategoryController::categoryAdd',['filter'=>'AuthAdmin']);
$routes->match(['get', 'post'],'admin/categoryTable', 'admin\CategoryController::categoryFetchData',['filter'=>'AuthAdmin']);
$routes->match(['get', 'post'],'admin/categoryUpdate/(:any)', 'admin\CategoryController::categoryUpdate/$1',['filter'=>'AuthAdmin']);
// $routes->match(['get', 'post'],'admin/categoryUpdate', 'admin\CategoryController::categoryDelete');
$routes->match(['get', 'post'],'admin/categoryDelete', 'admin\CategoryController::categoryDelete',['filter'=>'AuthAdmin']);
$routes->get('admin/cardTable', 'admin\CardAdminController::cardTableFetchData',['filter'=>'AuthAdmin']);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
