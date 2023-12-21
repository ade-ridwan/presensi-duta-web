 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="{{ url('') }}" class="app-brand-link">
             <span class="app-brand-logo demo">
                 <img src="{{ asset('template/assets/img/favicon/favicon.ico.png') }}" alt="">
             </span>
             <span class="app-brand-text h4 mt-3 menu-text fw-bolder ms-2">Presensi</span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item  {{ request()->routeIs('pegawai.dashboard') ? 'active' : '' }}">
             <a href="{{ route('pegawai.dashboard') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Dashboard</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs(['pegawai.jadwal_pelajaran.*']) ? 'active open' : '' }}">
             <a href="{{ route('pegawai.jadwal_pelajaran.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-calendar"></i>
                 <div>Jadwal Pelajaran</div>
             </a>
         </li>

         {{--
         <li class="menu-item">
             <a href="index.html" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Scan Kehadiran</div>
             </a>
         </li> --}}

         <li class="menu-item {{ request()->routeIs(['pegawai.scan.ruangan*']) ? 'active' : '' }}">
             <a href="{{ route('pegawai.scan.ruangan') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-scan"></i>
                 <div data-i18n="Analytics">Scan Ruangan</div>
             </a>
         </li>

         <li class="menu-item {{ request()->routeIs(['pegawai.absen_mengajar.index.*']) ? 'active' : '' }}">
             <a href="{{ route('pegawai.absen_mengajar.index') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Absensi Mengajar</div>
             </a>
         </li>
     </ul>
 </aside>
