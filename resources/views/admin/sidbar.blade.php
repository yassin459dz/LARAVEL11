
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admincss/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Mark Stephen</h1>
          <p>Web Designer</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
              <li class="active"><a href="/admin/dashboard"> <i class="icon-home"></i>Home </a></li>
              <li><a href="/view_order"> <i class="icon-grid"></i>ORDER </a></li>

              <li><a href="/view_category"> <i class="icon-grid"></i>Category </a></li>

                  <li><a href="/add_product">ADD PRODUCT</a></li>
                  <li><a href="/view_product">VIEW PRODUCT</a></li>

                </ul>
              </li>
              <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
            <li><a href="#" onclick="document.getElementById('logout-form').submit();"> <i class="icon-logout"></i>logout</a></li>

      </ul>
    </nav>
