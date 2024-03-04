<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div
            class="brand-logo d-flex align-items-center justify-content-between"
        >
            <a class="text-nowrap logo-img d-flex" href="/">
                <img
                    alt=""
                    src="{{ asset("images/logos/logo-bwws.jpg") }}"
                    width="60"
                />
                <p class="text-wrap fw-normal text-dark my-auto p-2">
                    Balai Wilayah Sungai Sumatera IV
                </p>
            </a>
            <div
                class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
                id="sidebarCollapse"
            >
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Fitur</span>
                </li>
                <li
                    class="sidebar-item {{ request()->is("/") ? "selected" : "" }}"
                >
                    <a aria-expanded="false" class="sidebar-link" href="/">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li
                    class="sidebar-item {{ request()->is("laporan") ? "selected" : "" }}"
                >
                    <a
                        aria-expanded="false"
                        class="sidebar-link"
                        href="/laporan"
                    >
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>
                @if (\Illuminate\Support\Facades\Auth::user()->is_admin)
                    <li
                        class="sidebar-item {{ request()->is("konfigurasi-waktu*") ? "selected" : "" }}"
                    >
                        <a
                            aria-expanded="false"
                            class="sidebar-link"
                            href="/konfigurasi-waktu"
                        >
                            <span>
                                <i class="ti ti-clock-edit"></i>
                            </span>
                            <span class="hide-menu">Konfigurasi Waktu</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->is("konfigurasi-wilayah*") ? "selected" : "" }}"
                    >
                        <a
                            aria-expanded="false"
                            class="sidebar-link"
                            href="/konfigurasi-wilayah"
                        >
                            <span>
                                <i class="ti ti-trees"></i>
                            </span>
                            <span class="hide-menu">Konfigurasi Wilayah</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->is("pos*") ? "selected" : "" }}"
                    >
                        <a
                            aria-expanded="false"
                            class="sidebar-link"
                            href="/pos"
                        >
                            <span>
                                <i class="ti ti-building-lighthouse"></i>
                            </span>
                            <span class="hide-menu">Daftar Pos Penjaga</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ request()->is("konfigurasi-user*") ? "selected" : "" }}"
                    >
                        <a
                            aria-expanded="false"
                            class="sidebar-link"
                            href="/konfigurasi-user"
                        >
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Daftar User</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
