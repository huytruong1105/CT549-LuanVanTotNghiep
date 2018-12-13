@extends('layout')


@section('content')

    @include('profile.menu')

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <!-- load up user avatar and user basic info -->
          @include('profile.userinfo')
 
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        @if (session('status_success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>{{ session('status_success') }}</h4>
        </div>
        @endif
        @if (session('status_error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>{{ session('status_error')}}</h4>
        </div>
        @endif
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#userinformation" data-toggle="tab">Cập nhật thông tin liên lạc</a></li>
              <li><a href="#updateWorkingInformation" data-toggle="tab">Cập nhật thông tin việc làm</a></li>
              <li><a href="#workingtimeline" data-toggle="tab">Lịch sử cập nhật việc làm</a></li>
              <li><a href="#event" data-toggle="tab">Lịch sử đăng ký sự kiện</a></li>

            </ul>
            <div class="tab-content">
            

              @include('profile.user')
              <!-- /.tab-pane -->
              @include('profile.updateWorkingInformation')
              <!-- /.tab-pane -->
              @include('profile.event')
              <!-- /.tab-pane -->
              @include('profile.workingtimeline')
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

@endsection

@section('footer')
    <!-- jQuery 3 -->
    <script src="{{URL::to('/')}}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{URL::to('/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{URL::to('/')}}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::to('/')}}/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::to('/')}}/js/demo.js"></script>
    <script src="{{URL::to('/')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{URL::to('/')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{URL::to('/')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{URL::to('/')}}/bower_components/fastclick/lib/fastclick.js"></script>
<script>
    $(function () {
        $('#current_work').DataTable({
            'paging' :true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : true
        })
        $('#past_work').DataTable({
            'paging' :true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : false,
            'info'        : true,
            'autoWidth'   : true
        })

    })
</script>
<script type="text/javascript">
      function getDistrict() {
              var id = $('#city_id').val();
              console.log(id);
              var url = '{{route('district',['id'=> ':slug'])}}';
              url = url.replace(':slug', id);
              $.ajax({
                  type: 'GET',
                  url: url,
                  data: {
                      _token: '{{csrf_token()}}',
                  },
                  success: function (res) {
                      if (res.status) {
                          console.log("Data: " + res.data);
                          chitiet = res.data;
                          var htmlTable = '';
                          $("#district_id").innerHTML = '';
                          htmlTable = htmlTable +'<option value="" selected disabled hidden>Chọn quận huyện</option>';
                          chitiet.forEach(function (element) {
                              htmlTable = htmlTable
                                  + ' <option value="' + element.id + '">' + element.district_name + '</option>'
                          });
                          $("#district_id").html(htmlTable);
                      }
                  }
              });
      }
      window.onload = getDistrict();
      function getDistrictWork() {
                    var id = $('#city_id_work').val();
                    console.log(id);
                    var url = '{{route('district',['id'=> ':slug'])}}';
                    url = url.replace(':slug', id);
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                        success: function (res) {
                            if (res.status) {
                                console.log("Data: " + res.data);
                                chitiet = res.data;
                                var htmlTable = '';
                                $("#district_id_work").innerHTML = '';
                                htmlTable = htmlTable +'<option value="" selected disabled hidden>Chọn quận huyện nơi bạn đang làm việc</option>';
                                chitiet.forEach(function (element) {
                                    htmlTable = htmlTable
                                        + ' <option value="' + element.id + '">' + element.district_name + '</option>'
                                });
                                $("#district_id_work").html(htmlTable);
                            }
                        }
                    });
      }
      function getCompany() {
                    var id = $('#district_id_work').val();
                    console.log(id);
                    var url = '{{route('company',['id'=> ':slug'])}}';
                    url = url.replace(':slug', id);
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                        success: function (res) {
                            if (res.status) {
                                console.log("Data: " + res.data);
                                chitiet = res.data;
                                var htmlTable = '';
                                $("#company_id").innerHTML = '';
                                htmlTable = htmlTable + '<option value="" hidden selected>Chọn công ty bạn đang làm việc</option>';
                                chitiet.forEach(function (element) {
                                    htmlTable = htmlTable
                                        + ' <option value="' + element.id + '">' + element.company_name + '</option>'
                                });
                                htmlTable = htmlTable + '<option value="other">Khác</option>'

                                $("#company_id").html(htmlTable);


                            }
                        }
                    });
      }
</script>
<script>
    function removeAppended() {
        $("#append_started_date").remove();
        $("#append_ended_date").remove();
        $("#append_city_select").remove();
        $("#append_district_select").remove();
        $("#append_company_id").remove();
        $("#append_company_name").remove();
        $("#append_company_address").remove();
        $("#append_salary_select").remove();
        $("#append_position").remove();
    }

    var flag = 0;

    function work_status_flag() {
        var selectVal = $('#work_status').val();
        if (selectVal == 0) {
            removeAppended();
            $("#append_belong_to_major").remove();
        } else {
            var HTMLbelongsToMajor = '<div id="append_belong_to_major"><label for="belong_to_major" class="col-sm-2 control-label">Thuộc chuyên ngành</label>' +
                '<div class="col-sm-10"><select class="form-control" name="belong_to_major" id="belong_to_major" style="width: 100%;" required>' +
                '<option value="0" selected title="Chọn vào đây khi công việc của bạn không thuộc chuyên ngành hoặc không có liên quan tới ngành học của bạn">Không thuộc chuyên ngành</option>' +
                '<option value="1"  title="Chọn vào đây khi công việc của bạn thuộc chuyên ngành hoặc có liên quan tới ngành học của bạn">Thuộc hoặc có liên quan đến chuyên ngành đã học </option>' +
                '</select></div></div>';
            var HTMLstarted_date = '<div id="append_started_date"><label for="started_date" class="col-sm-2 control-label">Ngày bắt đầu làm việc</label>' +
                '<div class="col-sm-10">' +
                '<input type="date" class="form-control" name="started_date" id="started_date" value="{{date("Y-m-d")}}" required>' +
                '</div></div>';
            var HTMLended_date = '<div id="append_ended_date"><label for="ended_date" class="col-sm-2 control-label">Ngày kết thúc</label>' +
                '<div class="col-sm-10">' +
                '  <input type="date" class="form-control" name="ended_date" id="ended_date" value="{{date("Y-m-d")}}" required>' +
                '</div></div>';

            var HTMLcity_id_work = '<div id="append_city_select"><label for="city_id_work" class="col-sm-2 control-label">Tỉnh/Thành</label>'
            +'<div class="col-sm-10">' 
            +'<select class="form-control" name="city_id_work" id="city_id_work" style="width: 100%;" onchange="getDistrictWork()" required>' 
            +'<option value="" selected disabled hidden>Chọn tỉnh thành phố nơi bạn đang làm việc</option>' 
            +'@foreach ($cities as $city)' 
            +'<option value="{{ $city->id }}">{{ $city->city_name }}</option>' 
            +'@endforeach' 
            +'</select></div></div>';
            var HTMLdistrict_id_work = '<div id="append_district_select"><label for="district_id_work" class="col-sm-2 control-label">Quận/Huyện</label>' 
            +'<div class="col-sm-10">' 
            +'<select class="form-control" style="width: 100%;" name="district_id_work" id="district_id_work" onchange="getCompany()" required>' 
            +'<option value="" selected disabled hidden>Chọn quận huyện nơi bạn đang làm việc</option>' 
            +'</select></div>';
            var HTMLcompany_id = '<div id="append_company_id"><label for="company_id" class="col-sm-2 control-label">Công ty</label>' 
            +'<div class="col-sm-10">' 
            +'<select class="form-control" style="width: 100%;" name="company_id" id="company_id" onchange="appendCompanyName()" required>' 
            +'<option value="" selected disabled hidden>Chọn công ty nơi bạn đang làm việc</option>' 
            +'</select></div></div>';
            var HTMLposition = '<div id="append_position"><label for="position" class="col-sm-2 control-label">Vị trí công việc</label>' +
                '<div class="col-sm-10">' +
                '<input type="text" name="position" id="position" class="form-control" placeholder="Nhập vị trí công việc của bạn tại công ty" required>' +
                '</div></div>';
            var HTMLsalary = '<div id="append_salary_select"><label for="salary" class="col-sm-2 control-label">Thu nhập</label>' +
            '<div class="col-sm-10">' +
            '<select class="form-control" name="salary" id="salary" style="width: 100%;" required>' +
            '<option value="" selected disabled hidden>Chọn mức thu nhập</option>' +
            '<option value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>' +
            '<option value="Từ 5 triệu đồng đến 10 triệu đồng">Từ 5 triệu đồng đến 10 triệu đồng</option>' +
            '<option value="Trên 10 triệu đồng">Trên 10 triệu đồng</option>' +
            '</select></div></div>';    

            $("#append_belong_to_major").remove();
            $("#append_started_date").remove();
            $("#append_ended_date").remove();
            $("#div_belong_to_major").append(HTMLbelongsToMajor);

            if (selectVal == 1) {
                removeAppended();
                $("#div_started_date").append(HTMLstarted_date);
                $("#div_city_id_work").append(HTMLcity_id_work);
                $("#div_district_id_work").append(HTMLdistrict_id_work);
                $("#div_company_id").append(HTMLcompany_id);
                $("#div_position").append(HTMLposition);
                $("#div_salary").append(HTMLsalary);
            } else if (selectVal == 2) {
                removeAppended();
                $("#div_started_date").append(HTMLstarted_date);
                $("#div_city_id_work").append(HTMLcity_id_work);
                $("#div_district_id_work").append(HTMLdistrict_id_work);
                $("#div_company_id").append(HTMLcompany_id);
                $("#div_position").append(HTMLposition);
                $("#div_salary").append(HTMLsalary);
                $("#div_ended_date").append(HTMLended_date);
            }
        }

    }

    function work_status_flag1() {
        var selectVal = $('#work_status1').val();
        var HTMLended_date = '<div id="append_ended_date"><label class="control-label">Ngày kết thúc</label>' +
                '<input type="date" class="form-control" name="update_ended_date" value="{{date("Y-m-d")}}">' +
                '</div>';
            if (selectVal == 1) {
                $("#append_ended_date").remove();
            }
            else if (selectVal == 2) {
                removeAppended();
                $("#div_ended_date1").append(HTMLended_date);
            }
        }





    function appendCompanyName() {
        var selectValCompanyID = $('#company_id').val();
        if (selectValCompanyID == 'other') {
            var HTMLcompany_name = '<div id="append_company_name"><label class="col-sm-2 control-label">Tên công ty</label>' +
                '<div class="col-sm-10">' +
                '<input type="text" name="company_name" id="company_name" class="form-control" placeholder="Nhập tên công ty bạn muốn thêm" required>' +
                '</div></div>';
            var HTMLcompany_address = '<div id="append_company_address"><label for="company_address" class="col-sm-2 control-label">Địa chỉ công ty/chi nhánh</label>' +
                '<div class="col-sm-10">' +
                '<input type="text" name="company_address" id="company_address" class="form-control" placeholder="Nhập tên công ty/chi nhánh bạn muốn thêm" required>' +
                '</div></div>';
            $("#div_company_name").append(HTMLcompany_name);
            $("#div_company_address").append(HTMLcompany_address);
        } else {
            $("#append_company_name").remove();
            $("#append_company_address").remove();
        }

    }
</script>

@endsection