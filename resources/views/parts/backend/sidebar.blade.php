<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">LiViCode</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fa fa-home" aria-hidden="true"></i>
                        <p>
                            Tổng quan
                        </p>
                    </a>

                </li>

                @php
                    use App\Models\Menu;
                    use App\Models\ChildMenu;

                    $menus = Menu::all();

                @endphp
                @foreach ($menus as $item)
                    @php

                        $roles = explode(',', $item->role);
                       

                    @endphp

                    @hasanyrole($roles)
                        <li class="nav-item">
                            <a href= "" class="nav-link">
                                <i style="margin-right: 12px" class="{{ $item->icon }}" aria-hidden="true"></i>
                                <p>
                                    {{ $item->name }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach ($item->childs as $child)
                                    <li class="nav-item">
                                        <a href="{{ route($child->link) }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ $child->name }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                    @endhasanyrole
                @endforeach




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
