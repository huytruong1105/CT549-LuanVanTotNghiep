          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{URL::to('/')}}/avatars/{{Auth::user()->user_avatar}}" alt="User profile picture">

              <h3 class="profile-username text-center">
                {{ Auth::user()->fullname }}
              </h3>
              <h3 class="profile-username text-center">
                {{ Auth::user()->student->student_code }}
              </h3>
                <div class="text-muted text-center">
                @foreach (Auth::user()->student->homeroom_student->all() as $homeroom_student)
                  <p>{{ $homeroom_student->homeroom->speciality->speciality_name }}</p>
                  
                @endforeach
                </div>
              
            </div>
            <!-- /.box-body -->
          </div>
                   <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong> Họ và tên </strong>
              <p class="text-muted">
               {{Auth::user()->fullname}}
              </p>
              <strong> Lớp </strong>
              <div class="text-muted">
                @foreach (Auth::user()->student->homeroom_student->all() as $homeroom_student)
                  <p>{{ $homeroom_student->homeroom->homeroom_name }}</p>
                  
                @endforeach
              </div>
               <strong> Số điện thoại cá nhân </strong>
              <p class="text-muted">
               {{Auth::user()->personal_phone}}
              </p>
              <strong> Địa chỉ liên hệ </strong>
              <p class="text-muted">
               {{Auth::user()->current_address}}, {{Auth::user()->district->district_name}}, {{Auth::user()->district->city->city_name}} 
              </p>
              <strong> Email sinh viên </strong>
              <p class="text-muted">
               {{Auth::user()->student->student_email}}
              </p>
              <strong> Email cá nhân  </strong>
              <p class="text-muted">
               {{Auth::user()->email}}
              </p>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->