<?php

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/', 'Auth\LoginController@login');
// Route::get('/', 'Auth\LoginController@showLoginForm');
// Route::post('login','Auth\LoginController@login');
// ------------------Start Admin-----------------------------------------
Route::get('/admin/admin-welcome', function () {
    return view('admin/admin');
});
// ------------------End Admin-----------------------------------------

// ------------------Clients-----------------------------------------
Route::get('/admin/add-client', 'ClientsController@create');
Route::get('/admin/edit-client/{clients}', 'ClientsController@edit');
Route::resource('admin/client','ClientsController');
// ------------------End Clients-----------------------------------

// ------------------Suppliers-----------------------------------------
Route::get('/admin/add-suppliers', 'SuppliersController@create');
Route::get('/admin/edit-suppliers/{suppliers}', 'SuppliersController@edit');
Route::resource('admin/suppliers','SuppliersController');
// ------------------End Suppliers-----------------------------------

// ------------------Employee-----------------------------------------
Route::get('/admin/add-employee', 'EmployeeController@create');
Route::get('/admin/edit-employee/{employee}', 'EmployeeController@edit');
Route::resource('admin/employee','EmployeeController');
// ------------------End Employee------------------------------------
// ------------------quotations----------------------------------------
Route::resource('/admin/quotation', 'QuotationsController');
Route::get('/admin/add-quotation', 'QuotationsController@create');
Route::get('/admin/edit-quotation/{quotation}', 'EmployeeController@edit');
// ------------------end quotations----------------------------------------
// ------------------inventary----------------------------------------
Route::get('/admin/inventaryMenu', function(){
  return view ('admin/inventary/inventaryMenu');
});
Route::get('/admin/add-product', 'ProductsControllers@create');
Route::get('/admin/edit-product/{product}', 'ProductsControllers@edit');
Route::get('/admin/show-product/{product}', 'ProductsControllers@show');
Route::resource('admin/inventary','ProductsControllers');
// ------------------End inventary----------------------------------------
Route::get('/admin/add-entrada', function(){
  return view ('admin/inventary/add-entrada');
});

Route::get('/admin/inventary/price/price', function(){
  return view ('admin/inventary/price/price');
});

Route::get('/admin/inventary/price/add-price', function(){
  return view ('admin/inventary/price/add-price');
});

// ------------------clasificationProduct---------------------------------------
Route::get('/admin/clasificationProduct', 'TypeProductsControllers@create');
Route::get('/admin/edit-checkin/{checkin}', 'CheckinsController@edit');
// Route::get('/admin/show-checkin/{checkin}', 'CheckinsController@show');
Route::resource('admin/clasificationProduct','TypeProductsControllers');
// ------------------End clasificationProduct----------------------------------------


// ------------------checkin----------------------------------------
Route::get('/admin/add-checkin', 'CheckinsController@create');
Route::get('/admin/edit-checkin/{checkin}', 'CheckinsController@edit');
Route::get('/admin/show-checkin/{checkin}', 'CheckinsController@show');
Route::resource('admin/checkin','CheckinsController');
// ------------------End checkin----------------------------------------

// ------------------checkouts----------------------------------------
Route::get('/admin/add-out', 'CheckoutsController@create');
Route::get('/admin/edit-out/{checkout}', 'CheckoutsController@edit');
Route::get('/admin/show-out/{checkout}', 'CheckoutsController@show');
Route::resource('/admin/inventary-out','CheckoutsController');
// ------------------End checkouts----------------------------------------



/*******************************8*******Users*******************************************/
Route::get('/users/users-welcome', function(){
  return view ('users/users');
});

Route::get('/users/client', function(){
  return view ('users/client/client');
});

Route::get('/users/edit-client', function(){
  return view ('users/client/edit-client');
});

Route::get('/users/add-client', function(){
  return view ('users/client/add-client');
});

Route::get('/users/quotation', function(){
  return view ('users/quotation/quotation');
});

Route::get('/users/add-quotation', function(){
  return view ('users/quotation/add-quotation');
});

Route::get('/users/edit-quotation', function(){
  return view ('users/quotation/edit-quotation');
});

Route::get('/users/inventaryMenu', function(){
  return view ('users/inventary/inventaryMenu');
});

Route::get('/users/inventary', function(){
  return view ('users/inventary/inventary');
});

Route::get('/users/add-product', function(){
  return view ('users/inventary/add-product');
});

Route::get('/users/edit-product', function(){
  return view ('users/inventary/edit-product');
});

Route::get('/users/inventary-out', function(){
  return view ('users/inventary/inventary-out');
});

Route::get('/users/add-out', function(){
  return view ('users/inventary/add-out');
});

Route::get('/users/edit-out', function(){
  return view ('users/inventary/edit-out');
});


// -------------------login--------------------------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// -------------------End login--------------------------------------
