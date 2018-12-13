<div class="tab-pane" id="workingtimeline">
    <!-- The timeline -->
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tình trạng việc làm hiện tại</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="current_work" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên công ty</th>
                  <th>Địa chỉ công ty</th>
                  <th>Vị trí hiện tại</th>
                  <th>Ngày bắt đầu</th>
                  <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @if(Auth::user()->student->working_information->where('work_status', 1)->all())
                      @php
                        $i = 1;
                        $current_works = Auth::user()->student->working_information->where('work_status', 1)->sortByDesc('started_date');
                      @endphp
                      @foreach($current_works as $current_work)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$current_work->company->company_name}}</td>
                        <td>{{$current_work->company->company_address}} - {{$current_work->company->district->city->city_name}} - {{$current_work->company->district->district_name}}</td>
                        <td>{{$current_work->position}}</td>
                        <td>{{date_format($current_work->started_date,"d-m-Y")}}</td>
                        <td>
                            <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$current_work->id}}"><span class="fa fa-info-circle"></span></a>
                            <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#sua_{{$current_work->id}}"><span class="fa fa-edit"></span></a> 
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#xoa_{{$current_work->id}}"><span class="fa fa-times"></span></a>
                        </td>                      
                        <div class="modal fade" id="{{$current_work->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Thông tin chi tiết việc làm hiện tại</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                      <div class="form-group has-feedback">
                                        <label>Công việc thuộc chuyên ngành</label>
                                        @if ($current_work->belong_to_major == 1)
                                          <input type="text" class="form-control" value="Thuộc vào chuyên ngành" disabled>
                                        @else
                                          <input type="text" class="form-control" value="Không thuộc chuyên ngành" disabled>
                                        @endif
                                        
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" value="{{$current_work->company->company_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" value="{{$current_work->company->company_address}} - {{$current_work->company->district->city->city_name}} - {{$current_work->company->district->district_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Vị trí công việc</label>
                                        <input type="text" class="form-control" value="{{$current_work->position}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Mức lương</label>
                                        <input type="text" class="form-control" value="{{$current_work->salary}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Ngày bắt đầu</label>
                                        <input type="text" class="form-control" value='{{date_format($current_work->started_date,"d-m-Y")}}' disabled>
                                      </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="sua_{{$current_work->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Sửa thông tin việc làm hiện tại</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="/capnhatthongtinvieclam/{{$current_work->id}}" method="POST">
                                    {{csrf_field()}}
                                      <div class="form-group has-feedback">
                                        <label for="update_work_status" class="control-label">Tình trạng việc làm</label>
                                        <div>
                                          <select class="form-control" name="update_work_status" id="work_status1" style="width: 100%;">
                                              @if ($current_work->work_status == 1)
                                                <option value="1" selected title="Chọn vào đây khi bạn muốn cập nhật công việc hiện tại của bạn">Công việc đang làm</option>
                                                <option value="2" title="Chọn vào đây khi bạn muốn cập nhật công việc cũ của bạn">Công việc đã làm</option>
                                              @else
                                                <option value="1" title="Chọn vào đây khi bạn muốn cập nhật công việc hiện tại của bạn">Công việc đang làm</option>  
                                                <option value="2" selected title="Chọn vào đây khi bạn muốn cập nhật công việc cũ của bạn">Công việc đã làm</option>
                                              @endif
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label for="update_belong_to_major" class=" control-label">Thuộc chuyên ngành</label>
                                        <div>
                                          <select class="form-control" name="update_belong_to_major" style="width: 100%;">
                                            @if ($current_work->belong_to_major == 0)
                                            <option value="0" selected title="Chọn vào đây khi công việc hiện tại của bạn không thuộc chuyên ngành hoặc không có liên quan tới ngành học của bạn">Không thuộc chuyên ngành</option>
                                            @else
                                            <option value="1" selected title="Chọn vào đây khi công việc hiện tại của bạn thuộc chuyên ngành hoặc có liên quan tới ngành học của bạn">Thuộc hoặc có liên quan đến chuyên ngành đã học </option>
                                            @endif
                                          </select>
                                        </div>
                                      </div>                            
                                      <div class="form-group has-feedback" title="Ngày bắt đầu công việc mà bạn muốn cập nhật">
                                        <label for="update_started_date" class=" control-label">Ngày bắt đầu làm việc</label>
                                        <div>
                                          <input type="date" class="form-control" name="update_started_date" value='{{date_format($current_work->started_date,"Y-m-d")}}'>
                                        </div>
                                      </div>
                                      <!-- <div class="form-group has-feedback"  id="div_ended_date1" title="Ngày kết thúc công việc mà bạn muốn cập nhật, chỉ cập nhật được khi chọn vào Nghỉ việc/Đổi việc làm">
                                      
                                      </div>                                                                 -->
                                      <div class="form-group has-feedback">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" value="{{$current_work->company->company_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" value="{{$current_work->company->company_address}} - {{$current_work->company->district->city->city_name}} - {{$current_work->company->district->district_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Vị trí công việc</label>
                                        <input type="text" name="update_position" class="form-control" value="{{$current_work->position}}">
                                      </div>
                                      <label for="salary" class=" control-label">Thu nhập</label>
                                      <div>
                                        <select class="form-control" name="update_salary" id="salary" style="width: 100%;">
                                          @if ($current_work->salary == "Dưới 5 triệu đồng")
                                            <option selected value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>
                                            <option value="Từ 5 triệu đồng đến 10 triệu đồng">Từ 5 triệu đồng đến 10 triệu đồng</option>
                                            <option value="Trên 10 triệu đồng">Trên 10 triệu đồng</option>
                                          @elseif ($current_work->salary == "Từ 5 triệu đồng đến 10 triệu đồng")
                                            <option value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>
                                            <option selected value="Từ 5 triệu đồng đến 10 triệu đồng">Từ 5 triệu đồng đến 10 triệu đồng</option>
                                            <option value="Trên 10 triệu đồng">Trên 10 triệu đồng</option>
                                          @else
                                            <option value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>
                                            <option value="Từ 5 triệu đồng đến 10 triệu đồng">Từ 5 triệu đồng đến 10 triệu đồng</option>
                                            <option selected value="Trên 10 triệu đồng">Trên 10 triệu đồng</option>
                                          @endif
                                        </select>
                                      </div>                            
                                      <div class="form-group">
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Cập nhật</button>
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="xoa_{{$current_work->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Xóa thông tin việc làm hiện tại</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="/xoathongtinvieclam/{{$current_work->id}}" method="POST">
                                    {{csrf_field()}}
                                    <p>{{$current_work->company->company_name}}</p>
                                    <p>{{$current_work->company->company_address}} - {{$current_work->company->district->city->city_name}} - {{$current_work->company->district->district_name}}</p>
                                    <p>Bạn có muốn xóa thông tin việc làm hiện tại?</p>
                                    <div class="form-group">
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Đồng ý</button>
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                          <!-- /.modal-dialog -->
                        </div>
                          <!-- /.modal -->
                      </tr>
                      @endforeach
                    @else

                    @endif  
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Các công việc đã làm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="past_work" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên công ty</th>
                  <th>Địa chỉ công ty</th>
                  <th>Vị trí hiện tại</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @if(Auth::user()->student->working_information->where('work_status', 2)->all())
                      @php
                        $i = 1;
                        $already_works = Auth::user()->student->working_information->where('work_status', 2)->sortByDesc('started_date');
                      @endphp
                      @foreach($already_works as $already_work)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$already_work->company->company_name}}</td>
                        <td>{{$already_work->company->company_address}} - {{$already_work->company->district->city->city_name}} - {{$already_work->company->district->district_name}}</td>
                        <td>{{$already_work->position}}</td>
                        <td>{{date_format($already_work->started_date,"d-m-Y")}}</td>
                        <td>{{date_format($already_work->ended_date,"d-m-Y")}}</td>
                        <td>
               
                          <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$already_work->id}}"> <span class="fa fa-info-circle"></span></a>
                          <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#sua_{{$already_work->id}}"><span class="fa fa-edit"></span></a>  
                          <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#xoa_{{$already_work->id}}"><span class="fa fa-times"></span></a>

                        </td>
                        <div class="modal fade" id="{{$already_work->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Thông tin chi tiết việc làm hiện tại</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                      <div class="form-group has-feedback">
                                        <label>Công việc thuộc chuyên ngành</label>
                                        @if ($already_work->belong_to_major == 1)
                                          <input type="text" class="form-control" value="Thuộc vào chuyên ngành" disabled>
                                        @else
                                          <input type="text" class="form-control" value="Không thuộc chuyên ngành" disabled>
                                        @endif
                                        
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" value="{{$already_work->company->company_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" value="{{$already_work->company->company_address}} - {{$already_work->company->district->city->city_name}} - {{$already_work->company->district->district_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Vị trí công việc</label>
                                        <input type="text" class="form-control" value="{{$already_work->position}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Mức lương</label>
                                        <input type="text" class="form-control" value="{{$already_work->salary}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Ngày bắt đầu</label>
                                        <input type="text" class="form-control" value='{{date_format($already_work->started_date,"d-m-Y")}}' disabled>
                                      </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="sua_{{$already_work->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Sửa thông tin việc làm hiện tại</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="/capnhatthongtinvieclam/{{$already_work->id}}" method="POST">
                                    {{csrf_field()}}
                                      <div class="form-group has-feedback">
                                        <label for="update_work_status" class="control-label">Tình trạng việc làm</label>
                                        <div>
                                          <select class="form-control" name="update_work_status" id="work_status1" style="width: 100%;">
                                                <option value="2" selected title="Chọn vào đây khi bạn muốn cập nhật công việc cũ của bạn">Công việc đã làm</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label for="update_belong_to_major" class=" control-label">Thuộc chuyên ngành</label>
                                        <div>
                                          <select class="form-control" name="update_belong_to_major" style="width: 100%;">
                                            @if ($already_work->belong_to_major == 0)
                                            <option value="0" selected title="Chọn vào đây khi công việc hiện tại của bạn không thuộc chuyên ngành hoặc không có liên quan tới ngành học của bạn">Không thuộc chuyên ngành</option>
                                            @else
                                            <option value="1" selected title="Chọn vào đây khi công việc hiện tại của bạn thuộc chuyên ngành hoặc có liên quan tới ngành học của bạn">Thuộc hoặc có liên quan đến chuyên ngành đã học </option>
                                            @endif
                                          </select>
                                        </div>
                                      </div>                            
                                      <div class="form-group has-feedback" title="Ngày bắt đầu công việc mà bạn muốn cập nhật">
                                        <label for="update_started_date" class=" control-label">Ngày bắt đầu làm việc</label>
                                        <div>
                                          <input type="date" class="form-control" name="update_started_date" value='{{date_format($already_work->started_date,"Y-m-d")}}'>
                                        </div>
                                      </div>
                                      <div class="form-group has-feedback" title="Ngày kết thúc công việc mà bạn muốn cập nhật, chỉ cập nhật được khi chọn vào Nghỉ việc/Đổi việc làm">
                                        <label class="control-label">Ngày kết thúc</label>
                                        <input type="date" class="form-control" name="update_ended_date" value='{{date_format($already_work->ended_date,"Y-m-d")}}'>
                                      </div>                                                                
                                      <div class="form-group has-feedback">
                                        <label>Tên công ty</label>
                                        <input type="text" class="form-control" value="{{$already_work->company->company_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Địa chỉ công ty</label>
                                        <input type="text" class="form-control" value="{{$already_work->company->company_address}} - {{$already_work->company->district->city->city_name}} - {{$already_work->company->district->district_name}}" disabled>
                                      </div>
                                      <div class="form-group has-feedback">
                                        <label>Vị trí công việc</label>
                                        <input type="text" name="update_position" class="form-control" value="{{$already_work->position}}">
                                      </div>
                                      <label for="salary" class=" control-label">Thu nhập</label>
                                      <div>
                                        <select class="form-control" name="update_salary" id="salary" style="width: 100%;">
                                          @if ($already_work->salary == "Dưới 5 triệu đồng")
                                            <option selected value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>
                                            <option value="Từ 5 triệu đồng đến 10 triệu đồng">Từ 5 triệu đồng đến 10 triệu đồng</option>
                                            <option value="Trên 10 triệu đồng">Trên 10 triệu đồng</option>
                                          @elseif ($already_work->salary == "Từ 5 triệu đồng đến 10 triệu đồng")
                                            <option value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>
                                            <option selected value="Từ 5 triệu đồng đến 10 triệu đồng">Từ 5 triệu đồng đến 10 triệu đồng</option>
                                            <option value="Trên 10 triệu đồng">Trên 10 triệu đồng</option>
                                          @else
                                            <option value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>
                                            <option value="Từ 5 triệu đồng đến 10 triệu đồng">Từ 5 triệu đồng đến 10 triệu đồng</option>
                                            <option selected value="Trên 10 triệu đồng">Trên 10 triệu đồng</option>
                                          @endif
                                        </select>
                                      </div>                            
                                      <div class="form-group">
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Cập nhật</button>
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="xoa_{{$already_work->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Xóa thông tin việc làm hiện tại</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="/xoathongtinvieclam/{{$already_work->id}}" method="POST">
                                    {{csrf_field()}}
                                    <p>{{$already_work->company->company_name}}</p>
                                    <p>{{$already_work->company->company_address}} - {{$already_work->company->district->city->city_name}} - {{$already_work->company->district->district_name}}</p>
                                    <p>Bạn có muốn xóa thông tin việc làm hiện tại?</p>
                                    <div class="form-group">
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Đồng ý</button>
                                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                          <!-- /.modal-dialog -->
                        </div>
                      </tr>
                      @endforeach
                    @else
                    @endif 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
    </div>
</div>