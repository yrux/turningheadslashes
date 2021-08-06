<?php
namespace App\Http\Controllers;

use App\Helpers\Helper as HelpersHelper;
use Helper;
use View;
use Illuminate\Support\Str;
use App\Http\Requests\yTableinquiryRequest;
use App\Http\Requests\yTablenewslettersRequest;
use App\Model\inquiry;
use App\Model\newsletters;
use App\Model\m_flag;
use Symfony\Component\Console\Helper\Helper as HelperHelper;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $favicon=Helper::OneColData('imagetable','img_path',"table_name='favicon' and ref_id=0 and is_active_img='1'");
        View()->share('favicon',$favicon);
        View()->share('config',$this->getConfig());
    }
    public function index()
    {
        $testimonials = Helper::returnMod('testimonials')->orderBy('id','desc')->get();
        $news = Helper::returnMod('news')->orderBy('id','desc')->limit(2)->get();
        $totalNews = Helper::returnMod('news')->count();
        $products = Helper::returnMod('products')->where('is_featured',1)->orderBy('id','desc')->get();
        $homeProduct = intval(Helper::returnFlag(1965));
        $homeProductData = [];
        if(($homeProduct)>0){
            $homeProductData = Helper::returnMod('products')->where('id',intval($homeProduct))->first();
        }
        return view('welcome')->with('title',Helper::returnFlag(123))
        ->with('homeMenu',true)
        ->with(compact('testimonials','news','totalNews','products','homeProductData','homeProduct'));
    }
    public function contactus()
    {
        return view('contactus')->with('title','Contact us')->with('contactmenu',true);
    }
    public function news()
    {
        $news = Helper::returnMod('news')->orderBy('id','desc')->get();
        return view('news')->with('title','News')->with('newsmenu',true)
        ->with(compact('news'));
    }
    public function faq()
    {
        $categories=Helper::returnMod('m_flag')
        ->with('faqs')->where('flag_type','FAQCATEGORY')->get();
        return view('faq')->with('title','Faqs')->with('faqmenu',true)
        ->with(compact('categories'));
    }
    public function parivacypolicy()
    {
        return view('parivacy-policy')->with('title','Privacy Policy');
    }
    public function termsandconditions()
    {
        return view('terms-and-conditions')->with('title','Terms & Conditions');
    }
    public function deliveryandreturns()
    {
        return view('deliveryandreturns')->with('title','Delivery & Returns');
    }    
    public function contactusSubmit(yTableinquiryRequest $request){
        $validator = $request->validated();
        $inquiry = new inquiry;
        $inquiry->inquiries_name = $request->inquiries_name;
        $inquiry->inquiries_lname = $request->inquiries_lname;
        $inquiry->inquiries_email = $request->inquiries_email;
        $inquiry->extra_content = $request->extra_content;
        $inquiry->save();
        $this->echoSuccess("Inquiry Saved");
    }
    public function newsletterSubmit(yTablenewslettersRequest $request){
        newsletters::create(['email'=>$request->email]);
        return back()->with('notify_success','Newsletter saved');
    }
}
