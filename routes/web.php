<?php

// ------------------Start Login-----------------------------------------
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// ------------------End Login-----------------------------------------

// ------------------Start Admin-----------------------------------------
Route::get('/admin/admin-welcome', 'AdminControllers@index');
// ------------------End Admin-----------------------------------------

// ------------------Clients-----------------------------------------
Route::get('admin/clientes','ClientsController@index')->name('client.index')->middleware('permission:client.index');
Route::get('/admin/create-cliente', 'ClientsController@create')->name('client.create')->middleware('permission:client.create');
Route::post('admin/store-cliente','ClientsController@store')->name('client.store')->middleware('permission:client.create');
Route::get('/admin/edit-cliente/{cliente}', 'ClientsController@edit')->name('client.edit')->middleware('permission:client.edit');
Route::put('/admin/{cliente}/update', 'ClientsController@update')->name('client.update')->middleware('permission:client.edit');
Route::delete('admin/delete-cliente/{id}','ClientsController@destroy')->name('client.destroy')->middleware('permission:client.destroy');
// ------------------End Clients-----------------------------------

// ------------------Suppliers-----------------------------------------
Route::get('admin/proveedores','SuppliersController@index')->name('suppliers.index')->middleware('permission:suppliers.index');
Route::get('/admin/create-proveedor', 'SuppliersController@create')->name('suppliers.create')->middleware('permission:suppliers.create');
Route::post('admin/store-proveedor','SuppliersController@store')->name('suppliers.store')->middleware('permission:suppliers.create');
Route::get('/admin/edit-proveedor/{proveedor}', 'SuppliersController@edit')->name('suppliers.edit')->middleware('permission:suppliers.edit');
Route::put('/admin/update/{proveedor}', 'SuppliersController@update')->name('supplier.update')->middleware('permission:suppliers.edit');
Route::delete('admin/delete-proveedor/{id}','SuppliersController@destroy')->name('suppliers.destroy')->middleware('permission:suppliers.destroy');
// ------------------End Suppliers-----------------------------------

// ------------------Roles-----------------------------------------
Route::get('admin/roles','RolesController@index')->name('roles.index')->middleware('permission:roles.index');
Route::get('/admin/create-rol', 'RolesController@create')->name('roles.create')->middleware('permission:roles.create');
Route::post('admin/store-rol','RolesController@store')->name('roles.store')->middleware('permission:roles.create');
Route::get('/admin/edit-rol/{rol}', 'RolesController@edit')->name('roles.edit')->middleware('permission:roles.edit');
Route::put('/admin/update/{rol}', 'RolesController@update')->name('roles.update')->middleware('permission:roles.edit');
Route::delete('admin/delete-rol/{id}','RolesController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
// ------------------End Roles------------------------------------

// ------------------Usuarios-----------------------------------------
Route::get('admin/usuario','EmployeeController@index')->name('employee.index')->middleware('permission:employee.index');
Route::get('/admin/create-usuario', 'EmployeeController@create')->name('employee.create')->middleware('permission:employee.create');
Route::post('admin/store-usuario','EmployeeController@store')->name('employee.store')->middleware('permission:employee.create');
Route::get('/admin/edit-usuario/{usuario}', 'EmployeeController@edit')->name('employee.edit')->middleware('permission:employee.edit');
Route::post('/admin/update/{usuario}', 'EmployeeController@update')->name('employee.update')->middleware('permission:employee.edit');
Route::delete('admin/delete-usuario/{id}','EmployeeController@destroy')->name('employee.destroy')->middleware('permission:employee.destroy');
// ------------------End Usuarios------------------------------------

// ------------------clasificationProduct---------------------------------------
Route::get('admin/categoria','CategoriesController@index')->name('categoria.index')->middleware('permission:clasificationProduct.index');
Route::get('/admin/create-categoria', 'CategoriesController@create')->name('categoria.create')->middleware('permission:clasificationProduct.create');
Route::post('admin/store-categoria','CategoriesController@store')->name('categoria.store')->middleware('permission:clasificationProduct.create');
Route::delete('admin/delete-categoria/{id}','CategoriesController@destroy')->name('categoria.destroy')->middleware('permission:clasificationProduct.destroy');
// ------------------End clasificationProduct----------------------------------------

// ------------------Alta de Catalogo----------------------------------------
Route::get('/admin/catalogo','CatalogsController@index')->name('catalogo.index')->middleware('permission:catalogo.index');
Route::get('/admin/create-producto-catalogo', 'CatalogsController@create')->name('catalogo.create')->middleware('permission:catalogo.create');
Route::post('admin/store-producto-catalogo','CatalogsController@store')->name('catalogo.store')->middleware('permission:catalogo.create');
Route::get('/admin/editar-producto-catalogo/{producto}', 'CatalogsController@edit')->name('catalogo.edit')->middleware('permission:catalogo.edit');
Route::post('/admin/producto-catalogo/{producto}', 'CatalogsController@update')->name('catalogo.update')->middleware('permission:catalogo.edit');
Route::delete('admin/delete-producto-catalogo/{id}','CatalogsController@destroy')->name('catalogo.destroy')->middleware('permission:catalogo.destroy');
// ------------------End Alta de Catalogo----------------------------------------

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



// ------------------checkout----------------------------------------
Route::get('/admin/add-product-output', 'CheckoutsController@create');
Route::get('/admin/edit-product-output/{checkout}', 'CheckoutsController@edit');
Route::get('/admin/show-product-output/{checkout}', 'CheckoutsController@show');
Route::resource('/admin/product-output','CheckoutsController');
// ------------------End checkout----------------------------------------

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
