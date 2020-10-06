<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{url('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{url('profile')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>My Profile</span></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="{{url('addCategory')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Add Category</span></a>
    </li>


    <li class="nav-item active">
      <a class="nav-link" href="{{url('upload')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Upload Files</span></a>
    </li>


    <li class="nav-item active">
    <a class="nav-link" href="{{url('logout')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Logout</span></a>
    </li>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
