<!-- BEGIN SIDEBAR -->
    <div class="page-sidebar" data-pages="sidebar">
      <div id="appMenu" class="sidebar-overlay-slide from-top">
      </div>
      <!-- BEGIN SIDEBAR HEADER -->
      <div class="sidebar-header">
        <img src="/img/logo_white.png" alt="logo" class="brand" data-src="/img/logo_white.png" data-src-retina="/img/logo_white_2x.png" width="78" height="22">
        <div class="sidebar-header-controls">
          <button data-pages-toggle="#appMenu" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" type="button"><i class="fa fa-angle-down fs-16"></i>
          </button>
          <button data-toggle-pin="sidebar" class="btn btn-link visible-lg-inline" type="button"><i class="fa fs-12"></i>
          </button>
        </div>
      </div>
      <!-- END SIDEBAR HEADER -->
      <!-- BEGIN SIDEBAR MENU -->
      <div class="sidebar-menu">
        <ul class="menu-items">

        @if(Sentinel::check())
        <li class="m-t-30">
            <a href="{{ route('my') }}" class="detailed">
              <span class="title">Dashboard</span>
              <span class="details">234 notifications</span>
            </a>
            <span class="icon-thumbnail "><i class="pg-mail"></i></span>
          </li>
        <li class="">
            <a href="{{ route('characters') }}" class="detailed">
              <span class="title">Characters</span>
              <span class="details">234 notifications</span>
            </a>
            <span class="icon-thumbnail "><i class="pg-mail"></i></span>
          </li>
        <li class="">
            <a href="{{ route('guilds') }}" class="detailed">
              <span class="title">Guilds</span>
              <span class="details">234 notifications</span>
            </a>
            <span class="icon-thumbnail "><i class="pg-mail"></i></span>
          </li>
        
            <li class="">
            <a href="javascript:;">
              <span class="title">{{ Sentinel::getUser()->username }}</span>
              <span class=" arrow"></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('add-character') }}">Add Character</a>
                <span class="icon-thumbnail">sp</span>
              </li>
              <li class="">
                <a href="{{ route('add-guild') }}">Add Guild</a>
                <span class="icon-thumbnail">sp</span>
              </li>
              <li class="">
                <a href="{{ route('new-recruitment') }}">Add recruitment</a>
                <span class="icon-thumbnail">sp</span>
              </li>
            </ul>
          </li>
               
          @if (Sentinel::getUser()->roles()->first()->slug == 'admin')
            <li class="">
            <a href="javascript:;">
              <span class="title">Admin</span>
              <span class=" arrow"></span>
            </a>
            <span class="icon-thumbnail"><i class="pg-grid"></i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('admin') }}">Dashboard</a>
                <span class="icon-thumbnail">sp</span>
              </li>
            </ul>
          </li>
          @endif 
        @endif
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->