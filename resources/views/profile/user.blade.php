              <div class="active tab-pane" id="userinformation">
                <form class="form-horizontal" enctype="multipart/form-data" action="/updateUserContact/{{Auth::user()->id}}" method="POST">
                  {{method_field('PATCH')}}
                  {{csrf_field()}}

                  @if(count($errors)>0)
                  <div class="alert-danger alert">
                      @foreach($errors->all() as $err)
                        <p>{{$err}}</p>
                      @endforeach
                  </div>
                  @endif

                  <div class="form-group">
                    <label for="family_phone" class="col-sm-2 control-label">Số điện thoại gia đình</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="family_phone" value="{{Auth::user()->family_phone}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="personal_phone" class="col-sm-2 control-label">Số điện thoại cá nhân</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="personal_phone" value="{{Auth::user()->personal_phone}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Địa chỉ liên hệ</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" value="{{Auth::user()->current_address}}">
                    </div>
                  </div>                  
                 <div class="form-group">
                    <label for="city_id" class="col-sm-2 control-label">Tỉnh/Thành phố</label>
                    <div class='col-sm-10'>
                    	<select class="form-control" style="width: 100%;" name="city_id" id="city_id" onchange="getDistrict()">
                          @foreach ($cities as $city)
                            @if($city->id == Auth::user()->district->city_id)
                              <option value='{{ $city->id }}' selected>{{ $city->city_name }}</option>
                            @else
                                <option value='{{ $city->id }}'>{{ $city->city_name }}</option>
                            @endif
                          @endforeach
                    </select>
                    </div>
				          </div>
                  <div class="form-group">
                    <label for="district_id" class="col-sm-2 control-label">Quận Huyện</label>
                    <div class='col-sm-10'>
                      <select class="form-control" style="width: 100%;" name="district_id" id="district_id">

                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="user_avatar" class="col-sm-2 control-label">Ảnh đại diện</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="user_avatar" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="id" value="Auth::user()->id" >
                    </div>
                  </div>
                                         				       
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-10">
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                  </div>
                </form>
              </div>