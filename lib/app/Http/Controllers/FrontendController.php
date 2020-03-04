<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\comment;
class FrontendController extends Controller
{
    public function getHome()
    {
        $data['featured'] = product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        $data['news'] = product::orderBy('prod_id','desc')->take(8)->get();
        return view('myFrontend.home',$data);
    }
    public function getDetail($id)
    {
        $data['items'] = product::find($id);
        $data['comments'] = comment::where('com_product',$id)->get();
        return view('myFrontend.details',$data);
    }
    public function postComment(Request $request,$id)
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
        $data['products'] = product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        return view('myFrontend.category',$data);
    }
    public function getSearch(Request $req)
    {
        $result = $req->result;
        $data['keyword'] = $result;
        $result = str_replace(' ','%',$result);
        $data['items'] = product::where('prod_name','like','%'.$result.'%')->take(12)->get();
        return view('myFrontend.search',$data);
    }
}
