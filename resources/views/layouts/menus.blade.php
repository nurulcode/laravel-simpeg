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
                            <a href="#"> <i class="ti-minus"></i> Diklat </a>
                            <a href="#"> <i class="ti-minus"></i> Seminar </a>
                            <a href="#"> <i class="ti-minus"></i> Tunjangan </a>
                            <a href="#"> <i class="ti-minus"></i> Arsip </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-view-list-alt"></i>
                        <span> Rekapitulasi
                            <span class="float-right menu-arrow">
                                <i class="mdi mdi-chevron-right"></i>
                            </span>
                        </span>
                    </a>
                    <ul class="submenu mm-collapse">
                        <li>
                            <a href="{{ route('rekapitulasi.index') }}"> <i class="ti-minus"></i> Golonagan </a>
                            <a href="#"> <i class="ti-minus"></i> Pendidikan </a>
                            <a href="#"> <i class="ti-minus"></i> Unit Kerja </a>
                        </li>
                    </ul>
                </li>
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
                            <a href="#"> <i class="ti-minus"></i> Pensiun </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
