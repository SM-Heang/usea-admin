<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset("dist/img/usea_logo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">USEA Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
          <a href="#" class="d-block">
            Menheang Sao
          </a>
      </div>
    </div> --}}

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('/') ? 'active':'' }}">
            <i class="fas fa-home nav-icon"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('user') ? 'active':'' }}">
            <i class="far fa-user nav-icon"></i>
            <p>User Management</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('index', 'home-article-category', 'home-article-group') ? 'menu-open' :'' }}">
          <a href="#" class="nav-link {{ Request::is('index', 'home-article-category', 'home-article-group') ? 'active' :'' }}">
            <i class="far fa-newspaper nav-icon"></i>
            <p>
              USEA Article
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('articles.index') }}" class="nav-link {{ Request::is('index') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Article</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('articles.categories.index') }}" class="nav-link {{ Request::is('home-article-category') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Article Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('articles.group.index') }}" class="nav-link {{ Request::is('home-article-group') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Article Group</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::is('events', 'events-images') ? 'menu-open' :'' }}">
          <a href="#" class="nav-link {{ Request::is('events', 'events-images') ? 'active' :'' }}">
            <i class="far fa-calendar nav-icon"></i>
            <p>
              USEA Events
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('events.index') }}" class="nav-link {{ Request::is('events') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Events</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('events.images.index') }}" class="nav-link {{ Request::is('events-images') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Events Images</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('partnership.index') }}" class="nav-link {{ Request::is('partnership') ? 'active' : '' }}">
            <i class="fas fa-handshake nav-icon"></i>
            <p>USEA Partnership</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('career.index') }}" class="nav-link {{ Request::is('career') ? 'active' : '' }}">
              <i class="fas fa-briefcase nav-icon"></i>
              <p>USEA Career Center</p>
            </a>
          </li>
        <li class="nav-item {{ Request::is('scholarship', 'scholarship-category', 'scholarship-group') ? 'menu-open' :'' }}">
          <a href="#" class="nav-link {{ Request::is('scholarship', 'scholarship-category', 'scholarship-group') ? 'active' :'' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              USEA Scholarship
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('scholarship.index') }}" class="nav-link {{ Request::is('scholarship') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Scholarship</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('scholarship.categories.index') }}" class="nav-link {{ Request::is('scholarship-category') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Scholarship Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('scholarship.group.index') }}" class="nav-link {{ Request::is('scholarship-group') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Scholarship Group</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::is('study-tour', 'study-tour-image') ? 'menu-open' :'' }}">
          <a href="#" class="nav-link {{ Request::is('study-tour', 'study-tour-image') ? 'active' :'' }}">
            <i class="nav-icon fas fa-bus"></i>
            <p>
              USEA Study Tour
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('study-tour.index') }}" class="nav-link {{ Request::is('study-tour') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Study Tour</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('study-tour.images.index') }}" class="nav-link {{ Request::is('study-tour-image') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Study Tour Images</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ Request::is('study-plan', 'major', 'faculty', 'subject', 'study-year', 'semester', 'fac_icon') ? 'menu-open' :'' }}">
          <a href="#" class="nav-link {{ Request::is('study-plan', 'major', 'faculty', 'subject', 'study-year', 'semester', 'fac_icon') ? 'active' :'' }}">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>
              USEA Study Plan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('study-plan.index')}}" class="nav-link {{ Request::is('study-plan') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Study Plan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('study-plan.major.index')}}" class="nav-link {{ Request::is('major') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usea Major</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('study-plan.faculty.index')}}" class="nav-link {{ Request::is('faculty') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usea Faculty</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('study-plan.fac_icon.index')}}" class="nav-link {{ Request::is('fac_icon') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Faculty iocn</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('study-plan.subject.index')}}" class="nav-link {{ Request::is('subject') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usea Subject</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('study-plan.study-year.index')}}" class="nav-link {{ Request::is('study-year') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Study Year</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('study-plan.semester.index')}}" class="nav-link {{ Request::is('semester') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Study Semester</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="d-flex justify-content-center align-items-center nav-item">
          @if (auth()->check())
          <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button role="button" type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt nav-icon"></i></button>
          </form>
          @else
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="d-flex justify-content-center align-items-center nav-link">
            <button role="button" type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt nav-icon"></i></button>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
