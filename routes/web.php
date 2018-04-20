<?php

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// ------------------Start Admin-----------------------------------------
Route::get('/admin/admin-welcome', 'AdminControllers@index');
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
Route::get('/admin/add-product', 'ProductsControllers@create');
Route::get('/admin/edit-product/{product}', 'ProductsControllers@edit');
Route::get('/admin/show-product/{product}', 'ProductsControllers@show');
Route::resource('admin/inventary','ProductsControllers');
// ------------------End inventary----------------------------------------

// ------------------clasificationProduct---------------------------------------
Route::get('/admin/clasificationProduct', 'CategoriesController@create');
Route::get('/admin/edit-checkin/{checkin}', 'CategoriesController@edit');
Route::resource('admin/clasificationProduct','CategoriesController');
// ------------------End clasificationProduct----------------------------------------

// ------------------checkout----------------------------------------
Route::get('/admin/add-product-output', 'CheckoutsController@create');
Route::get('/admin/edit-product-output/{checkout}', 'CheckoutsController@edit');
Route::get('/admin/show-product-output/{checkout}', 'CheckoutsController@show');
Route::resource('/admin/product-output','CheckoutsController');
// ------------------End checkout----------------------------------------

// ------------------Alta de Catalogo----------------------------------------
Route::get('/admin/alta-producto-catalogo', 'CatalogsController@create');
Route::get('/admin/editar-producto-catalogo/{catalog}', 'CatalogsController@edit');
Route::resource('/admin/catalogo','CatalogsController');
// ------------------End Alta de Catalogo----------------------------------------

// ------------------facturas----------------------------------------
Route::resource('/admin/facturas', 'ControllerInvoices');
// ------------------End facturas----------------------------------------

// =======================metodos ajax ==============================================
Route::get('/producto-catalogo/{id}', 'ControllersAjax@getCatalogtAjax');
Route::get('/producto/{id}', 'ControllersAjax@getProductAjax');
Route::get('/cliente/{id}', 'ControllersAjax@getClientAjax');
// =======================End metodos ajax ==============================================

// crear PDF
Route::get("factura/{id}","ControllerInvoices@downloadPDF");
Route::get("cotizacion/{quotation}","PDFController@cotizacionPDF");
