function removeAppended() {
    $("#append_started_date").remove();
    $("#append_ended_date").remove();
    $("#append_city_select").remove();
    $("#append_district_select").remove();
    $("#append_company_id").remove();
    $("#append_company_name").remove();
    $("#append_company_address").remove();
    $("#append_salary_select").remove();
}

var flag = 0;

function work_status_flag() {
    var selectVal = $('#work_status').val();
    if (selectVal == 0) {
        $("#append_belong_to_major").remove();
    } else {
        var HTMLbelongsToMajor = '<div id="append_belong_to_major"><label for="belong_to_major" class="col-sm-2 control-label">Thuộc chuyên ngành</label>' +
            '<div class="col-sm-10"><select class="form-control" name="belong_to_major" id="belong_to_major" style="width: 100%;" onchange="showMoreWorkInformationField()">' +
            '<option value="0" selected title="Chọn vào đây khi công việc hiện tại của bạn không thuộc chuyên ngành hoặc không có liên quan tới ngành học của bạn">Không thuộc chuyên ngành</option>' +
            '<option value="1"  title="Chọn vào đây khi công việc hiện tại của bạn thuộc chuyên ngành hoặc có liên quan tới ngành học của bạn">Thuộc hoặc có liên quan đến chuyên ngành đã học </option>' +
            '</select></div></div>';
        $("#append_belong_to_major").remove();
        $("#div_belong_to_major").append(HTMLbelongsToMajor);
        if (selectVal == 1) {
            removeAppended();
            return flag = 1;
        } else if (selectVal == 2) {
            removeAppended();
            return flag = 2;
        }
    }

}


function showMoreWorkInformationField() {
    console.log(flag);
    var bltMajorVal = $('#belong_to_major').val();
    var HTMLbelongsToMajor = '<div id="append_belong_to_major"><label for="belong_to_major" class="col-sm-2 control-label">Thuộc chuyên ngành</label>' +
        '<div class="col-sm-10"><select class="form-control" name="belong_to_major" id="belong_to_major" style="width: 100%;" onchange="showMoreWorkInformationField()">' +
        '<option value="0" selected title="Chọn vào đây khi công việc hiện tại của bạn không thuộc chuyên ngành hoặc không có liên quan tới ngành học của bạn">Không thuộc chuyên ngành</option>' +
        '<option value="1"  title="Chọn vào đây khi công việc hiện tại của bạn thuộc chuyên ngành hoặc có liên quan tới ngành học của bạn">Thuộc hoặc có liên quan đến chuyên ngành đã học </option>' +
        '</select></div></div>';
    var HTMLstarted_date = '<div id="append_started_date"><label for="started_date" class="col-sm-2 control-label">Ngày bắt đầu làm việc</label>' +
        '<div class="col-sm-10">' +
        '<input type="date" class="form-control" name="started_date" id="started_date" value="{{date("Y-m-d")}}">' +
        '</div></div>';
    var HTMLended_date = '<div id="append_ended_date"><label for="ended_date" class="col-sm-2 control-label">Ngày kết thúc</label>' +
        '<div class="col-sm-10">' +
        '  <input type="date" class="form-control" name="ended_date" id="ended_date" value="{{date("Y-m-d")}}">' +
        '</div></div>';
    var HTMLcity_id_work = '<div id="append_city_select"><label for="city_id_work" class="col-sm-2 control-label">Tỉnh/Thành</label>'
        +'<div class="col-sm-10">' 
        +'<select class="form-control" name="city_id_work" id="city_id_work" style="width: 100%;" onchange="getDistrictWork()">' 
        +'<option value="" selected disabled hidden>Chọn tỉnh thành phố nơi bạn đang làm việc</option>' 
        +'@foreach ($cities as $city)' 
        +'<option value="{{ $city->id }}">{{ $city->city_name }}</option>' 
        +'@endforeach' 
        +'</select></div></div>';
    var HTMLdistrict_id_work = '<div id="append_district_select"><label for="district_id_work" class="col-sm-2 control-label">Quận/Huyện</label>' 
        +'<div class="col-sm-10">' 
        +'<select class="form-control" style="width: 100%;" name="district_id_work" id="district_id_work" onchange="getCompany()">' 
        +'<option value="" selected disabled hidden>Chọn quận huyện nơi bạn đang làm việc</option>' 
        +'</select></div>';
    var HTMLcompany_id = '<div id="append_company_id"><label for="company_id" class="col-sm-2 control-label">Công ty</label>' 
        +'<div class="col-sm-10">' 
        +'<select class="form-control" style="width: 100%;" name="company_id" id="company_id" onchange="appendCompanyName()">' 
        +'<option value="" selected disabled hidden>Chọn công ty nơi bạn đang làm việc</option>' 
        +'</select></div></div>';
    var HTMLsalary = '<div id="append_salary_select"><label for="salary" class="col-sm-2 control-label">Thu nhập</label>' +
        '<div class="col-sm-10">' +
        '<select class="form-control" name="salary" id="salary" style="width: 100%;">' +
        '<option value="" selected disabled hidden>Chọn mức thu nhập hiện tại</option>' +
        '<option value="Dưới 5 triệu đồng">Dưới 5 triệu đồng</option>' +
        '<option value="Từ 5 triệu đến 10 triệu đồng">Từ 5 triệu đến 10 triệu đồng</option>' +
        '<option value="Từ 10 triệu đồng đến 15 triệu đồng">Từ 10 triệu đồng đến 15 triệu đồng</option>' +
        '<option value="Từ 15 triệu đồng đến 20 triệu đồng">Từ 15 triệu đồng đến 20 triệu đồng</option>' +
        '<option value="Trên 20 triệu đồng">Trên 20 triệu đồng</option>' +
        '</select></div></div>';

    if (bltMajorVal == 1) {
        if (flag == 1) {
            removeAppended();
            $("#div_started_date").append(HTMLstarted_date);
            $("#div_city_id_work").append(HTMLcity_id_work);
            $("#div_district_id_work").append(HTMLdistrict_id_work);
            $("#div_company_id").append(HTMLcompany_id);
            $("#div_salary").append(HTMLsalary);
        } else if (flag == 2) {
            removeAppended();
            $("#div_started_date").append(HTMLstarted_date);
            $("#div_ended_date").append(HTMLended_date);
            $("#div_city_id_work").append(HTMLcity_id_work);
            $("#div_district_id_work").append(HTMLdistrict_id_work);
            $("#div_company_id").append(HTMLcompany_id);
            $("#div_salary").append(HTMLsalary);

        }
    } else if (bltMajorVal == 0) {
        removeAppended();
    }
}


function appendCompanyName() {
    var selectValCompanyID = $('#company_id').val();
    if (selectValCompanyID == 'other') {
        var HTMLcompany_name = '<div id="append_company_name"><label class="col-sm-2 control-label">Tên công ty</label>' +
            '<div class="col-sm-10">' +
            '<input type="text" name="company_name" id="company_name" class="form-control" placeholder="Nhập tên công ty bạn muốn thêm">' +
            '</div></div>';
        var HTMLcompany_address = '<div id="append_company_address"><label for="company_address" class="col-sm-2 control-label">Địa chỉ công ty/chi nhánh</label>' +
            '<div class="col-sm-10">' +
            '<input type="text" name="company_address" id="company_address" class="form-control" placeholder="Nhập tên công ty/chi nhánh bạn muốn thêm">' +
            '</div></div>';
        $("#div_company_name").append(HTMLcompany_name);
        $("#div_company_address").append(HTMLcompany_address);
    } else {
        $("#append_company_name").remove();
        $("#append_company_address").remove();
    }

}