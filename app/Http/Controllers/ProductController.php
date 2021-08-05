<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helper;
use App\Http\Controllers\Controller;
use App\Model\category;
use App\Model\products;
use App\Model\imagetable;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index(category $category){
        $products = products::where('is_active',1)->where('is_deleted',0)->orderBy('id','desc');
        if($category->id){
            $products = $products->where('category_id',$category->id);
        }
        if(!empty($_GET['q'])){
            $q = $_GET['q'];
            $products = $products->where('name','like','%'.$q.'%');
        }
        $products = $products->get();
        return view('ecommerce.index')->with('title',(!$category->name?'Products':$category->name))
        ->with('category',$category)
        ->with('products',$products);
    }
    public function detail(products $product){
        $multi = imagetable::where('table_name','products_optional')->where('type',2)->where('ref_id',$product->id)->get();
        $related_products = [];
        if($product->related_products){
            $related_products = products::whereIn('id',explode(',', $product->related_products))->where('is_active',1)->where('is_deleted',0)->get();
        }
        return view('ecommerce.detail')->with('title',(!$product->name?'Product':$product->name))
        ->with('product', $product)->with('multi',$multi)
        ->with('related_products',$related_products);
    }
}
