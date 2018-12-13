@extends('layout')
@section('content')
<section class="content">
    <div class='row'>
        <div class='box box-default'>
            <div class='col-md-3'>
            </div>
            @foreach (Auth::user()->student->homeroom_student->all() as $homeroom_student)
                @if ($homeroom_student->status == 'CG')
                <div class='col-md-6 login-box-body'>
                    <div class="box-body">
                        <h2 class='login-box-msg'><b>Khảo sát thông tin tốt nghiệp</b></h2>
                        <h3 class='login-box-msg'><b>{{$survey->session_name}}</b></h3>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if(!empty(Auth::user()->student->survey->all()))
                        <form action="/capnhatkhaosat/{{Auth::user()->student->id}}" method="POST">
                                {{method_field('PATCH')}}
                                {{ csrf_field() }}
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($questions as $question)
                                @php
                                $i++;
                                @endphp
                                <div class="form-group has-feedback">
                                    <label>{{$question->question_content}}</label>
                                    <input type="hidden" name="survey_{{$i}}" class="form-control" value="{{Auth::user()->student->survey->where('question_id', $question->id)->first()->id}}">                                    
                                    @if($question->question_type == 0)
                                        @if(Auth::user()->student->survey->where('question_id', $question->id)->first()->answer === 0)
                                            <input type ="text" name="answer_{{$i}}" class="form-control" placeholder="Không có câu trả lời">
                                        @else
                                            <input type ="text" name="answer_{{$i}}" class="form-control" value="{{Auth::user()->student->survey->where('question_id', $question->id)->first()->answer}}">
                                        @endif                              
                                    @elseif ($question->question_type == 1)
                                    <select class="form-control" style="width: 100%;" name="answer_{{$i}}">
                                        <option value='0'> Không có câu trả lời</option>
                                        @foreach ($question->answer_sample->all() as $answer_sample)
                                            @if (Auth::user()->student->survey->where('question_id', $question->id)->first()->answer == $answer_sample->content)
                                            <option value='{{ $answer_sample->content }}' selected>{{ $answer_sample->content }}</option>
                                            @else
                                            <option value='{{ $answer_sample->content }}'>{{ $answer_sample->content }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                @endforeach   
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sửa</button>
                                </div> 
                            </form>
                        @else
                            <form method="POST" action="/khaosat">
                                {{ csrf_field() }}
                                <input type="hidden" name="student_id" value="{{Auth::user()->student->id}}">
                                @foreach ($questions as $question)
                                <div class="form-group has-feedback">
                                    <label>{{$question->question_content}}</label>
                                    <input type="hidden" name="question_id_{{$question->id}}" class="form-control" value="{{$question->id}}">                                    
                                    @if($question->question_type == 0)                              
                                        <input type ="text" name="answer_{{$question->id}}" class="form-control" value="">
                                    @elseif ($question->question_type == 1)
                                    <select class="form-control" style="width: 100%;" name="answer_{{$question->id}}">
                                        <option value="" selected disabled hidden>Chọn câu trả lời của bạn</option>
                                        @foreach ($question->answer_sample->all() as $answer_sample)
                                            <option value='{{ $answer_sample->content }}'>{{ $answer_sample->content }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                @endforeach   
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Xác nhận</button>
                                </div> 
                            </form>
                        @endif
                    </div>
                </div>
                @else
                <div class='col-md-6 login-box-body'>
                    <div class="box-body">
                        <h2 class='login-box-msg'><b>Khảo sát thông tin tốt nghiệp</b></h2>
                        <div class="alert alert-danger">
                            <p>Bạn không thuộc đợt khảo sát!</p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <div class='col-md-3'>
            </div>
        </div>      
    </div>
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
        <script src="{{URL::to('/')}}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{URL::to('/')}}/dist/js/demo.js"></script>

@endsection
