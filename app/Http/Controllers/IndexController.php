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
        // $m_flag = m_flag::find(1965);
        // dd($m_flag->m_flag_main,$m_flag->m_flag_thumb);
        // $banners = Helper::fireQuery("select banner_management.*
        //     ,img_1.img_path as img_1_img
        //     ,img_2.img_path as img_2_img from banner_management 
        //     left join imagetable as img_1 on img_1.ref_id = banner_management.id and img_1.type=1 and img_1.table_name='banner_management'
        //     left join imagetable as img_2 on img_2.ref_id = banner_management.id and img_2.type=1 and img_2.table_name='banner_management_thumb'
        //     where banner_management.is_active=1 and banner_management.is_deleted=0");
        // $deals = Helper::getImageWithData('products','id','',"is_active=1 and is_deleted=0 and product_type='deals'",0,'order by id asc');
        return view('welcome')->with('title',Helper::returnFlag(123))
        ->with('homeMenu',true);
        //->with(compact('banners','deals'))
    }
    public function contactus()
    {
        return view('contactus')->with('title','Contact us')->with('contactmenu',true);
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
