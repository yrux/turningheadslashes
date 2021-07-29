<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use Session;
use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\products;
use App\Model\imagetable;
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
    public function index(){
        if(Session::has('cart')){
            return view('ecommerce.cart')->with('cart',Session::get('cart'))->with('title','Cart');
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
}
