<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('cliente_access')
                <li class="nav-item">
                    <a href="{{ route("admin.clientes.index") }}" class="nav-link {{ request()->is('admin/clientes') || request()->is('admin/clientes/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.cliente.title') }}
                    </a>
                </li>
            @endcan
            @can('producto_access')
                <li class="nav-item">
                    <a href="{{ route("admin.productos.index") }}" class="nav-link {{ request()->is('admin/productos') || request()->is('admin/productos/*') ? 'active' : '' }}">
                        <i class="fa-fw fab fa-product-hunt nav-icon">

                        </i>
                        {{ trans('cruds.producto.title') }}
                    </a>
                </li>
            @endcan
            @can('presentacione_access')
                <li class="nav-item">
                    <a href="{{ route("admin.presentaciones.index") }}" class="nav-link {{ request()->is('admin/presentaciones') || request()->is('admin/presentaciones/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-text-height nav-icon">

                        </i>
                        {{ trans('cruds.presentacione.title') }}
                    </a>
                </li>
            @endcan
            @can('pedido_access')
                <li class="nav-item">
                    <a href="{{ route("admin.pedidos.index") }}" class="nav-link {{ request()->is('admin/pedidos') || request()->is('admin/pedidos/*') ? 'active' : '' }}">
                        <i class="fa-fw far fa-map nav-icon">

                        </i>
                        {{ trans('cruds.pedido.title') }}
                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>