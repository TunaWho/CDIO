<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\AddCateRequests;
use App\Http\Requests\EditCateRequests;

class CategoryController extends Controller
{
    //
    public function getCate()
    {
        $data['categoryList'] = category::all(); 
        return view('myBackend.category', $data);
    }
    public function postCate(AddCateRequests $request)
    {
        $categoryz = new category;
        $categoryz->cate_name = $request->cateName;
        $categoryz->cate_slug = str_slug($request->cateName);
        $categoryz->save();
        return back();
    }
    public function getEditCate($id)
    {
        $data['category'] = category::find($id);
        return view('myBackend.editcategory',$data);
    }
    public function postEditCate(EditCateRequests $request,$id)
    {
        $categoryz = category::find($id);
        $categoryz->cate_name = $request->cateName;
        $categoryz->cate_slug = str_slug($request->cateName);
        $categoryz->save();
        return redirect()->route('cate');
    }
    public function getDeleteCate($id)
    {
        category::destroy($id);
        return back();
    }
}
