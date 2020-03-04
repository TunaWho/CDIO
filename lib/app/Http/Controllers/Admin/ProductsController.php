<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\product;
use App\Models\category;
use DB;
class ProductsController extends Controller
{
    public function getProduct()
    {
        $data['productList'] = DB::table('vp_sanpham')->join('vp_categories',
        'vp_sanpham.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('myBackend.product',$data);
    }
    public function getAddProduct()
    {
        $data['cateList'] = category::all();
        return view('myBackend.addproduct', $data);
    }
    public function postAddProduct(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $products = new product;
        $products->prod_name = $request->name;
        $products->prod_slug = str_slug($request->name);
        $products->prod_img = $filename;
        $products->prod_accessories = $request->accessories;
        $products->prod_price = $request->price;
        $products->prod_warranty = $request->warranty;
        $products->prod_promotion = $request->promotion;
        $products->prod_condition = $request->condition;
        $products->prod_status = $request->status;
        $products->prod_description = $request->description;
        $products->prod_cate = $request->cate;
        $products->prod_featured = $request->featured;
        if( $request->filled("description")){
            $products->save();
        }
        Else{
            return redirect()->back()->with('Warning', 'Mô tả không được để trống!');
        }
        $request->img->storeAs('Avatar',$filename);
        return redirect()->back()->withInput()->with('info','You have successfully added');
    }
    public function getEditProduct($id)
    {
        $data['editProduct'] = product::find($id);
        $data['cateList'] = category::all();
        return view('myBackend.editproduct',$data);
    }
    public function postEditProduct(Request $request, $id)
    {
        $products = new product;
        $data['prod_name'] = $request->name;
        $data['prod_slug'] = str_slug($request->name);
        $data['prod_accessories'] = $request->accessories;
        $data['prod_price'] = $request->price;
        $data['prod_warranty'] = $request->warranty;
        $data['prod_promotion'] = $request->promotion;
        $data['prod_condition'] = $request->condition;
        $data['prod_status'] = $request->status;
        $data['prod_description'] = $request->description;
        $data['prod_cate'] = $request->cate;
        $data['prod_featured'] = $request->featured;
        if($request->hasFile('img')){
            $image = $request->img->getClientOriginalName();
            $data['prod_img'] = $image;
            $request->img->storeAs('Avatar',$image);
        }
        $products::where('prod_id',$id)->update($data);
        return redirect()->route('product');
    }
    public function getDeleteProduct($id)
    {
        product::destroy($id);
        return back();
    }
}
