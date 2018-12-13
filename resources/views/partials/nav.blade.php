
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="/trangchu" class="navbar-brand"><b>Cựu sinh viên khoa CNTT & TT</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bài đăng và sự kiện<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Bài đăng</a></li> 
                <li><a href="#">Sự kiện</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Lớp của bạn <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @foreach (Auth::user()->student->homeroom_student->all() as $homeroom_student)
                <li><a href="#">{{ $homeroom_student->homeroom->homeroom_code }}</a></li> 
                @endforeach
              </ul>
            </li>
            <li><a href="http://cit.ctu.edu.vn">CIT</a></li>
            @php
              $check_status = false;
            @endphp
            @foreach (Auth::user()->student->homeroom_student->all() as $homeroom_student)
            @if($homeroom_student->status == "CG")
              @php
                $check_status = true;
              @endphp
            @endif
            @endforeach
            @if($check_status == true)
              <li><a href="/khaosat">Khảo sát tốt nghiệp</a></li>
            @endif

          </ul>
          <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form> -->
 
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            @include('partials.user')
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>