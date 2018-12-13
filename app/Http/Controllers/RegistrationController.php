<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Student;
use App\UserPermission;

class RegistrationController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
        return view('register.register');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [

        // ]);
        $this->validate($request,
        [   
            'student_code' => 'required',
            'password' => 'required|min:6|max:20',
            'password_confirmation' => 'required|same:password',
        ],
        [
            'student_code.required' => 'Mã số sinh viên không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu chỉ có tối đa 20 ký tự',
            'password_confirmation.required' => 'Nhập lại mật khẩu không được bỏ trống',
            'password_confirmation.same' => 'Mật khẩu và Nhập lại mật khẩu không giống nhau',
        ]);
        $checkStudent = new Student();
        $checkStudent = Student::where('student_code', $request->student_code)->first();
        if(!$checkStudent) {
            return redirect()->back()->with('status_error', 'Bạn không thuộc khoa Công Nghệ Thông Tin và Truyền Thông');
        }
        else {
            $count_status = 0;
            $homeroom_student = $checkStudent->homeroom_student()->get();
            foreach ($homeroom_student as $student_status){
                if (!empty($student_status->status)){
                    $count_status++;
                }

            }
            if ($count_status == 0){
                return redirect()->back()->with('status_error', 'Bạn chưa tốt nghiệp, không thể đăng ký tài khoản cựu sinh viên');
            }
            else if (empty($checkStudent->user()->first())){
                return redirect()->back()->with('status_error', 'Thông tin tài khoản không tồn tại trong hệ thống');
            }
            else if ($checkStudent->user()->first()->user_status == 1){
                return redirect()->back()->with('status_error', 'MSSV của bạn đã đăng ký tài khoản');
            }
        }
        $updateUser = $checkStudent->user()->first();
        $updateUser->password = Hash::make($request['password']);
        $updateUser->user_status = 1;
        $updateUser->save();

        $user_permission = new UserPermission();
        $user_permission->permission_id = 1;
        $updateUser->user_permission()->save($user_permission);
    return redirect('/dangnhap')->with('status_success', "Đăng ký thành công");
}

}
