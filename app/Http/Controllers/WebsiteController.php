<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,Session,DB,Mail;

use App\CategoriesModel as Categories;
use App\PortfoliosModel as Portfolios;
use App\PortfolioDetailsModel as PortfolioDetails;
use App\PortfolioGalleryDetailsModel as PortfolioGalleryDetails;
use App\WhatsOnMediaModel as WhatsOnMedia;
use App\PressReleasesModel as PressRelease;
use App\WhatsNewModel as WhatsNew;
use App\PressKitModel as PressKit;
use App\PressKitCategoriesModel as PressKitCategories;
use App\CsrModel as Csr;
use App\SponsorshipsModel as Sponsorships;
use App\SponsorshipsCategoriesModel as SponsorshipsCategories;
use App\LeadershipModel as Leadership;
use App\AboutModel as About;
use App\PhilosophyModel as Philosophy;
use App\ContactUsModel as ContactUs;
use App\OmniyatTCPModel as OmniyatTCP;
use App\PageSubTitlesModel as PageSubTitles;
use App\InquireModel as Inquire;

class WebsiteController extends Controller
{
    //Home page
    public function indexPage(Request $request)
    {
        if(Session::get('default_page') == 1):
            return redirect()->route('site.home');
        else:
            return view('website.index_page');
        endif;
    }

    public function homePage(Request $request)
    {
        Session::put('default_page', 1);
        return view('website.home_page');
    }

    public function portfolioPage(Request $request)
    {
        $categories = Categories::where('status', 1)->get();
        /*echo "<pre>";
        print_r($categories);exit();*/
        return view('website.portfolio', compact('categories'));
    }

    public function portfolioDetailsPage(Request $request)
    {
        $portfolio = Portfolios::where('id', $request->project_id)->first();
        if(isset($request->project_id) && $portfolio->id == $request->project_id):  
            $portfolio_details  = PortfolioDetails::where(['portfolio_id'=>$portfolio->id])->get(); 
            //Portfolio Tabs
            $about  = PortfolioDetails::where(['tab_name'=>'About','portfolio_id'=>$portfolio->id])->first();
            $location  = PortfolioDetails::where(['tab_name'=>'Location','portfolio_id'=>$portfolio->id])->first();
            $design  = PortfolioDetails::where(['tab_name'=>'Design','portfolio_id'=>$portfolio->id])->get();
            $amenities_facilities  = PortfolioDetails::where(['tab_name'=>'Amenities & Facilities','portfolio_id'=>$portfolio->id])->first();
            $lifeStyle  = PortfolioDetails::where(['tab_name'=>'LifeStyle','portfolio_id'=>$portfolio->id])->first();
            $gallery  = PortfolioDetails::where(['tab_name'=>'Gallery','portfolio_id'=>$portfolio->id])->first();
            $enquire  = PortfolioDetails::where(['tab_name'=>'Enquire','portfolio_id'=>$portfolio->id])->first();
            $vitual_tour  = PortfolioDetails::where(['tab_name'=>'Vitual Tour','portfolio_id'=>$portfolio->id])->get();
            $floorplan  = PortfolioDetails::where(['tab_name'=>'FloorPlan','portfolio_id'=>$portfolio->id])->first();
            $brochure  = PortfolioDetails::where(['tab_name'=>'Brochure','portfolio_id'=>$portfolio->id])->first();
            return view('website.portfolio_details', compact('portfolio','about','location','design','amenities_facilities','lifeStyle','gallery','enquire','vitual_tour','floorplan','brochure','portfolio_details'));
        else:
            return redirect()->back();
        endif;
    }
    public function whatsOnMedia(){
        $page_sub_title = PageSubTitles::where('page_type',1)->first();
        $whats_on_media_data = WhatsOnMedia::where('status',1)->orderBy('id','DESC')->get();
        return view('website.what_on_media.whats_on_media_list', compact('whats_on_media_data','page_sub_title'));
    }

    public function whatsOnMediaLoadMore(Request $request){
        if($request->ajax())
        {
            $limit = 9;
            if($request->id > 0){
                $whats_on_media_data = WhatsOnMedia::where('status',1)->where('id', '<', $request->id)->orderBy('id','DESC')->limit($limit)->get();
            }else{
                $whats_on_media_data = WhatsOnMedia::where('status',1)->orderBy('id','DESC')->limit($limit)->get();
            }
            $output = '';
            if(count($whats_on_media_data) > 0){
                $output = view('website.what_on_media.whats_on_media_load_more_list',compact('whats_on_media_data','limit'));
            }else{
                $output .= '<div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
                                <div class="loadmore_btn text-center py-30">
                                    <button name="load_more_button"  type="button" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11">No Data Found</button>
                                </div>
                            </div>';
            }
            echo $output;
        }
    }

    public function whatsOnMediaDetails(Request $request){
        $page_sub_title = PageSubTitles::where('page_type',1)->first();
        $womd = WhatsOnMedia::where('id',$request->id)->orderBy('id','DESC')->first();

        // get previous
        $previous = WhatsOnMedia::where('id', '<', $request->id)->latest('id')->first();
        // get next
        $next = WhatsOnMedia::where('id', '>', $request->id)->oldest('id')->first();

        return view('website.what_on_media.whats_on_media_details', compact('womd','page_sub_title','previous','next'));
        //echo "string".$request->id;
    }
    public function pressRelease(){
        $page_sub_title = PageSubTitles::where('page_type',2)->first();
        $press_release_data = PressRelease::where('status',1)->orderBy('id','DESC')->get();
        return view('website.press_release.press_release_list', compact('press_release_data','page_sub_title'));
    }

    public function pressReleaseLoadMore(Request $request){
        if($request->ajax())
        {
            $limit = 9;
            if($request->id > 0){
                $press_release_data = PressRelease::where('status',1)->where('id', '<', $request->id)->orderBy('id','DESC')->limit($limit)->get();
            }else{
                $press_release_data = PressRelease::where('status',1)->orderBy('id','DESC')->limit($limit)->get();
            }
            $output = '';
            if(count($press_release_data) > 0){
                $output = view('website.press_release.press_release_load_more_list',compact('press_release_data','limit'));
            }else{
                $output .= '<div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
                                <div class="loadmore_btn text-center py-30">
                                    <button name="load_more_button"  type="button" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11">No Data Found</button>
                                </div>
                            </div>';
            }
            echo $output;
        }
    }

    public function pressReleaseDetails(Request $request){
        $page_sub_title = PageSubTitles::where('page_type',2)->first();
        $prd = PressRelease::where('id',$request->id)->orderBy('id','DESC')->first();
        // get previous
        $previous = PressRelease::where('id', '<', $request->id)->latest('id')->first();
        // get next
        $next = PressRelease::where('id', '>', $request->id)->oldest('id')->first();
        return view('website.press_release.press_release_details', compact('prd','page_sub_title','previous','next'));
    }

    public function whatsNew(){
        $page_sub_title = PageSubTitles::where('page_type',6)->first();
        $whats_new_data = WhatsNew::where('status',1)->orderBy('id','DESC')->get();
        //print_r($whats_new_data);exit();
        return view('website.whats_new.whats_new_list', compact('whats_new_data','page_sub_title'));
    }

    public function whatsNewLoadMoreData(Request $request){
        if($request->ajax())
        {
            $limit = 3;
            if($request->id > 0){
                $whats_new_data = WhatsNew::where('status',1)->where('id', '<', $request->id)->orderBy('id','DESC')->limit($limit)->get();
            }else{
                $whats_new_data = WhatsNew::where('status',1)->orderBy('id','DESC')->limit($limit)->get();
            }
            $output = '';
            if(count($whats_new_data) > 0){
                $output = view('website.whats_new.whats_new_load_more_list',compact('whats_new_data','limit'));
            }else{
                $output .= '<div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
                                <div class="loadmore_btn text-center py-30">
                                    <button name="load_more_button"  type="button" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11">No Data Found</button>
                                </div>
                            </div>';
            }
            echo $output;
        }
    }

    public function whatsNewDetails(Request $request){
        $page_sub_title = PageSubTitles::where('page_type',6)->first();
        $wnd = WhatsNew::where('id',$request->id)->orderBy('id','DESC')->first();
        // get previous
        $previous = WhatsNew::where('id', '<', $request->id)->latest('id')->first();
        // get next
        $next = WhatsNew::where('id', '>', $request->id)->oldest('id')->first();
        return view('website.whats_new.whats_new_details', compact('wnd','page_sub_title','previous','next'));

    }
    public function pressKit(){
        $page_sub_title = PageSubTitles::where('page_type',3)->first();
        $press_kit_cat_data = PressKitCategories::where('status',1)->orderBy('id','DESC')->get();
        $press_kit_category_data = [];
        foreach ($press_kit_cat_data as $key => $value) {
            $press_data = PressKit::where('category_id',$value->id)->orderBy('id','DESC')->get();
            if(count($press_data)>0){
                $press_kit_category_data[] = $value;
            }
        }
        $press_kit_data = PressKit::where('status',1)->orderBy('id','DESC')->get();
        
        return view('website.press_kit.press_kit_list', compact('press_kit_category_data','press_kit_data','page_sub_title'));
    }
    public function pressKitDetails(Request $request){
        $page_sub_title = PageSubTitles::where('page_type',3)->first();
        $pkd = DB::table('press_kit as pk')
                ->select('pk.*','pkc.name')
                ->leftjoin('press_kit_categories as pkc','pkc.id','pk.category_id')
                ->where('pk.id',$request->id)
                ->orderBy('pk.id','DESC')->first();
                //print_r($pkd);exit();
        return view('website.press_kit.press_kit_details', compact('pkd','page_sub_title'));

    }
   
    public function sponsorships(){
        $page_sub_title = PageSubTitles::where('page_type',5)->first();
        $sponsorships_data = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.status',1)->orderBy('sponsorships.id','DESC')->get();
        $sponsorships_categories = SponsorshipsCategories::where('status',1)->get();
        return view('website.sponsor.sponsor-list', compact('sponsorships_data','sponsorships_categories','page_sub_title'));
    }

    public function sponsorshipLoadMoreData(Request $request){
        if($request->ajax())
        {
            $sponsorships_categories = SponsorshipsCategories::where('status',1)->get();

            if($request->id > 0){
                $sponsorships_data = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.status',1)->where('sponsorships.id', '<', $request->id)->orderBy('sponsorships.id','DESC')->limit(3)->get();
            }else{
                $sponsorships_data = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.status',1)->orderBy('sponsorships.id','DESC')->limit(3)->get();
            }
            //dd($sponsorships_data);
            $output = '';
            if(!$sponsorships_data->isEmpty())
            {
                $output = view('website.sponsor.sponsor-load-more-list',compact('sponsorships_categories','sponsorships_data'));
            }
            else
            {
                $output .= '<div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
                                <div class="loadmore_btn text-center py-30">
                                    <button name="load_more_button"  type="button" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11">No Data Found</button>
                                </div>
                            </div>';
            }
            echo $output;
        }
    }

    public function sponsorshipsDetails(Request $request){
        $page_sub_title = PageSubTitles::where('page_type',5)->first();
        $ssd = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.id', $request->id)->orderBy('id','DESC')->first();
        $sslist = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.category_id', $ssd->category_id)->where('sponsorships.id', '!=', $request->id)->orderBy('id','DESC')->limit(3)->get();
        return view('website.sponsor.sponsor-details', compact('ssd','sslist','page_sub_title'));
    }

    public function leadership(Request $request){

        if(isset($request->id)&&$request->id!=''){
            $leadership_data = Leadership::where('status',1)->where('id',$request->id)->orderBy('ordered_by','asc')->first();
        }else{
            $leadership_data = Leadership::where('status',1)->orderBy('ordered_by','asc')->first();
        }
        $previous_leadership = '';
        $next_leadership = '';
        $last_leadership = Leadership::where('status',1)->select('id','leadership_name','ordered_by')->latest()->orderBy('ordered_by','asc')->first();
        $first_leadership = Leadership::where('status',1)->orderBy('ordered_by','asc')->first();
        
        if(isset($leadership_data->id) && $leadership_data->id == $last_leadership->id){
            //echo "if";exit();
            $previous_leadership = Leadership::where('ordered_by', '<', $last_leadership->ordered_by)->orderBy('ordered_by','desc')->select('id','leadership_name','ordered_by')->first();
            $next_leadership = Leadership::where('status',1)->first();

        }elseif(isset($leadership_data->id) && $leadership_data->id == $first_leadership->id){
            //echo "elseif";exit();
            $previous_leadership = Leadership::where('status',1)->orderBy('ordered_by','desc')->first();
            $next_leadership = Leadership::where('ordered_by', '>', $leadership_data->ordered_by)->select('id','leadership_name','ordered_by')->first();
           
        }else{
            //echo "else";exit();
            if(isset($leadership_data->id)){
            $previous_leadership = Leadership::where('ordered_by', '<', $leadership_data->ordered_by)->select('id','leadership_name','ordered_by')->first();
            $next_leadership = Leadership::where('ordered_by', '>', $leadership_data->ordered_by)->select('id','leadership_name','ordered_by')->first(); 
            }  
          
        }
        return view('website.company_leadership', compact('leadership_data','previous_leadership','next_leadership'));
    }

    public function aboutCompany(){
        $about_data = About::where('status',1)->orderBy('id','DESC')->first();
        return view('website.about_company',compact('about_data'));
    }
    public function philosophy(){
        $philosophy_data = Philosophy::where('status',1)->orderBy('id','DESC')->first();
        return view('website.philosophy',compact('philosophy_data'));
    }
    public function contactUs(){
        $contact_us_data = ContactUs::where('status',1)->orderBy('id','ASC')->get();
        $map_locations = DB::table('contact_us as cu1')->select('cu1.type','cu1.title as latitude','cu1.description as longitude','cu2.description as location_name')->where(['cu1.type'=>8,'cu1.status'=>1])->leftjoin('contact_us as cu2','cu1.id','cu2.title')->get();
        /*echo "<pre>";
        print_r($contact_us_data);exit();*/
        return view('website.contact_us',compact('contact_us_data','map_locations'));
    }


    public function csrLoadMoreData(Request $request){
        if($request->ajax())
        {
            $limit = 6;
            if($request->id > 0){
                $csr_data = Csr::where('status',1)->where('id', '<', $request->id)->orderBy('id','DESC')->limit($limit)->get();
            }else{
                $csr_data = Csr::where('status',1)->orderBy('id','DESC')->limit($limit)->get();
            }
            $output = '';
            if(count($csr_data) > 0){
                $output = view('website.csr.csr_load_more_list',compact('csr_data','limit'));
            }else{
                $output .= '<div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
                                <div class="loadmore_btn text-center py-30">
                                    <button name="load_more_button"  type="button" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11">No Data Found</button>
                                </div>
                            </div>';
            }
            echo $output;
        }
    }

    public function csr(Request $request){
        $page_sub_title = PageSubTitles::where('page_type',4)->first();
        $csr_data = Csr::where('status',1)->orderBy('id','DESC')->get();
        return view('website.csr.csr_list', compact('csr_data','page_sub_title'));
    }

    public function csrDetails(Request $request){
        $page_sub_title = PageSubTitles::where('page_type',5)->first();
        $csrd = Csr::where('id',$request->id)->orderBy('id','DESC')->first();
        $csr_data = Csr::where('status',1)->where('id','!=', $request->id)->limit(3)->orderBy('id','DESC')->get();
        return view('website.csr.csr_details', compact('csrd','csr_data','page_sub_title'));

    } 

    public function TermsAndConductions(){
        $tac_data = OmniyatTCP::where('type',2)->orderBy('id','DESC')->first();
        return view('website.terms_and_conditions', compact('tac_data'));
    }
    public function PrivacyPolicy(){
        $privacy_policy_data = OmniyatTCP::where('type',1)->orderBy('id','DESC')->first();
        //echo "<pre>"; print_r($privacy_policy_data);exit();
        return view('website.privacy_policy', compact('privacy_policy_data'));
    }

    public function saveContactdetails(Request $request)
    {
        if(!empty($request->first_name) && !empty($request->last_name) && !empty($request->email) && !empty($request->phone) && !empty($request->message)){
            $saveInquire = Inquire::create(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'email'=>$request->email,'mobile'=>$request->phone,'message'=>$request->message])->id;
            if($saveInquire > 0){
                //TODO : mail integration to active account
                $send_to = [];
                $send_to[] = ['yhvreddyinfo@gmail.com','Harsha']; //change mail-id
                $sendto = [
                    'sendForm'  =>  [$request->email, $request->first_name],
                    'sendTo'    =>  $send_to,
                    'subject'   =>  'Inquire details - sitename',
                ];
                $mdata = array('request' => $request);
                $this->sendEmail('email.inquire_details',$mdata,$sendto);

                $responce = array('response' => true,'message'=>'Inquire details as sent. We will get back soon!');
            }else{
                $responce = array('response' => false,'message'=>'Failed to send your inquire details!');
            }
        }else{
            $responce = array('response' => false,'message'=>'Please fill all required fields..!');
        }
        return Response()->json($responce);
    }

    public function sendEmail($mailView,$data,$sendto)
    {
        Mail::send($mailView, $data, function($message) use ($sendto) {

            if(count($sendto['sendTo']) > 0){
                foreach($sendto['sendTo'] as $to)
                {
                    $message->to($to[0], $to[1]);
                }
            }
            $message->subject($sendto['subject']);
            $message->from($sendto['sendForm'][0],$sendto['sendForm'][1]);
        });
        if(Mail::failures()) {
            return false;
        }else{
            return true;
        }
    }
    
}
