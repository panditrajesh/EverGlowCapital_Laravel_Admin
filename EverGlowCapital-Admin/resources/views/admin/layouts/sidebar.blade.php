<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo Okay -->
    <a href="{{route("admin.dashboard")}}" class="brand-link">
        <img src="{{asset('/images.jfif')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Everglow Capital</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) Okay -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("uploads/" . auth()->user()->admin_image)}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{route("admin.profile")}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                <li class="nav-item {{ request()->is('everglow-capital/admin/dashboard') ? 'menu-open' : ''}} ">
                    <a href="{{route("admin.dashboard")}}"
                        class="nav-link {{ request()->is('everglow-capital/admin/dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">Layouts</li>
                <!-- CMS Management -->
                <li class="nav-item {{request()->is('everglow-capital/admin/contact-us') ? 'menu-open' : ''}}">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            CMS Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Us</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="{{route("admin.contactus")}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/contact-us') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>How it works?</p>
                            </a>
                        </li> -->
                    </ul>
                </li>

                </li>
                <!-- Benefit Management -->
                <li
                    class="nav-item {{ request()->is('everglow-capital/admin/benefit') || request()->is('everglow-capital/admin/benefit-list') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Benefit Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('admin.benefit')}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/benefit') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Perks & Benefits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.benefit.list')}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/benefit-list') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Benefits List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- FAQ Management -->
                <li
                    class="nav-item {{ request()->is('everglow-capital/admin/faq') || request()->is('everglow-capital/admin/faq-list') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            FAQ Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.faq')}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/faq') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQ</p>
                                <!-- <i class="fas fa-angle-left right"></i> -->
                            </a>

                        <li class="nav-item">
                            <a href="{{route('admin.faq.list')}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/faq-list') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Faq List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Testimonial Management -->
                <li
                    class="nav-item {{ request()->is('everglow-capital/admin/testimonial') || request()->is('everglow-capital/admin/testimonial-list') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Testimonial Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.testimonial')}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/testimonial') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimonials</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("admin.testimonial.list")}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/testimonial-list') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimonial List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- BLog Management -->
                <li
                    class="nav-item {{ request()->is('everglow-capital/admin/blog') || request()->is('everglow-capital/admin/blog-list') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Blog Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route("admin.blog")}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/blog') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("admin.blog.list")}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/blog-list') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Subscription Section -->
                <li
                    class="nav-item {{ request()->is('everglow-capital/admin/subscription') || request()->is('everglow-capital/admin/subscription-list') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Subscription Mngmt.
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.subscription')}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/subscription') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subscription</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("admin.subscription.list")}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/subscription-list') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subscription List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Newsletters Section -->
                <li
                    class="nav-item {{ request()->is('everglow-capital/admin/newsletter') || request()->is('everglow-capital/admin/newsletter-list') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Newsletter Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route("admin.newsletter")}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/newsletter') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Newsletter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.newsletter.list')}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/newsletter-list') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Newsletters List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Extras -->
                <li class="nav-item {{ request()->is('everglow-capital/admin/registered-users') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route("admin.registereduser")}}"
                                class="nav-link {{ request()->is('everglow-capital/admin/registered-users') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Registered User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route("admin.logout")}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout User</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>