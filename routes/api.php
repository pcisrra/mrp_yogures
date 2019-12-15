<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Clientes
    Route::apiResource('clientes', 'ClientesApiController');

    // Productos
    Route::apiResource('productos', 'ProductosApiController');

    // Presentaciones
    Route::apiResource('presentaciones', 'PresentacionesApiController');

    // Pedidos
    Route::apiResource('pedidos', 'PedidosApiController');
});
