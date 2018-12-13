              <table id="current_work" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>MSSV</th>
                    <th>Họ và tên</th>
                    @foreach ($questions as $question)
                    <th>{{$question->question_content}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($users as $user) 
                        @if ($user->student == null)
                        @else
                            @foreach($user->student->homeroom_student->all() as $homeroom_student)
                                @if($homeroom_student->status == 'CG')
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->student->student_code}}</td>
                                    <td>{{$user->fullname}}</td>
                                    @foreach($user->student->survey->all() as $survey)
                                        @if($survey === null)
                                            <td></td>
                                        @else
                                            <td>{{$survey->answer}}</td>
                                        @endif
                                    @endforeach
                                </tr>
                                @endif
                            @endforeach
                        @endif    
                    @endforeach
                </tbody>
              </table>
