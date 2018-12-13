@extends('layout')
@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <img src="{{URL::to('/')}}/image/logo.jpg">
    </div>
      </section>
        <div class="container">
            <div class="col-md-4">
                @include('dashboard.event')
            </div>
            <div class="col-md-4">
                @include('dashboard.post')
            </div>
            <div class="col-md-4">
                @include('dashboard.hrpost')
            </div>


        </div>
        @endsection
        @section('footer')
        <!-- jQuery 3 -->
        <script src="{{URL::to('/')}}/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{URL::to('/')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="{{URL::to('/')}}/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="{{URL::to('/')}}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{URL::to('/')}}/dist/js/demo.js"></script>
        @endsection
