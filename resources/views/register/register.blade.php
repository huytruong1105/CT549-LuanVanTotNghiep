<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{URL::to('/')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('/')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::to('/')}}/bower_components/Ionicons/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::to('/')}}/css/AdminLTE.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL::to('/')}}/bower_components/select2/dist/css/select2.min.css">  

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{URL::to('/')}}/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <script type="text/javascript">
    
    </script>

    <style>
        label{
            font-weight: 600;
        }

    </style>

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="http://cit.ctu.edu.vn/"><b>Khoa Công nghệ thông tin và truyền thông</b></a>
        </div>

        <div class="register-box-body">
            <h2 class="login-box-msg"><b>Đăng ký tài khoản</b></h2>
            <form method="POST" action="/dangky">
            {{ csrf_field() }}
                @if (session('status_error'))
                <div class="alert alert-danger">
                    {{ session('status_error') }}
                </div>
                @endif

                            <div class="form-group has-feedback">
                                    <label>MSSV</label>
                                    @if($errors->has('student_code'))
                                    <div class="alert-danger alert">
                                        <p>{{ $errors->first('student_code')}} </p>
                                    </div>
                                    @endif    
                                    <input type="text" name="student_code" class="form-control" placeholder="Mã số sinh viên">
                            </div>

                            <div class="form-group has-feedback">
                                    <label>Mật khẩu</label>
                                    @if($errors->has('password'))
                                    <div class="alert-danger alert">
                                        <p>{{ $errors->first('password')}} </p>
                                    </div>
                                    @endif  
                                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            </div>

                            <div class="form-group has-feedback">
                                    <label>Nhập lại mật khẩu</label>
                                    @if($errors->has('password_confirmation'))
                                    <div class="alert-danger alert">
                                        <p>{{ $errors->first('password_confirmation')}} </p>
                                    </div>
                                    @endif  
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Mật khẩu">
                            </div>


                            <!-- <div class="form-group">
                                <a href="#survey" class="btn btn-primary btn-block btn-flat" data-toggle="tab">Kế tiếp</a>

                            </div> -->              
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
                    <!-- /.col -->
                </div> 
            </form>
            <a href="/dangnhap" class="text-center">Đã đăng ký thông tin?.</a>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
    <!-- jQuery 3 -->
    <script src="{{URL::to('/')}}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{URL::to('/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="{{URL::to('/')}}/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::to('/')}}/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{URL::to('/')}}/js/demo.js"></script>

</body>


</html>