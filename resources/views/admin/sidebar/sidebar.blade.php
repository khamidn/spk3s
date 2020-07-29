<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <!-- <div class="user-info">
            <div class="image">
                <img src="../../images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nur Khamid</div>
                <div class="email">nur.khamid@example.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{route('profil.saya')}}"><i class="material-icons">person</i>Profile</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <!-- <li class="header">METODE AHP-TOPSIS</li> -->
                @if(Auth::check())

                <li class="{{set_active('dashboard.index')}} ">
                    <a href="{{route('dashboard.index')}}">
                        <i class="material-icons">home</i>
                        <span>Beranda</span>
                    </a>
                </li>
                
                <li class="{{set_active('dataAlternatif.index')}}">
                    <a href="{{route('dataAlternatif.index')}}">
                        <i class="material-icons">group</i>
                        <span>Data Siswa</span>
                    </a>
                </li>
                @if(Auth::user()->hasRole('wali_kelas'))
                <!-- DITAMPILKAN UNTUK WALI KELAS -->
                <li class="{{set_active('inputNilai.index')}} ">
                    <a href="{{route('inputNilai.index')}}">
                        <i class="material-icons">create</i>
                        <span>Input Nilai</span>
                    </a>
                </li>
                <li class="{{set_active('topsis.rangking')}}">
                    <a href="{{route('topsis.rangking')}}">
                        <i class="material-icons">equalizer</i>
                        <span>Hasil Akhir</span>
                    </a>
                </li>
                <!-- ///////////////////////////////////////////// -->
                @endif
                
                @if(Auth::user()->hasRole('admin'))
                <!-- DITAMPILKAN UNTUK ADMIN -->
                <li class="{{set_active('pengguna.index')}}">
                    <a href="{{route('pengguna.index')}}">
                        <i class="material-icons">group</i>
                        <span>Pengguna</span>
                    </a>
                </li>

                <li class="{{set_active('kelas.index')}}">
                    <a href="{{route('kelas.index')}}">
                        <i class="material-icons">class</i>
                        <span>Kelas</span>
                    </a>
                </li>
                <!-- ///////////////////////////////////////////// -->

                <!-- DITAMPILKAN UNTUK ADMIN -->
                @if(set_active('AhpMatriks.index') || set_active('AhpKriteria.index') || set_active('AhpBobot.index'))
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">fitness_center</i>
                        <span>Olah Data AHP</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{set_active('AhpKriteria.index')}} "><a href="{{route('AhpKriteria.index')}} ">Kriteria</a></li>
                        <li class="{{set_active('AhpMatriks.index')}}"><a href="{{route('AhpMatriks.index')}} ">Perhitungan</a></li>
                        <li class="{{set_active('AhpBobot.index')}}"><a href="{{route('AhpBobot.index')}}">Bobot Kriteria</a></li>
                    </ul>
                </li>

                @else
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">fitness_center</i>
                        <span>Olah Data AHP</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('AhpKriteria.index')}} ">Kriteria</a></li>
                        <li><a href="{{route('AhpMatriks.index')}} ">Perhitungan</a></li>
                        <li><a href="{{route('AhpBobot.index')}}">Bobot Kriteria</a></li>
                    </ul>
                </li>
                
                @endif

                @if(set_active('dataNilai.index')||set_active('batasKeputusan.index')||set_active('topsis.rangking'))
                <li class="active">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">transform</i>
                        <span>Olah Data TOPSIS</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{set_active('dataNilai.index')}}"><a href="{{route('dataNilai.index')}} ">Perhitungan</a></li>
                        <li class="{{set_active('topsis.rangking')}}"><a href="{{route('topsis.rangking')}}">Hasil Akhir</a></li>
                    </ul>
                </li>
                @else
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">transform</i>
                        <span>Olah Data TOPSIS</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('dataNilai.index')}}">Perhitungan</a></li>
                         <li><a href="{{route('topsis.rangking')}}">Hasil Akhir</a></li>
                    </ul>
                </li>
                @endif

                
                <!-- //////////////////////////////////////// -->
                @endif
                @endif

                
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <!-- <div class="copyright">
                &copy; 2018 - 2019 
                <a href="javascript:void(0);">Lulus</a>!!!
            </div> -->
            <div class="version">
                <b>Version: </b> 1.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
