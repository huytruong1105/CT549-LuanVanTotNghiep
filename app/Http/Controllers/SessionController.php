<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class SessionController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['except' => ['destroy']]);
    }
    public function index()
    {

        return view('login.login');
    }


    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
           ],
           [
           'username.required' => 'Vui lòng nhập vào tên tài khoản.',            
           'password.required' => 'Vui lòng nhập vào mật khẩu.',
           ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if (Auth::user()->student === null) {
                auth()->logout();
                return back()->with('status_error', 'Tài khoản của bạn không thể đăng nhập vào trang này');
            }
            return redirect('/trangchu');
        }
        else return back()->with('status_error', 'Thông tin tài khoản không chính xác vui lòng kiểm tra lại');
    }
    // public function store(Request $request)
    // {
    //     //
    //     if(!auth()->attempt(request(['username', 'password']))){
    //         return back();
    //     }
    //     return redirect('/');
    // }
    public function destroy(){
        auth()->logout();
        return redirect('/dangnhap')->with('status_success', 'Đăng xuất thành công');
    }
    
}
