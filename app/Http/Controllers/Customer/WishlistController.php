<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Helper;
use View;
use Auth;
use App\Model\wishlists;
class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function add(){
        $query=wishlists::where('product_id',$_POST['id'])
        ->where('user_id',Auth::user()->id);
        $data = $query->count();
        if($data>0){
            $query->delete();
        }else{
            $wishlists = new wishlists;
            $wishlists->product_id = $_POST['id'];
            $wishlists->user_id = Auth::user()->id;
            $wishlists->save();
        }
        $this->echoSuccess("Wishlist ".($data>0?'removed':'added'));
    }
}
