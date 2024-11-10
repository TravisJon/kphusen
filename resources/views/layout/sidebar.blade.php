<!-- Sidebar -->
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-secondary">
            <li class="nav-item active">
                <a href="{{ url('/dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
            </li>
            <li class="nav-item">
                <a href="{{ route('data_user') }}">
                    <i class="fas fa-desktop"></i>
                    <p>Data User</p>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                    <i class="fas fa-layer-group"></i>
                    <p>Kategori & Satuan</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('kategori') }}">
                                <span class="sub-item">Kategori Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('satuan') }}">
                                <span class="sub-item">Satuan Produk</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Data Master</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ asset('produk') }}">
                                <span class="sub-item">Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('Template') }}/icon-menu.html">
                                <span class="sub-item">Penambahan Stok</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms">
                    <i class="fas fa-pen-square"></i>
                    <p>Transaksi</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="forms">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ asset('Template') }}/forms/forms.html">
                                <span class="sub-item">Penjualan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('Template') }}/forms/forms.html">
                                <span class="sub-item">Pengeluaran</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                    <i class="fas fa-table"></i>
                    <p>Laporan</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ asset('Template') }}/tables/tables.html">
                                <span class="sub-item">Laporan Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('Template') }}/tables/datatables.html">
                                <span class="sub-item">Laporan Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="nav-item">
                <form action="{{ url('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="nav-link"
                        style="background: none; border: none; padding: 0; cursor: pointer; text-align: right; width: 42%;">
                        <i class=""></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li> --}}
            {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#charts">
                        <i class="far fa-chart-bar"></i>
                        <p>Charts</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ asset('Template') }}/charts/charts.html">
                                    <span class="sub-item">Chart Js</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ asset('Template') }}/charts/sparkline.html">
                                    <span class="sub-item">Sparkline</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('Template') }}/widgets.html">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../documentation/index.html">
                        <i class="fas fa-file"></i>
                        <p>Documentation</p>
                        <span class="badge badge-secondary">1</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#submenu">
                        <i class="fas fa-bars"></i>
                        <p>Menu Levels</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav nav-collapse">
                            <li>
                                <a data-bs-toggle="collapse" href="#subnav1">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav1">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a data-bs-toggle="collapse" href="#subnav2">
                                    <span class="sub-item">Level 1</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="subnav2">
                                    <ul class="nav nav-collapse subnav">
                                        <li>
                                            <a href="#">
                                                <span class="sub-item">Level 2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Level 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
        </ul>
    </div>
</div>
<!-- End Sidebar -->
