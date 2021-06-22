



  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      @if (isset($name))
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("images/$image")}}"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$name}}</a>
        </div>
      </div>
      @endif

  

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#"class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Danh Sách
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/book')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý kho sách</p>
                </a>
              </li>
            
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


