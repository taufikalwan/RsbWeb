<style>
    /* Ubah warna teks saat hover menjadi tetap gelap */
    .main-sidebar .nav-sidebar .nav-link:hover {
        color: #212529 !important; /* Tetap warna gelap */
        background-color: #f8f9fa !important; /* Soft gray saat hover */
    }

    /* Warna teks saat active juga tetap kontras */
    .main-sidebar .nav-sidebar .nav-link.active {
        color: #fff !important;
        background-color: #0d6efd !important; /* Biru saat active */
    }

    /* Untuk dropdown link (nav-treeview) saat hover */
    .main-sidebar .nav-sidebar .nav-treeview .nav-link:hover {
        color: #212529 !important;
        background-color: #e9ecef !important;
    }

    /* Ikon tetap berwarna saat hover (opsional) */
    .nav-icon {
        transition: transform 0.2s ease;
    }

    .nav-link:hover .nav-icon {
        transform: scale(1.1);
    }
</style>
<!-- Sidebar -->
<div class="sidebar sidebar-light bg-white elevation-3">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="info ml-2">
            <a href="{{ route('admin.profile.show') }}" class="d-block font-weight-bold text-dark">
                {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-line text-primary"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item text-danger">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-friends text-success"></i>
                    <p>Users</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.slides.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-images text-info"></i>
                    <p>Slide</p>
                </a>
            </li>

            <!-- Manajemen Produk -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box-open text-warning"></i>
                    <p>
                        Produk
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link">
                            <i class="fas fa-tag nav-icon text-secondary"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.attributes.index') }}" class="nav-link">
                            <i class="fas fa-sliders-h nav-icon text-secondary"></i>
                            <p>Attribute</p>
                        </a>
                    </li>
                    <li class="nav-item text-black">
                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                            <i class="fas fa-box nav-icon text-secondary"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.reviews.index') }}" class="nav-link">
                            <i class="fas fa-star nav-icon text-secondary"></i>
                            <p>Review</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Manajemen Order -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shopping-cart text-danger"></i>
                    <p>
                        Order
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.orders.index') }}" class="nav-link">
                            <i class="fas fa-receipt nav-icon text-secondary"></i>
                            <p>Order</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.shipments.index') }}" class="nav-link">
                            <i class="fas fa-truck nav-icon text-secondary"></i>
                            <p>Pengiriman</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Manajemen Laporan -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-alt text-primary"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.reports.revenue') }}" class="nav-link">
                            <i class="fas fa-chart-bar nav-icon text-secondary"></i>
                            <p>Keuntungan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.reports.product') }}" class="nav-link">
                            <i class="fas fa-boxes nav-icon text-secondary"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.reports.inventory') }}" class="nav-link">
                            <i class="fas fa-warehouse nav-icon text-secondary"></i>
                            <p>Inventory</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Manajemen Promo -->
            <li class="nav-item">
                <a href="{{ route('admin.promos.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-bullhorn text-warning"></i>
                    <p>Promo</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- /.sidebar -->
