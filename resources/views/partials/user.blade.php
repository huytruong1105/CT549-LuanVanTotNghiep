            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{URL::to('/')}}/avatars/{{Auth::user()->user_avatar}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->fullname }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src=" {{URL::to('/')}}/avatars/{{Auth::user()->user_avatar}} " class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->fullname }} - {{ Auth::user()->student->student_code }}
                    <small>Là thành viên kể từ {{Auth::user()->created_at->format('d-m-Y')}}</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="/thongtincanhan" class="btn btn-default btn-flat">Thông tin cá nhân</a>
                  </div>
                  <div class="pull-right">
                    <a href="/dangxuat" class="btn btn-default btn-flat">Đăng xuất</a>
                  </div>
                </li>
              </ul>
            </li>