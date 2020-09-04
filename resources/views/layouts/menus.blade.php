<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @can('master-list')
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-view-list-alt"></i>
                        <span> Master Data
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu mm-collapse">
                        <li><a href="{{ route('pendidikan.index') }}"><i class="ti-minus"></i>Pendidikan</a></li>
                        <li><a href="{{ route('jabatan.index') }}"><i class="ti-minus"></i>Jabatan</a></li>
                        <li><a href="{{ route('golongan.index')}}"><i class="ti-minus"></i>Golongan</a></li>
                        <li><a href="{{ route('unit.index')}}"><i class="ti-minus"></i>Unit</a></li>
                        <li><a href="{{ route('gaji.index') }}"><i class="ti-minus"></i>Gaji</a></li>
                    </ul>
                </li>
                @endcan

                @can('pegawai-list')
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-view-list-alt"></i>
                        <span> Manage Pegawai
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu mm-collapse">
                        <li><a href="{{ route('pegawai.index') }}"><i class="ti-minus"></i>Pegawai</a></li>
                    </ul>
                </li>
                @endcan

                @can('history-list')
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-view-list-alt"></i>
                        <span> History Pegawai
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu mm-collapse">
                        <li><a href="{{ route('keluarga.index') }}"> <i class="ti-minus"></i> Keluarga </a></li>
                        <li><a href="{{ route('sekolah.index') }}"> <i class="ti-minus"></i> Pendidikan </a></li>
                        <li><a href="{{ route('bahasa.index') }}"> <i class="ti-minus"></i> Bahasa </a></li>
                    </ul>
                </li>
                @endcan

                @can('kepegawaian-list')
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-view-list-alt"></i>
                        <span> Kepegawaian
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu mm-collapse">
                        <li>
                            <a href="{{ route('teguran.index') }}"> <i class="ti-minus"></i> Teguran </a>
                            <a href="{{ route('arsip.index') }}"> <i class="ti-minus"></i> Arsip </a>
                        </li>
                    </ul>
                </li>
                @endcan

                @can('laporan-list')
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-view-list-alt"></i>
                        <span> Laporan
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu mm-collapse">
                        <li>
                            <a href="#"> <i class="ti-minus"></i> Biodata Pegawai </a>
                        </li>
                    </ul>
                </li>
                @endcan

               @if (auth()->user()->role == 'superuser')
                   <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-view-list-alt"></i>
                        <span> Manage System
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu mm-collapse">
                        <li>
                            <a href="{{ route('users.index') }}"> <i class="ti-minus"></i> Manage User </a>
                        </li>
                        <li>
                            <a href="{{ route('roles.index') }}"> <i class="ti-minus"></i> Manage Role </a>
                        </li>
                        <li>
                            <a href="{{ route('pengumuman.index') }}"> <i class="ti-minus"></i> Manage Info</a>
                        </li>
                    </ul>
                </li>
               @endif
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
