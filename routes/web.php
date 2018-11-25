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
Route::get('/facturas-ingresos','FacturasIngresoController@index')->name('facturas.index')->middleware('permission:facturas.index');
Route::delete('/eliminar-factura/{id}','FacturasIngresoController@destroy')->name('factura.destroy')->middleware('permission:factura.destroy');
Route::get('admin/ver-factura/{id}','FacturasIngresoController@show')->name('factura.show')->middleware('permission:factura.show');
// ------------------facturas de ingreso----------------------------------------

// ------------------salida----------------------------------------
Route::get('/salida-producto','SalidasController@index')->name('salida.index')->middleware('permission:salidas.index');
Route::get('/crear-salida-producto', 'SalidasController@create')->name('salida.create')->middleware('permission:salida.create');
Route::post('guardar-salida-producto','SalidasController@store')->name('salida.store')->middleware('permission:salida.create');
Route::get('/editar-salida-producto/{id}', 'SalidasController@edit')->name('salida.edit')->middleware('permission:salida.edit');
Route::put('/actualizar-salida-producto/{salida}', 'SalidasController@update')->name('salida.update')->middleware('permission:salida.edit');
Route::delete('/eliminar-salida-producto/{id}','SalidasController@destroy')->name('salida.destroy')->middleware('permission:salida.destroy');
Route::get('/ver-salida-producto/{id}','SalidasController@show')->name('salida.show')->middleware('permission:salida.show');
// ------------------salida----------------------------------------

// ------------------cotizacion----------------------------------------
Route::get('/cotizacion','CotizacionController@index')->name('cotizacion.index')->middleware('permission:cotizaciones.index');
Route::get('/crear-cotizacion', 'CotizacionController@create')->name('cotizacion.create')->middleware('permission:cotizacion.create');
Route::post('/guardar-cotizacion','CotizacionController@store')->name('cotizacion.store')->middleware('permission:cotizacion.create');
Route::get('/editar-cotizacion/{id}', 'CotizacionController@edit')->name('cotizacion.edit')->middleware('permission:cotizacion.edit');
Route::put('/actualizar-cotizacion/{cotizacion}', 'CotizacionController@update')->name('cotizacion.update')->middleware('permission:cotizacion.edit');
Route::delete('/eliminar-cotizacion/{id}','CotizacionController@destroy')->name('cotizacion.destroy')->middleware('permission:cotizacion.destroy');
Route::get('/ver-cotizacion/{id}','CotizacionController@show')->name('cotizacion.show')->middleware('permission:cotizacion.show');
Route::post('/guardar-cliente-cotizacion', 'CotizacionController@cliente')->name('cliente.cotizacion');

// =======================guardar producto nuevo desde cotizacion==============================================
Route::post('/guardar-producto-cotizacion', 'ControllerNewProductQuotation@saveNewProduct')->name('producto.newProducto');

// ------------------cotizaciguardar producto cotizado----------------------------------------
Route::post('/guardar-producto-cotizado', 'ProductosCotizadosController@store')->name('producto_cotizado.store');
Route::delete('/eliminar-producto-cotizado/{id}','ProductosCotizadosController@destroy')->name('producto_cotizado.destroy');


// =======================actividades ==============================================
Route::post('/crear-actividad', 'AdminControllers@store')->name('actividad.store');
Route::delete('/actividad/{id}', 'AdminControllers@destroy')->name('actividad.destroy');
Route::get('/edit-actividad/{id}', 'AdminControllers@edit')->name('actividad.edit');
Route::post('/update-actividad', 'AdminControllers@update')->name('actividad.update');
// =======================actividades ==============================================

// =======================peticiones con ajax ==============================================
Route::get('/producto-catalogo/{id}', 'AjaxController@getCatalogoAjax');
Route::get('/producto-cotizacion/{id}', 'AjaxController@getProductoAjax');
Route::get('/cliente-cotizacion/{id}', 'AjaxController@getClienteAjax');
Route::get('/producto-salida/{id}', 'AjaxController@getProductoSalidaAjax');

// =======================Enviando correos ==============================================
Route::post('/set-password', 'ControllerResetPass@setPassword')->name('password.new');
Route::get('/admin/correos', 'ControllerCorreos@index')->name('correo.index')->middleware('permission:correos.index');
Route::get('/admin/enviar-correo/{idUser}/{id}', 'ControllerCorreos@send')->name('correo.send');
Route::delete('/admin/delete-correo/{id}', 'ControllerCorreos@destroy')->name('correo.destroy')->middleware('permission:correo.destroy');
Route::post('/admin/update-correo', 'ControllerCorreos@sendEmail')->name('correo.update')->middleware('permission:correo.edit');
Route::post('/enviar-correo-rapido', 'CorreoController@correoRapido')->name('correo.quick');
// =======================Enviando correos ==============================================

// =======================crear PDF ==============================================
Route::get("reporte-ingreso/{id}","PDFController@generarReporteIngreso")->name('reporte.generate');
Route::get("reporte-general-ingreso","PDFController@reporteGeneralIngreso")->name('reporte.general');
Route::get("reporte-salida/{id}","PDFController@generarReporteSalida")->name('reporte.salida');
Route::get("descargar/{id}","PDFController@descargarPDF");
Route::get("/cotizacion/{quotation}","PDFController@cotizacionPDF");
Route::get("descargar-cotizacion/{cotizacion}","PDFController@descargarCotizacionPDF");

// =======================buscando reportes==============================================
Route::post('/buscar-facturas-fecha', 'ReportesController@generarFacturas')->name('facturas.generar');
Route::get('admin/reporte-cotizacion', 'ReportesController@cotizacion')->name('cotizaciones.show');
Route::get('admin/reporte-facturas', 'ReportesController@factura')->name('facturas.show');
Route::post('admin/generar-cotizacion', 'ReportesController@generarCotizacion')->name('cotizaciones.generar');
// =======================buscando reportes ==============================================
