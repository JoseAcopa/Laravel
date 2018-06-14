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
Route::put('/admin/update-proveedor/{proveedor}', 'SuppliersController@update')->name('supplier.update')->middleware('permission:suppliers.edit');
Route::delete('admin/delete-proveedor/{id}','SuppliersController@destroy')->name('suppliers.destroy')->middleware('permission:suppliers.destroy');
// ------------------End Suppliers-----------------------------------

// ------------------Roles-----------------------------------------
Route::get('admin/roles','RolesController@index')->name('roles.index')->middleware('permission:roles.index');
Route::get('/admin/create-rol', 'RolesController@create')->name('roles.create')->middleware('permission:roles.create');
Route::post('admin/store-rol','RolesController@store')->name('roles.store')->middleware('permission:roles.create');
Route::get('/admin/edit-rol/{role}', 'RolesController@edit')->name('roles.edit')->middleware('permission:roles.edit');
Route::post('/admin/update/{role}', 'RolesController@update')->name('roles.update')->middleware('permission:roles.edit');
Route::delete('admin/delete-rol/{id}','RolesController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
// ------------------End Roles------------------------------------

// ------------------Usuarios-----------------------------------------
Route::get('admin/usuario','EmployeeController@index')->name('employee.index')->middleware('permission:employee.index');
Route::get('/admin/create-usuario', 'EmployeeController@create')->name('employee.create')->middleware('permission:employee.create');
Route::post('admin/store-usuario','EmployeeController@store')->name('employee.store')->middleware('permission:employee.create');
Route::get('/admin/edit-usuario/{id}', 'EmployeeController@edit')->name('employee.edit')->middleware('permission:employee.edit');
Route::post('/admin/update-user/{id}', 'EmployeeController@update')->name('employee.update')->middleware('permission:employee.edit');
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

// ------------------inventary----------------------------------------
Route::get('/admin/productos','ProductsControllers@index')->name('producto.index')->middleware('permission:inventary.index');
Route::get('/admin/crear-producto', 'ProductsControllers@create')->name('producto.create')->middleware('permission:inventary.create');
Route::post('admin/store-producto','ProductsControllers@store')->name('producto.store')->middleware('permission:inventary.create');
Route::get('/admin/edita-producto/{producto}', 'ProductsControllers@edit')->name('producto.edit')->middleware('permission:inventary.edit');
Route::post('/admin/producto/{producto}', 'ProductsControllers@update')->name('producto.update')->middleware('permission:inventary.edit');
Route::delete('admin/delete-producto/{id}','ProductsControllers@destroy')->name('producto.destroy')->middleware('permission:inventary.destroy');
Route::get('admin/ver-producto/{id}','ProductsControllers@show')->name('producto.show')->middleware('permission:inventary.show');
// ------------------End inventary----------------------------------------

// ------------------checkout----------------------------------------
Route::get('/admin/salidas','CheckoutsController@index')->name('salida.index')->middleware('permission:product-output.index');
Route::get('/admin/crear-salida', 'CheckoutsController@create')->name('salida.create')->middleware('permission:product-output.create');
Route::post('admin/store-salida','CheckoutsController@store')->name('salida.store')->middleware('permission:product-output.create');
Route::get('/admin/editar-salida/{salida}', 'CheckoutsController@edit')->name('salida.edit')->middleware('permission:product-output.edit');
Route::post('/admin/salida/{salida}', 'CheckoutsController@update')->name('salida.update')->middleware('permission:product-output.edit');
Route::delete('admin/delete-salida/{id}','CheckoutsController@destroy')->name('salida.destroy')->middleware('permission:product-output.destroy');
Route::get('admin/ver-salida/{id}','CheckoutsController@show')->name('salida.show')->middleware('permission:product-output.show');
// ------------------End checkout----------------------------------------

// ------------------quotations----------------------------------------
Route::get('/admin/cotizacion','QuotationsController@index')->name('cotizacion.index')->middleware('permission:quotation.index');
Route::get('/admin/crear-cotizacion', 'QuotationsController@create')->name('cotizacion.create')->middleware('permission:quotation.create');
Route::post('admin/store-cotizacion','QuotationsController@store')->name('cotizacion.store')->middleware('permission:quotation.create');
Route::get('/admin/editar-cotizacion/{cotizacion}', 'QuotationsController@edit')->name('cotizacion.edit')->middleware('permission:quotation.edit');
Route::post('/admin/cotizacion/{cotizacion}', 'QuotationsController@update')->name('cotizacion.update')->middleware('permission:quotation.edit');
Route::delete('admin/delete-cotizacion/{id}','QuotationsController@destroy')->name('cotizacion.destroy')->middleware('permission:quotation.destroy');
Route::get('admin/ver-cotizacion/{id}','QuotationsController@show')->name('cotizacion.show')->middleware('permission:quotation.show');
// ------------------end quotations----------------------------------------

// ------------------facturas----------------------------------------
Route::get('/admin/facturas','ControllerInvoices@index')->name('factura.index')->middleware('permission:facturas.index');
Route::delete('admin/delete-factura/{id}','ControllerInvoices@destroy')->name('factura.destroy')->middleware('permission:facturas.destroy');
Route::get('admin/ver-factura/{id}','ControllerInvoices@show')->name('factura.show')->middleware('permission:facturas.show');
// Route::resource('/admin/facturas', 'ControllerInvoices');
// ------------------End facturas----------------------------------------

// =======================metodos ajax ==============================================
Route::post('/crear-actividad', 'AdminControllers@store')->name('actividad.store');
Route::delete('/actividad/{id}', 'AdminControllers@destroy')->name('actividad.destroy');
Route::get('/edit-actividad/{id}', 'AdminControllers@edit')->name('actividad.edit');
Route::post('/update-actividad', 'AdminControllers@update')->name('actividad.update');
// =======================End metodos ajax ==============================================

// =======================reportes ==============================================
Route::get('admin/reporte-cotizacion', 'ReportesController@cotizacion')->name('cotizaciones.show');
Route::get('admin/reporte-facturas', 'ReportesController@factura')->name('facturas.show');
Route::post('admin/generar-facturas', 'ReportesController@generarFacturas')->name('facturas.generar');
Route::post('admin/generar-cotizacion', 'ReportesController@generarCotizacion')->name('cotizaciones.generar');
// =======================reportes ==============================================

// =======================metodos ajax ==============================================
Route::get('/producto-catalogo/{id}', 'ControllersAjax@getCatalogtAjax');
Route::get('/producto/{id}', 'ControllersAjax@getProductAjax');
Route::get('/cliente/{id}', 'ControllersAjax@getClientAjax');
// =======================End metodos ajax ==============================================

// =======================recuperar contrasena ==============================================
Route::post('/set-password', 'ControllerResetPass@setPassword')->name('password.new');
Route::get('/admin/correos', 'ControllerCorreos@index')->name('correo.index');
// =======================recuperar contrasena ==============================================

// =======================crear PDF ==============================================
Route::get("factura/{id}","PDFController@downloadPDF");
Route::get("descargar/{id}","PDFController@descargarPDF");
Route::get("cotizacion/{quotation}","PDFController@cotizacionPDF");
Route::get("descargar-cotizacion/{cotizacion}","PDFController@descargarCotizacionPDF");
