<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'cliente_create',
            ],
            [
                'id'    => '18',
                'title' => 'cliente_edit',
            ],
            [
                'id'    => '19',
                'title' => 'cliente_show',
            ],
            [
                'id'    => '20',
                'title' => 'cliente_delete',
            ],
            [
                'id'    => '21',
                'title' => 'cliente_access',
            ],
            [
                'id'    => '22',
                'title' => 'producto_create',
            ],
            [
                'id'    => '23',
                'title' => 'producto_edit',
            ],
            [
                'id'    => '24',
                'title' => 'producto_show',
            ],
            [
                'id'    => '25',
                'title' => 'producto_delete',
            ],
            [
                'id'    => '26',
                'title' => 'producto_access',
            ],
            [
                'id'    => '27',
                'title' => 'presentacione_create',
            ],
            [
                'id'    => '28',
                'title' => 'presentacione_edit',
            ],
            [
                'id'    => '29',
                'title' => 'presentacione_show',
            ],
            [
                'id'    => '30',
                'title' => 'presentacione_delete',
            ],
            [
                'id'    => '31',
                'title' => 'presentacione_access',
            ],
            [
                'id'    => '32',
                'title' => 'pedido_create',
            ],
            [
                'id'    => '33',
                'title' => 'pedido_edit',
            ],
            [
                'id'    => '34',
                'title' => 'pedido_show',
            ],
            [
                'id'    => '35',
                'title' => 'pedido_delete',
            ],
            [
                'id'    => '36',
                'title' => 'pedido_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
