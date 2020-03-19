<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\comment;
use App\Models\product;
use App\Models\users;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('myBackend.login');
    }
    public function getHome()
    {
        $data = ['count_prod' => product::count(), 'count_cate' => category::count(), 'count_comm' => comment::count(), 'count_user' => users::where('level', 0)->count()];
        return view('myBackend.index', $data);
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'E-mail can not be empty',
            'email.email' => 'E-mail does not valid',
            'password.required' => 'Password can not be empty',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1,
        ];
        if (Auth::attempt($data, $request->has('remember'))) {
            return redirect()->route('admin');
        } else {
            return redirect()->back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu chưa đúng');
        }
    }
    public function getAdRegister()
    {
        return view('myBackend.register');
    }
    public function postAdRegister(RegisterRequest $request)
    {
        $user = new users();
        $user->name = $request->fullname;
        $user->email = $request->mail;
        $user->password = bcrypt($request->pass);
        $user->level = 1;
        $user->save();
        return redirect()->route('login');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
