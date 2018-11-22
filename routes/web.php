<?php

// ------------------Start Login-----------------------------------------
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// ------------------Start Admin-----------------------------------------
Route::get('/admin/admin-welcome', 'AdminControllers@index');

// ------------------Clientes--------------------------------------------
Route::get('/clientes','ClientesController@index')->name('cliente.index')->middleware('permission:clientes.index');
Route::get('/crear-cliente', 'ClientesController@create')->name('cliente.create')->middleware('permission:cliente.create');
Route::post('/guardar-cliente','ClientesController@store')->name('cliente.store')->middleware('permission:cliente.create');
Route::get('/editar-cliente/{id}', 'ClientesController@edit')->name('cliente.edit')->middleware('permission:cliente.edit');
Route::put('/actualizar-cliente/{cliente}', 'ClientesController@update')->name('cliente.update')->middleware('permission:cliente.edit');
Route::delete('/eliminar-cliente/{id}','ClientesController@destroy')->name('cliente.destroy')->middleware('permission:cliente.destroy');

// ------------------proveedores------------------------------------------
Route::get('/proveedores','ProveedoresController@index')->name('proveedor.index')->middleware('permission:proveedores.index');
Route::get('/crear-proveedor', 'ProveedoresController@create')->name('proveedor.create')->middleware('permission:proveedor.create');
Route::post('/guardar-proveedor','ProveedoresController@store')->name('proveedor.store')->middleware('permission:proveedor.create');
Route::get('/editar-proveedor/{id}', 'ProveedoresController@edit')->name('proveedor.edit')->middleware('permission:proveedor.edit');
Route::put('/actualizar-proveedor/{proveedor}', 'ProveedoresController@update')->name('proveedor.update')->middleware('permission:proveedor.edit');
Route::delete('/eliminar-proveedor/{id}','ProveedoresController@destroy')->name('proveedor.destroy')->middleware('permission:proveedor.destroy');

// ------------------Roles-----------------------------------------
Route::get('admin/roles','RolesController@index')->name('roles.index')->middleware('permission:roles.index');
Route::get('/admin/create-rol', 'RolesController@create')->name('roles.create')->middleware('permission:rol.create');
Route::post('admin/store-rol','RolesController@store')->name('roles.store')->middleware('permission:roles.create');
Route::get('/admin/edit-rol/{role}', 'RolesController@edit')->name('roles.edit')->middleware('permission:rol.edit');
Route::post('/admin/update/{role}', 'RolesController@update')->name('roles.update')->middleware('permission:rol.edit');
Route::delete('admin/delete-rol/{id}','RolesController@destroy')->name('roles.destroy')->middleware('permission:rol.destroy');
// ------------------End Roles------------------------------------

// ------------------Usuarios-----------------------------------------
Route::get('/usuarios','UsuariosController@index')->name('usuarios.index')->middleware('permission:usuarios.index');
Route::get('/crear-usuario', 'UsuariosController@create')->name('usuario.create')->middleware('permission:usuario.create');
Route::post('/guardar-usuario','UsuariosController@store')->name('usuario.store')->middleware('permission:usuario.create');
Route::get('/editar-usuario/{id}', 'UsuariosController@edit')->name('usuario.edit')->middleware('permission:usuario.edit');
Route::put('/actualizar-usuario/{usuario}', 'UsuariosController@update')->name('usuario.update')->middleware('permission:usuario.edit');
Route::delete('/eliminar-usuario/{id}','UsuariosController@destroy')->name('usuario.destroy')->middleware('permission:usuario.destroy');
// ------------------End Usuarios------------------------------------

// ------------------categorias---------------------------------------
Route::get('/categorias','CategoriasController@index')->name('categoria.index')->middleware('permission:categorias.index');
Route::post('/crear-categoria', 'CategoriasController@store')->name('categoria.store')->middleware('permission:categoria.create');
Route::delete('/eliminar-categoria/{id}','CategoriasController@destroy')->name('categoria.destroy')->middleware('permission:categoria.destroy');
// ------------------categorias----------------------------------------

// ------------------------Catalogo----------------------------------------
Route::get('/catalogos','CatalogosController@index')->name('catalogo.index')->middleware('permission:catalogos.index');
Route::get('/crear-producto-catalogo', 'CatalogosController@create')->name('catalogo.create')->middleware('permission:catalogo.create');
Route::post('/guardar-producto-catalogo','CatalogosController@store')->name('catalogo.store')->middleware('permission:catalogo.create');
Route::get('/editar-producto-catalogo/{id}', 'CatalogosController@edit')->name('catalogo.edit')->middleware('permission:catalogo.edit');
Route::put('/actualizar-producto-catalogo/{producto}', 'CatalogosController@update')->name('catalogo.update')->middleware('permission:catalogo.edit');
Route::delete('/eliminar-producto-catalogo/{id}','CatalogosController@destroy')->name('catalogo.destroy')->middleware('permission:catalogo.destroy');
// -------------------------Catalogo----------------------------------------

// ------------------productos----------------------------------------
Route::get('/entrada-productos','ProductosController@index')->name('productos.index')->middleware('permission:productos.index');
Route::get('/crear-producto', 'ProductosController@create')->name('producto.create')->middleware('permission:producto.create');
Route::post('guardar-producto','ProductosController@store')->name('producto.store')->middleware('permission:producto.create');
Route::get('/editar-producto/{id}', 'ProductosController@edit')->name('producto.edit')->middleware('permission:producto.edit');
Route::post('/actualizar-producto/{producto}', 'ProductosController@update')->name('producto.update')->middleware('permission:producto.edit');
Route::delete('/eliminar-producto/{id}','ProductosController@destroy')->name('producto.destroy')->middleware('permission:producto.destroy');
Route::get('/ver-producto/{id}','ProductosController@show')->name('producto.show')->middleware('permission:producto.show');
// ------------------productos----------------------------------------

// ------------------facturas de ingreso----------------------------------------
Route::get('/admin/facturas','ControllerInvoices@index')->name('factura.index')->middleware('permission:facturas.index');
Route::delete('admin/delete-factura/{id}','ControllerInvoices@destroy')->name('factura.destroy')->middleware('permission:factura.destroy');
Route::get('admin/ver-factura/{id}','ControllerInvoices@show')->name('factura.show')->middleware('permission:factura.show');
// ------------------facturas de ingreso----------------------------------------

// ------------------checkout----------------------------------------
Route::get('/admin/salidas','CheckoutsController@index')->name('salida.index')->middleware('permission:salidas.index');
Route::get('/admin/crear-salida', 'CheckoutsController@create')->name('salida.create')->middleware('permission:salida.create');
Route::post('admin/store-salida','CheckoutsController@store')->name('salida.store')->middleware('permission:salida.create');
Route::get('/admin/editar-salida/{salida}', 'CheckoutsController@edit')->name('salida.edit')->middleware('permission:salida.edit');
Route::post('/admin/salida/{salida}', 'CheckoutsController@update')->name('salida.update')->middleware('permission:salida.edit');
Route::delete('admin/delete-salida/{id}','CheckoutsController@destroy')->name('salida.destroy')->middleware('permission:salida.destroy');
Route::get('admin/ver-salida/{id}','CheckoutsController@show')->name('salida.show')->middleware('permission:salida.show');
// ------------------End checkout----------------------------------------

// ------------------cotizacion----------------------------------------
Route::get('/admin/cotizacion','QuotationsController@index')->name('cotizacion.index')->middleware('permission:cotizaciones.index');
Route::get('/admin/crear-cotizacion', 'QuotationsController@create')->name('cotizacion.create')->middleware('permission:cotizacion.create');
Route::post('admin/store-cotizacion','QuotationsController@store')->name('cotizacion.store')->middleware('permission:cotizacion.create');
Route::get('/editar-cotizacion/{id}', 'QuotationsController@edit')->name('cotizacion.edit')->middleware('permission:cotizacion.edit');
Route::post('/actualizar-cotizacion/{cotizacion}', 'QuotationsController@update')->name('cotizacion.update')->middleware('permission:cotizacion.edit');
Route::delete('/admin/delete-cotizacion/{id}','QuotationsController@destroy')->name('cotizacion.destroy')->middleware('permission:cotizacion.destroy');
Route::get('/admin/ver-cotizacion/{id}','QuotationsController@show')->name('cotizacion.show')->middleware('permission:cotizacion.show');
Route::post('/guardar-cliente-cotizacion', 'QuotationsController@cliente')->name('cliente.cotizacion');

// ------------------cotizacion----------------------------------------
Route::post('/guardar-producto-cotizado', 'ProductosCotizadosController@store')->name('producto_cotizado.store');
Route::delete('/eliminar-producto-cotizado/{id}','ProductosCotizadosController@destroy')->name('producto_cotizado.destroy');
// Route::post('/guardar-producto-cotizado/{producto}','ProductosCotizados@store')->name('producto_cotizado.store');
// Route::get('/admin/crear-cotizacion', 'QuotationsController@create')->name('cotizacion.create')->middleware('permission:cotizacion.create');
// Route::post('admin/store-cotizacion','QuotationsController@store')->name('cotizacion.store')->middleware('permission:cotizacion.create');
// Route::get('/editar-cotizacion/{id}', 'QuotationsController@edit')->name('cotizacion.edit')->middleware('permission:cotizacion.edit');
// Route::post('/actualizar-cotizacion/{cotizacion}', 'QuotationsController@update')->name('cotizacion.update')->middleware('permission:cotizacion.edit');
// Route::delete('/admin/delete-cotizacion/{id}','QuotationsController@destroy')->name('cotizacion.destroy')->middleware('permission:cotizacion.destroy');
// Route::get('/admin/ver-cotizacion/{id}','QuotationsController@show')->name('cotizacion.show')->middleware('permission:cotizacion.show');
// Route::post('/guardar-cliente-cotizacion', 'QuotationsController@cliente')->name('cliente.cotizacion');


// =======================actividades ==============================================
Route::post('/crear-actividad', 'AdminControllers@store')->name('actividad.store');
Route::delete('/actividad/{id}', 'AdminControllers@destroy')->name('actividad.destroy');
Route::get('/edit-actividad/{id}', 'AdminControllers@edit')->name('actividad.edit');
Route::post('/update-actividad', 'AdminControllers@update')->name('actividad.update');
// =======================actividades ==============================================

// =======================reportes ==============================================
Route::get('admin/reporte-cotizacion', 'ReportesController@cotizacion')->name('cotizaciones.show');
Route::get('admin/reporte-facturas', 'ReportesController@factura')->name('facturas.show');
Route::post('admin/generar-facturas', 'ReportesController@generarFacturas')->name('facturas.generar');
Route::post('admin/generar-cotizacion', 'ReportesController@generarCotizacion')->name('cotizaciones.generar');
// =======================reportes ==============================================

// =======================peticiones con ajax ==============================================
Route::get('/producto-catalogo/{id}', 'AjaxController@getCatalogoAjax');
Route::get('/producto/{id}', 'AjaxController@getProductAjax');
Route::get('/cliente-cotizacion/{id}', 'AjaxController@getClientAjax');
Route::get('/productos', 'AjaxController@getProductsAjax');

// =======================recuperar contrasena ==============================================
Route::post('/set-password', 'ControllerResetPass@setPassword')->name('password.new');
Route::get('/admin/correos', 'ControllerCorreos@index')->name('correo.index')->middleware('permission:correos.index');
Route::get('/admin/enviar-correo/{idUser}/{id}', 'ControllerCorreos@send')->name('correo.send');
Route::delete('/admin/delete-correo/{id}', 'ControllerCorreos@destroy')->name('correo.destroy')->middleware('permission:correo.destroy');
Route::post('/admin/update-correo', 'ControllerCorreos@sendEmail')->name('correo.update')->middleware('permission:correo.edit');
// =======================recuperar contrasena ==============================================

// =======================guardar producto nuevo desde cotizacion==============================================
Route::post('/guardar-producto-cotizacion', 'ControllerNewProductQuotation@saveNewProduct')->name('producto.newProducto');

// =======================guardar producto nuevo desde cotizacion==============================================

// =======================crear PDF ==============================================
Route::get("factura/{id}","PDFController@downloadPDF");
Route::get("descargar/{id}","PDFController@descargarPDF");
Route::get("/cotizacion/{quotation}","PDFController@cotizacionPDF");
Route::get("descargar-cotizacion/{cotizacion}","PDFController@descargarCotizacionPDF");
