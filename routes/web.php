<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Index
Route::get('/', function () {
    return view('index');
});

Route::get('/blog', 'BlogController@getBlog');

Route::get('/help', function () {
    return view('home.blog-home');
});

Route::get('/contact', function () {
    return view('home.contact-home');
});

// --------------------- After Loged -----------------------

// Register&Login
Auth::routes();

// ----------------- Start of Admin Management -----------------

// Profile Management
Route::resource('/store/admin/profile-management', 'AdminProfileController');

// Upgrade Mangement 
Route::resource('/store/admin/upgrade-management', 'AdminUpgradeController');

// News Mangement 
Route::resource('/store/admin/news-management', 'AdminNewsController');

// User Management
Route::resource('/store/admin/user-management', 'AdminUserController');

// Order Management
Route::resource('/store/admin/order-management', 'AdminOrderController');

// Product Menagement
Route::resource('/store/admin/product-management', 'AdminProductController');

// Report Management
Route::get('/store/admin/upgrade-report-management', 'AdminReportController@getReportPayment');
Route::get('/store/admin/order-report-management', 'AdminReportController@getReportOrder');

// ----------------------- End of Admin Menagement -------------------------

// ------------------------ Start of User Backend ------------------------

// Facebook with Facebook
Route::get('auth/login/facebook', 'Auth\RegisterController@facebookAuthRedirect');
Route::get('auth/login/facebook/callback', 'Auth\RegisterController@facebookSuccess');

// Store
Route::get('/store', 'HomeController@index');

// Profile
Route::resource('/store/profile', 'ProfileController');

// Product Store
Route::resource('/store/product', 'ProductController');

// Select Producttype 
Route::get('/store/select-producttype', 'ProductController@getProductOfType');

// Product Type Store
Route::resource('/store/producttype', 'ProductTypeController');

// Delaer Store
Route::resource('/store/dealer', 'DealerController');

// Order
Route::resource('/store/order', 'OrderController');

// Send Order & Report
Route::get('/send-report-confirm/{customerID}/{orderID}', 'SendReportController@sendReportConfirm');
Route::get('/send-report-success/{customerID}/{orderID}', 'SendReportController@sendReportSuccess');

// Send Report
//Route::resource('/shop/{userID}/report-order-shop/{customerID}/{orderID}', 'ShopController@reportOrder');

// Customer
Route::resource('/store/customer', 'CustomerController');

// Discount
Route::resource('/store/discount', 'DiscountController');

// Payment
Route::resource('/store/payment', 'PaymentController');

// Report all
Route::get('/store/report-all', 'ReportController@getAllReport');
Route::get('/store/report-saled', 'ReportController@getSaledReport');
Route::get('/store/report-saled/generate-pdf', 'ReportController@getGeneratePDF');

// Upgrade Level
Route::get('/store/upgrade-level', 'UpgradeController@index');

Route::get('/store/upgrade-level/free', 'UpgradeController@upgradeFreeUsing');

Route::get('/store/upgrade-level/payment', 'UpgradeController@upgradePaymentUsing');

Route::get('/store/upgrade-level/payment/confirm', 'UpgradeController@upgradePaymentConfirming');
Route::post('/store/upgrade-level/payment/confirm', 'UpgradeController@upgradePaymentConfirmed');

// Install App
Route::get('/store/install-app', 'InstallAppController@getIndex');

// News
Route::resource('/store/news', 'NewsController');

// ---------------------- End of User Backend ------------------------

// ----------------------- Start of Shopping Frontend ----------------------------

// Shop Index
Route::get('/shop', 'ShopController@getIndexShop');

// Ajax Select Producttype
Route::get('/select-producttype', 'AjaxController@selectProducttype');

Route::get('/shop/{userID}/paymenting', 'ShopController@paymenting');

// Dealer Auth
Route::get('/shop/{userID}/register-dealer', 'ShopingDealerController@registerDealer');
Route::post('/shop/{userID}/register-dealer', 'ShopingDealerController@registedDealer');

Route::get('/shop/{userID}/login-dealer', 'ShopingDealerController@loginDealer');

Route::get('/shop/{userID}/select-producttype/{producttypeID}', 'ShopController@selectProductType');

Route::get('/shop/{userID}/search-product', 'ShopController@searchProduct');

Route::get('/shop/{userID}/view/{id}', 'ShopController@getShowShop');
Route::post('/shop/{userID}/view/{id}', 'ShopController@getAddToCart');

Route::get('/shop/{userID}/cart-order', 'ShopController@getCartAsOrder');

Route::get('/shop/{userID}/shopping-cart/clean-cart', 'ShopController@cleanCart');

Route::get('/shop/{userID}/fill-customer', 'ShopController@fillToCustomer');

Route::get('/shop/{userID}/confirm-order', 'ShopController@getOrderConfirming');
Route::post('/shop/{userID}/confirm-order', 'ShopController@getOrderConfirmed');

// ---------------- End of Shopping Frontend ----------------

// Install App
Route::get('/install-app', function($id){
	return view('install-app.index-install-app')
		->with('id', $id);
});
