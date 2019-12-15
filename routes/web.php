<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Clientes
    Route::delete('clientes/destroy', 'ClientesController@massDestroy')->name('clientes.massDestroy');
    Route::resource('clientes', 'ClientesController');

    // Productos
    Route::delete('productos/destroy', 'ProductosController@massDestroy')->name('productos.massDestroy');
    Route::resource('productos', 'ProductosController');

    // Presentaciones
    Route::delete('presentaciones/destroy', 'PresentacionesController@massDestroy')->name('presentaciones.massDestroy');
    Route::resource('presentaciones', 'PresentacionesController');

    // Pedidos
    Route::delete('pedidos/destroy', 'PedidosController@massDestroy')->name('pedidos.massDestroy');
    Route::resource('pedidos', 'PedidosController');
});
