<?php

namespace App\Http\Controllers;

//use App\Helpers\Jdf;
//use App\Helpers\My_Auth;
//use App\Helpers\Slug;
use App\Http\Controllers\MemberController;
//use App\Models\Newp\Ads\Payment;
//use App\Models\Newp\Ads\Price;
//use App\Models\Newp\Ads\Block;
//use App\Models\Newp\Ads\BlocksCatsInstance;
//use App\Models\Newp\Ads\Cat;
//use App\Models\Newp\Ads\Category;
//use App\Models\Newp\Ads\File;
//use App\Models\Newp\Ads\Instance;
//use App\Models\Newp\Ads\Pic;
//use App\Models\Newp\Ads\Subcategory;
//use App\Models\Newp\Ads\Subject;
//use App\Models\Newp\Ads\Video;
//use App\Models\Newp\Ads\Voice;
//use App\Models\Newp\Main\Province;
//use App\Models\Newp\Users\User;
////use App\Models\roundcube\session;
//use Carbon\Carbon;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
//use App\Helpers\Functions;
//use Illuminate\Validation\Rules\In;
use Illuminate\Support\Facades\Log;
class DPaneloAdvertisingController extends Controller
{
//    private $model = 'ads';
//
//    function __construct()
//    {
//
//        parent::__construct();
//    }

    public function edit($id)
    {

        dd('asdasdasd');
        $cats=Cat::orderBy('id','asc')->get();
        $blocks=Block::orderBy('id','asc')->get();
        $categories=Category::orderBy('id','asc')->get();
        $provinces=Province::orderBy('id','asc')->get();
        $customers=User::where(['role'=>'customer','user_id'=>Auth::user()->id])->orderBy('created_at','desc')->get();
        $item=DB::table('Advertising.Advertisements')
//            ->join('Advertising.Advertisers','Advertisers.ID','Advertisements.AdvertiserID')
            ->where(['Advertising.Advertisements.ID'=>$id])
            ->first();

//        dd($item);

        $pics=Pic::where(['instance_id'=>$id])->orderBy('created_at','desc')->get();
        $voices=Voice::where(['instance_id'=>$id])->orderBy('created_at','desc')->get();
        $videos=Video::where(['instance_id'=>$id])->orderBy('created_at','desc')->get();
        $files=File::where(['instance_id'=>$id])->orderBy('created_at','desc')->get();

//        $blocks_cats_ads=BlocksCatsInstance::select('id','cat_id','block_id')->where(['ads_id'=>$id])->get();
        $data=[
            'model'=>$this->model,
            'item'=>$item,
            'cats'=>$cats,
            'categories'=>$categories,
            'customers'=>$customers,
            'blocks'=>$blocks,
            'provinces'=>$provinces,
//            'blocks_cats_ads'=>$blocks_cats_ads,
            'pics'=>$pics,
            'voices'=>$voices,
            'videos'=>$videos,
            'files'=>$files,
            'page_title'=>'ویرایش آگهی ',
            'page_subtitle'=>'اطلاعات را وارد نمایید'
        ];
        return view('panelo.advertising.Dshow',$data);
    }



}
