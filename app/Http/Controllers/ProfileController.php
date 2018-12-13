<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\District;
use Illuminate\Support\Facades\Auth;
use App\User;
use Image;
use App\WorkingInformation;
use App\Company;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $districts = District::all();
        return view('profile.profile', compact('cities', 'districts'));
    }


    public function workinginformation(Request $request){
        $user = Auth::user();
        $workInfo = new WorkingInformation();
        $workInfo->student_id = $user->student->id;
        $workInfo->work_status = $request->work_status;
        $workInfo->postgraduate_education = $request->postgraduate_education;        
        if ($request->work_status == 1){
            $workInfo->belong_to_major = $request->belong_to_major;
                $workInfo->started_date = $request->started_date;
                if ($request->company_id == "other"){
                    $company = new Company();
                    $company->company_name = $request->company_name;
                    $company->district_id = $request->district_id_work;
                    $company->company_address = $request->company_address;
                    $company->save();
                    $workInfo->position = $request->position;
                    $workInfo->salary = $request->salary;
                    $company->work_informations()->save($workInfo);
                }
                else{
                    $workInfo->company_id = $request->company_id;
                    $workInfo->position = $request->position;                    
                    $workInfo->salary = $request->salary;
                    $workInfo->save();                    
                }
        }
        else if ($request->work_status == 2){
            $workInfo->belong_to_major = $request->belong_to_major;
                if ($request->started_date > $request->ended_date){
                    return redirect('/thongtincanhan')->with('status_error', 'Ngày kết thúc không được sau ngày bắt đầu'); 
                }
                $workInfo->started_date = $request->started_date;
                $workInfo->ended_date = $request->ended_date;
                if ($request->company_id == "other"){
                    $company = new Company();
                    $company->company_name = $request->company_name;
                    $company->district_id = $request->district_id_work;
                    $company->company_address = $request->company_address;
                    $company->save();
                    $workInfo->position = $request->position;
                    $workInfo->salary = $request->salary;
                    $company->work_informations()->save($workInfo);
                }
                else{
                    $workInfo->company_id = $request->company_id;
                    $workInfo->position = $request->position;                    
                    $workInfo->salary = $request->salary;
                    $workInfo->save();                    
                }
        }
        return redirect('/thongtincanhan')->with('status_success', 'Thêm mới thông tin thành công');
    }
    public function update_workinginformation(Request $request, $id){
        $user = Auth::user();
        $workInfo = WorkingInformation::find($id);
        $workInfo->work_status = $request->update_work_status;
        if ($request->update_work_status == 1){
            $workInfo->belong_to_major = $request->update_belong_to_major;
            $workInfo->started_date = $request->update_started_date;
            $workInfo->position = $request->update_position;                    
            $workInfo->salary = $request->update_salary;
            $workInfo->save();                    
            }
        else if ($request->update_work_status == 2){
            if ($request->ended_date == null){
                $workInfo->ended_date = now()->format('Y-m-d'); 
            }
            else {
                $workInfo->ended_date = $request->update_ended_date;
            }
            $workInfo->belong_to_major = $request->update_belong_to_major;
            $workInfo->started_date = $request->update_started_date;
            $workInfo->position = $request->update_position;                    
            $workInfo->salary = $request->update_salary;
            $workInfo->save();        

        }
        return redirect('/thongtincanhan')->with('status_success', 'Cập nhật thông tin thành công');
    }

    public function delete_workinginformation($id){
        $workInfo = WorkingInformation::find($id);
        $workInfo->delete();
        return redirect('/thongtincanhan')->with('status_success', 'Xóa thông tin thành công');

    }

}
