@php
$prefix = Request::route()->getprefix();
$route = Route::current()->getName();
//dd("$prefix/assign/class");

@endphp

<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="{{ route('dashboard') }}">
                <span class="smini-visible">
                    D<span class="opacity-75">x</span>
                </span>
                <span class="smini-hidden">
                   Dashboard
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle"
                    data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on"
                    onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </button>
                <!-- END Toggle Sidebar Style -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                    data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->

    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="be_pages_dashboard.html">
                        <i class="nav-main-link-icon fa fa-location-arrow"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">6</span>
                    </a>
                </li>

                <li class="nav-main-heading">Employé</li>
                <li class="nav-main-item {{ $prefix == '/employees' ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" 
                    data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="true" href="#employee">
                        <i class="nav-main-link-icon fa fa-border-all"></i>
                        <span class="nav-main-link-name">Gestion Personel</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ $route == 'employee.designation.view' ? 'active' : '' }}
                            {{ $route == 'employee.designation.add' ? 'active' : '' }}"
                             href="{{ route('employee.designation.view') }}">
                                <span class="nav-main-link-name">Fonction</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ $route == 'employee.view' ? 'active' : '' }}
                            {{ $route == 'employee.add' ? 'active' : '' }}"
                             href="{{ route('employee.registration.view') }}">
                                <span class="nav-main-link-name">Personel</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ $route == 'pay.salary.view' ? 'active' : '' }}" 
                            href="{{ route('pay.salary.view') }}">
                                <span class="nav-main-link-name">Payer Personnel</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link " 
                            href="{{ route('account.salary.view') }}">
                                <span class="nav-main-link-name">Personel Payé</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ $route == 'employee.leave.view' ? 'active' : '' }}" 
                            href="{{ route('employee.leave.view') }}">
                                <span class="nav-main-link-name">Rupture de contrat</span>
                            </a>
                        </li>
                      
                    </ul>
                </li>

                <li class="nav-main-heading">Equipements</li>
                <li class="nav-main-item {{ $prefix == '/equipements' ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" 
                    data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="true" href="#employee">
                        <i class="nav-main-link-icon fa fa-border-all"></i>
                        <span class="nav-main-link-name">Gestion Equipeme...</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ $route == 'equip.registration.view' ? 'active' : '' }}
                            {{ $route == 'equipement.add' ? 'active' : '' }}"
                             href="{{ route('equip.registration.view') }}">
                                <span class="nav-main-link-name">Equipements Récupéra...</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link " 
                            href="{{ route('equipement.registration.view') }}">
                                <span class="nav-main-link-name">Equipements Non Récu...</span>
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-boxes"></i>
                        <span class="nav-main-link-name">Widgets</span>
                    </a>
                    <ul class="nav-main-submenu">
                      
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_widgets_blog.html">
                                <span class="nav-main-link-name">Blog</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="be_widgets_various.html">
                                <span class="nav-main-link-name">Various</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-vector-square"></i>
                        <span class="nav-main-link-name">Layout</span>
                    </a>
                    
                </li>


                <li class="nav-main-heading">Produit/Services</li>
                <li class="nav-main-item {{ $prefix == '/equipements' ? 'open' : '' }}">
                    <a class="nav-main-link nav-main-link-submenu" 
                    data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="true" href="#employee">
                        <i class="nav-main-link-icon fa fa-border-all"></i>
                        <span class="nav-main-link-name">Produits</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ $route == 'category.product.view' ? 'active' : '' }}
                            {{ $route == 'category.product.add' ? 'active' : '' }}"
                             href="{{ route('category.product.view') }}">
                                <span class="nav-main-link-name">Categories Produit</span>
                            </a>
                        </li>
                        
                        <li class="nav-main-item">
                            <a class="nav-main-link  {{ $route == 'product.view' ? 'active' : '' }}
                            {{ $route == 'product.view' ? 'active' : '' }}"
                             href="{{ route('product.view') }}">
                                <span class="nav-main-link-name">Produits</span>
                            </a>
                        </li>
                       
                      
                    </ul>
                </li>
              
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-vector-square"></i>
                        <span class="nav-main-link-name">Layout</span>
                    </a>
                    
                </li>


            </ul>
            </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
