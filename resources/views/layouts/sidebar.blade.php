 <div class="vertical-menu ">

    <div data-simplebar class="h-100 bg-warning">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                    <li>
                    <a href="/" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-chat" class="text-dark">Dasbor</span>
                    </a>
                </li>    

                <li class="menu-title" key="t-apps">Apps</li>     

                
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-rice font-size-24"></i>
                        <span key="t-blog" class="text-dark">Data Pakan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('pakan.index') }}" key="t-blog-list">Stok Masuk</a></li>
                        <li><a href="{{ route('stok-keluar.index') }}" key="t-blog-grid">Stok Keluar</a></li>
                        {{-- <li><a href="blog-details.html" key="t-blog-details">Blog Details</a></li> --}}
                    </ul>
                </li>


                <li>
                    <a href="{{ route('produksi.index') }}" class="waves-effect">
                        <i class="mdi mdi-egg-outline "></i>
                        <span key="t-chat" class="text-dark">Porduksi Telur</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('keuangan') }}" class="waves-effect">
                        <i class="mdi mdi-cash "></i>
                        <span key="t-chat" class="text-dark">Keuangan</span>
                    </a>
                </li>                                

                <li>
                    <a href="{{ route('pelanggan.index') }}" class="waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-chat" class="text-dark">Pelanggan</span>
                    </a>
                </li>

                    <li>
                    <a href="chat.html" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-chat" class="text-dark">User</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-blog" class="text-dark">Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="blog-list.html" key="t-blog-list">Laporan Produksi</a></li>
                        <li><a href="blog-grid.html" key="t-blog-grid">Laporan Keuangan</a></li>
                        
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>