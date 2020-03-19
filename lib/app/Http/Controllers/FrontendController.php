<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\category;
use App\Models\comment;
use App\Models\product;
use App\Models\users;
use Auth;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function getHome()
    {
        $data['featured'] = product::where('prod_featured', 1)->orderBy('prod_id', 'desc')->take(8)->get();
        $data['news'] = product::orderBy('prod_id', 'desc')->take(8)->get();
        return view('myFrontend.home', $data);
    }
    public function getDetail($id)
    {
        $data['items'] = product::find($id);
        $data['comments'] = comment::where('com_product', $id)->get();
        return view('myFrontend.details', $data);
    }
    public function postComment(Request $request, $id)
    {
        $comment = new comment();
        $comment->com_email = $request->email;
        $comment->com_name = $request->name;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }
    public function getCategory($id)
    {
        $data['cateName'] = category::find($id);
        $data['products'] = product::where('prod_cate', $id)->orderBy('prod_id', 'desc')->paginate(8);
        return view('myFrontend.category', $data);
    }
    public function getSearch(Request $req)
    {
        $result = $req->result;
        $data['keyword'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] = product::where('prod_name', 'like', '%' . $result . '%')->take(12)->get();
        return view('myFrontend.search', $data);
    }
    public function postRegister(RegisterRequest $request)
    {
        $user = new users();
        $user->name = $request->fullname;
        $user->email = $request->mail;
        $user->password = bcrypt($request->pass);
        $user->level = 0;
        $user->save();
        $output["success"] = "Đăng ký thành công";
        return json_encode($output);
    }
    public function postFELogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0,
        ];
        if (Auth::attempt($data, $request->has('remember'))) {
            return response()->json(['success' => true]);
        } else {
            $output["error"] = "Tài khoản hoặc mật khẩu chưa đúng";
            return json_encode($output);
        }
    }
    public function getFELogin()
    {
        return redirect()->route('home');
    }
    public function getFELogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
