 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="index.html" class="app-brand-link">
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
         <li class="menu-item  {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
             <a href="{{ route('admin.dashboard') }}" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div>Dashboard</div>
             </a>
         </li>

         <!-- Layouts -->
         <li
             class="menu-item {{ request()->routeIs(['admin.ruang.*', 'admin.mapel.*', 'admin.waktu_absensi.*']) ? 'active open' : '' }}">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons bx bx-layout"></i>
                 <div data-i18n="Layouts">Data Master</div>
             </a>

             <ul class="menu-sub">
                 <li class="menu-item {{ request()->routeIs('admin.ruang.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.ruang.index') }}" class="menu-link">
                         <div>Data Ruang</div>
                     </a>
                 </li>
                 <li class="menu-item {{ request()->routeIs('admin.mapel.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.mapel.index') }}" class="menu-link">
                         <div>Data Mapel</div>
                     </a>
                 </li>
                 <li class="menu-item {{ request()->routeIs('admin.waktu_absensi.*') ? 'active' : '' }}">
                     <a href="{{ route('admin.waktu_absensi.index') }}" class="menu-link">
                         <div>Data Waktu Absensi</div>
                     </a>
                 </li>
             </ul>
         </li>

         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Pages</span>
         </li>
         <li class="menu-item">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons bx bx-dock-top"></i>
                 <div data-i18n="Account Settings">Account Settings</div>
             </a>
             <ul class="menu-sub">
                 <li class="menu-item">
                     <a href="pages-account-settings-account.html" class="menu-link">
                         <div data-i18n="Account">Account</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="pages-account-settings-notifications.html" class="menu-link">
                         <div data-i18n="Notifications">Notifications</div>
                     </a>
                 </li>
                 <li class="menu-item">
                     <a href="pages-account-settings-connections.html" class="menu-link">
                         <div data-i18n="Connections">Connections</div>
                     </a>
                 </li>
             </ul>
         </li>

     </ul>
 </aside>
