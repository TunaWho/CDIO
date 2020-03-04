<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\product;
use Darryldecode\Cart\Cart as CartCart;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id)
    {
        $product = product::find($id);
        Cart::add($id, $product->prod_name, $product->prod_price, 1, ['img' => $product->prod_img]);
        return redirect()->route('cart_show');
    }
    public function getShowCart()
    {
        $data['items'] = Cart::getContent();
        $data['total'] = Cart::getTotal();
        return view('myFrontend.cart',$data);
    }
    public function getDeleteCart($id)
    {
        if($id == 'all'){
            Cart::clear();
        }else{
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->id, ['quantity'=> $request->qty]);
    }
    public function postSendEmail(Request $request)
    {
        $data['info'] = $request->all();
        $email = $request->email;
        $data['total'] = Cart::getTotal();
        $data['cart'] = Cart::getContent();
        Mail::send('myFrontend.email', $data, function ($message) use ($request, $email){
            $message->from('zanpro2013@gmail.com', 'haipro');
            $message->to($email, $email);
            $message->cc('zhaipro2013@gmail.com', 'An pro');
            $message->subject('Xác nhận hóa đơn mua hàng tù haipro shop');
        });
        Cart::clear();
        return redirect()->route('cart_cpl');
    }
    public function getComplete()
    {
        return view('myFrontend.complete');
    }
}
