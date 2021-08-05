<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use Session;
use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\products;
use App\Model\coupons;
use App\Model\imagetable;
use App\Http\Requests\orderRequest;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function add(Request $request){
        $cart = [];
        if(Session::has('cart')){
            $cart = Session::get('cart');
        }
        if(!isset($cart[$request->id])){
            $cart[$request->id] = ['product'=>products::find($request->id), 'qty'=>0,'rowtotal'=>0,'total'=>0];
        }
        $cart[$request->id]['qty'] = intval($request->qty);
        $cart[$request->id]['rowtotal'] = ($request->qty * $cart[$request->id]['product']->price);
        $cart[$request->id]['total'] = ($request->qty * $cart[$request->id]['product']->price);
        Session::put('cart',$cart);
        $this->echoSuccess("Product added in cart");
    }
    public function applycoupon(Request $request){
        $data=coupons::where('coupon_code',$request->code)->where('is_active',1)->first();
        if($data){
            Session::put('discount_applied',$data->discount_value);
            Session::put('discount_code',$data->coupon_code);
            Session::put('discount_enabled',true);
            return back()->with('notify_success','Coupon applied');
        }
        Session::forget('discount_applied');
        Session::forget('discount_code');
        Session::forget('discount_enabled');
        return back()->with('notify_error','Coupon code invalid');
    }
    public function index(){
        if(Session::has('cart')){
            $discountEnabled = false;
            $discountValue = 0;
            if(Session::has('discount_enabled')){
                $discountEnabled=true;
                $discountValue = Session::get('discount_applied');
            }
            return view('ecommerce.cart')->with('cart',Session::get('cart'))->with('title','Cart')
            ->with(compact('discountValue','discountEnabled'));
        }
        return redirect()->route('ecommerce.products')->with('notify_error','No products in cart');
    }
    public function remove($id){
        $cart = Session::get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
        }
        Session::put('cart',$cart);
        return back()->with('notify_success','Product removed from cart');
    }
    public function checkout(){
        if(Session::has('cart')){
            $discountEnabled = false;
            $discountValue = 0;
            if(Session::has('discount_enabled')){
                $discountEnabled=true;
                $discountValue = Session::get('discount_applied');
            }
            $countries = Helper::fireQuery("Select * from apps_countries");
            return view('ecommerce.checkout')->with('cart',Session::get('cart'))->with('title','Checkout')
            ->with(compact('discountValue','discountEnabled','countries'));
        }
        return redirect()->route('ecommerce.products')->with('notify_error','No products in cart');
    }
    public function createOrder (orderRequest $request) {
        Session::forget('cart');
        Session::forget('discount_applied');
        Session::forget('discount_code');
        Session::forget('discount_enabled');
        $this->echoSuccess("Order Recieved");
    }
}

