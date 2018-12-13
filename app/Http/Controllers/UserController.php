<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Image;
use App\WorkingInformation;
use App\Company;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserContact(Request $request, $id)
    {
        $user = User::find($id);    
        if($user->family_phone != $request->family_phone) {
            $this->validate($request, [
             'family_phone' => 'required|max:10',
            ],
            [
              'family_phone.required' => 'Vui lòng nhập vào số điện thoại gia đình. ',
              'family_phone.max' => 'Số điện thoại tối đa chỉ 10 ký tự.',
            ]);
        }
        if($user->personal_phone != $request->personal_phone) {
            $this->validate($request, [
             'personal_phone' => 'required|max:10',
            ],
            [
            'personal_phone.required' => 'Vui lòng nhập vào số điện cá nhân.',            
            'personal_phone.max' => 'Số điện thoại tối đa chỉ 10 ký tự.',
            ]);
        }
        if($user->address != $request->address) {
            $this->validate($request, [
            'address' => 'required',
            ],
            [
             'address.required' => 'Vui lòng nhập địa chỉ hiện tại.',
            ]);
        }
        if($user->district_id != $request->district_id) {
            $this->validate($request, [
              'district_id' => 'required',
            ],
            [
            'district_id.required' => 'Vui lòng chọn quận huyện bạn đang sống.',
            ]);
        }
        if($user->email != $request->email) {
            $this->validate($request, [
            'email' => 'required|email|unique:users,email'
            ],
            [
            'email.required' => 'Vui lòng nhập địa chỉ email bạn đang sử dụng.',
            'email.email' => 'Vui lòng nhập địa chỉ email đúng định dạng.',
            'email.unique' => 'Địa chỉ email bạn nhập đã bị trùng vui lòng nhập lại.',
            ]);
        }

        $user->family_phone = $request->family_phone;
        $user->personal_phone = $request->personal_phone;
        $user->current_address = $request->address;
        $user->district_id = $request->district_id;
        $user->email = $request->email;
        if($request->hasFile('user_avatar')){
            $avatar = $request->file('user_avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(129, 129)->save(public_path('/avatars/' . $fileName ) );
            $user->user_avatar = $fileName;
        }
        $user->save();
        return redirect('/thongtincanhan')->with('status_success', "Cập nhật thông tin thành công");
                  
    }
    public function workinginformation(Request $request){
        $user = Auth::user();
        $workInfo = new WorkingInformation();
        $workInfo->student_id = $user->student->id;
        $workInfo->work_status = $request->work_status;
        $workInfo->postgraduate_education = $request->postgraduate_education;        
        if ($request->work_status == 0) {
            $workInfo->save();
        }
        else if ($request->work_status == 1){
            $workInfo->belong_to_major = $request->belong_to_major;
            if($request->belong_to_major == 0){
                $workInfo->save();
            }
            else if ($request->belong_to_major == 1){
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
        }
        else if ($request->work_status == 2){
            $workInfo->belong_to_major = $request->belong_to_major;
            if($request->belong_to_major == 0){
                $workInfo->save();
            }
            else if ($request->belong_to_major == 1){
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
        }
        return redirect('/thongtincanhan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
