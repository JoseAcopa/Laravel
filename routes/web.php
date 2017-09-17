<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/admin/admin-welcome', function () {
    return view('admin/admin');
});

Route::get('/admin/client', function () {
    return view('admin/client/client');
});

Route::get('/admin/add-client', function () {
    return view('admin/client/add-client');
});

Route::get('/admin/edit-client', function () {
    return view('admin/client/edit-client');
});

Route::get('/admin/employee', function () {
    return view('admin/employee/employee');
});

Route::get('/admin/add-employee', function () {
    return view('admin/employee/add-employee');
});

Route:: get('/admin/edit-employee', function(){
  return view('admin/employee/edit-employee');
});

Route:: get('/admin/quotation', function(){
  return view('admin/quotation/quotation');
});

Route:: get('/admin/add-quotation', function(){
  return view('admin/quotation/add-quotation');
});

Route:: get('/admin/edit-quotation', function(){
  return view ('admin/quotation/edit-quotation');
});

Route::get('/admin/inventaryMenu', function(){
  return view ('admin/inventary/inventaryMenu');
});

Route::get('/admin/inventary', function(){
  return view ('admin/inventary/inventary');
});

Route::get('/admin/add-product', function(){
  return view ('admin/inventary/add-product');
});

Route::get('/admin/edit-product', function(){
  return view ('admin/inventary/edit-product');
});

Route::get('/admin/inventary-out', function(){
  return view ('admin/inventary/inventary-out');
});

Route::get('/admin/add-out', function(){
  return view ('admin/inventary/add-out');
});

Route::get('/admin/edit-out', function(){
  return view ('admin/inventary/edit-out');
});





/**************Users***************************/
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

Route::get('/admin/add-entrada', function(){
  return view ('admin/inventary/add-entrada');
});
