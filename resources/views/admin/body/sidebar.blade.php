<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="index.html">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-utensils"></i>
                        <span data-key="t-apps">Categorias</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.category') }}">
                                <span data-key="t-calendar">Todas las Categorias</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('add.category') }}">
                                <span data-key="t-chat">Agregar Categoria</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-city"></i>
                        <span data-key="t-apps">Ciudad</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.city') }}">
                                <span data-key="t-calendar">Todas las Ciudades</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-hamburger"></i>
                        <span data-key="t-apps">Gestionar Productos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.all.product') }}">
                                <span data-key="t-calendar">Todos los Productos</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.add.product') }}">
                                <span data-key="t-chat">Agregar Producto</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-wine-glass-alt"></i>
                        <span data-key="t-apps">Gestionar Restaurante</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('pending.restaurant') }}">
                                <span data-key="t-calendar">Restaurante Pendiente</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('approve.restaurant') }}">
                                <span data-key="t-chat">Aprobar Restaurante</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-image"></i>
                        <span data-key="t-apps">Gestionar Banner</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('all.banner') }}">
                                <span data-key="t-calendar">Todos los Banner</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-clipboard-list"></i>
                        <span data-key="t-apps">Gestionar Ordenes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('pending.order') }}">
                                <span data-key="t-calendar">Ordenes Pendientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('confirm.order') }}">
                                <span data-key="t-calendar">Ordenes Confirmadas</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('processing.order') }}">
                                <span data-key="t-calendar">Ordenes en Proceso</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('deliverd.order') }}">
                                <span data-key="t-calendar">Ordenes a Entregar</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title mt-2" data-key="t-components">Elements</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span data-key="t-components">Gestionar Reportes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.all.reports') }}" data-key="t-alerts">Todos los Reportes</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="gift"></i>
                        <span data-key="t-ui-elements">Extended</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="extended-lightbox.html" data-key="t-lightbox">Lightbox</a></li>
                        <li><a href="extended-rangeslider.html" data-key="t-range-slider">Range Slider</a></li>
                    </ul>
                </li>

            </ul>

            <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                        <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>
