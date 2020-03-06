<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\comment;
use App\Models\users;
use App\Http\Requests\RegisterRequest;
use Auth;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('myBackend.login');
    }
    public function getHome()
    {
        $data = ['count_prod' => product::count(),'count_cate' => category::count(),'count_comm' => comment::count(),'count_user' => users::where('level',0)->count()];
        return view('myBackend.index', $data);
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'E-mail can not be empty',
            'email.email' => 'E-mail does not valid',
            'password.required' => 'Password can not be empty',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1
        ];
        $data2 = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        if(Auth::attempt($data,$request->has('remember'))){
            return redirect()->route('admin');
        }else if(Auth::attempt($data2,$request->has('remember'))){
            return redirect()->route('home');
        }else {return redirect()->back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa đúng');}
    }
    public function getRegister()
    {
        return view('myBackend.register');
    }
    public function postRegister(RegisterRequest $request)
    {
        $user = new users();
        $user->name = $request->fullname;
        $user->email = $request->mail;
        $user->password = bcrypt($request->pass);
        $user->level = 0;
        $user->save();
        return redirect()->route('login');
    }
    public function getLogout()
    {
        if(Auth::user()->level == 1){
        Auth::logout();
        return redirect()->route('login');
        }else {Auth::logout();
            return redirect()->back();}
    }
}
