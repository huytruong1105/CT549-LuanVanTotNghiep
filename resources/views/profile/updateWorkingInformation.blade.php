              <div class="tab-pane" id="updateWorkingInformation">
                <form class="form-horizontal" method="POST" action="/workinginformation">
                  {{csrf_field()}}
                  <div class="form-group has-feedback">
                    <label for="work_status" class="col-sm-2 control-label">Tình trạng việc làm</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="work_status" id="work_status" style="width: 100%;" onchange="work_status_flag()" required>
                          <option value="" selected disabled hidden>Chọn tình hình công việc cần làm</option>
                          <option value="1" title="Chọn vào đây khi bạn muốn cập nhật công việc hiện tại của bạn">Công việc đang làm</option>
                          <option value="2" title="Chọn vào đây khi bạn muốn cập nhật công việc cũ của bạn">Công việc đã làm</option>
                      </select>
                    </div>
                  </div>
                                      
                  <div class="form-group has-feedback" id="div_belong_to_major">

                  </div>                            
                  <div class="form-group has-feedback" id="div_started_date" title="Ngày bắt đầu công việc mà bạn muốn cập nhật">
                    
                  </div>
                  <div class="form-group has-feedback"  id="div_ended_date" title="Ngày kết thúc công việc mà bạn muốn cập nhật, chỉ cập nhật được khi chọn vào Nghỉ việc/Đổi việc làm">
                   
                  </div>                                                                
                  <div class="form-group has-feedback" id="div_city_id_work">
                    
                  </div>
                  <div class="form-group has-feedback" id="div_district_id_work">
     
                  </div>
                  <div class="form-group has-feedback" id="div_company_id">

                  </div>
                  <div class="form-group has-feedback" id="div_company_name">
                    
                  </div>
                  <div class="form-group has-feedback" id="div_company_address">

                  </div>
                  <div class="form-group has-feedback" id="div_position">

                  </div>                                       
                  <div class="form-group has-feedback" id="div_salary">

                  </div>


                  <div class="form-group has-feedback">
                    <div class="col-sm-offset-5 col-sm-10">
                      <button type="submit" class="btn btn-primary">Đồng ý</button>
                    </div>
                  </div>
                </form>
              </div>