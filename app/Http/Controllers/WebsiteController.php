<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,Session,DB,Mail,File,ZipArchive;

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
use App\SponsorshipGalleryImagesModel as SponsorshipGalleryImages;
use App\SubscribeNewsLettersModel as SubscribeNewsLetters;

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
            $portfolio_details  = PortfolioDetails::where(['portfolio_id'=>$portfolio->id])->first(); 
            $project_id = $request->project_id;
            //Portfolio Tabs
            $about  = PortfolioDetails::where(['tab_name'=>'About','portfolio_id'=>$portfolio->id])->first();
            $location  = PortfolioDetails::where(['tab_name'=>'Location','portfolio_id'=>$portfolio->id])->first();
            $design  = PortfolioDetails::where(['tab_name'=>'Design','portfolio_id'=>$portfolio->id])->get();
            $designWithTabs  = PortfolioDetails::where(['tab_name'=>'Design','option_type'=>'withTabs','portfolio_id'=>$portfolio->id])->get();
            $designWithOutTabs  = PortfolioDetails::where(['tab_name'=>'Design','option_type'=>'withOutTabs','portfolio_id'=>$portfolio->id])->first();
            $amenities_facilities  = PortfolioDetails::where(['tab_name'=>'Amenities & Facilities','portfolio_id'=>$portfolio->id])->first();
            $lifeStyle  = PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'no','portfolio_id'=>$portfolio->id])->first();
            $lifeStyleTabs  = PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'yes','portfolio_id'=>$portfolio->id,'option_type'=>'tabs'])->get();
            $gallery  = PortfolioDetails::where(['tab_name'=>'Gallery','portfolio_id'=>$portfolio->id])->first();
            $enquire  = PortfolioDetails::where(['tab_name'=>'Enquire','portfolio_id'=>$portfolio->id])->first();
            $vitual_tour  = PortfolioDetails::where(['tab_name'=>'Vitual Tour','portfolio_id'=>$portfolio->id])->get();
            $floorplan  = PortfolioDetails::where(['tab_name'=>'FloorPlan','portfolio_id'=>$portfolio->id])->get();
            $brochure  = PortfolioDetails::where(['tab_name'=>'Brochure','portfolio_id'=>$portfolio->id])->first();
            return view('website.portfolio_details', compact('portfolio','about','location','design','designWithTabs','designWithOutTabs','amenities_facilities','lifeStyle','lifeStyleTabs','gallery','enquire','vitual_tour','floorplan','brochure','portfolio_details','project_id'));
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
            $limit = 6;
            if($request->id > 0){
                $sponsorships_data = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.status',1)->where('sponsorships.id', '<', $request->id)->orderBy('sponsorships.id','DESC')->limit($limit)->get();
            }else{
                $sponsorships_data = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.status',1)->orderBy('sponsorships.id','DESC')->limit($limit)->get();
            }
            //dd($sponsorships_data);
            $output = '';
            if(!$sponsorships_data->isEmpty())
            {
                $output = view('website.sponsor.sponsor-load-more-list',compact('sponsorships_categories','sponsorships_data','limit'));
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
        $ss_gallery_images = SponsorshipGalleryImages::where('sponsorship_id',$request->id)->get();

        $ssd = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.id', $request->id)->orderBy('id','DESC')->first();
        $sslist = Sponsorships::join('sponsorships_categories','sponsorships_categories.id','=','sponsorships.category_id')->select('sponsorships.*','sponsorships_categories.name as category_name','sponsorships_categories.id as category_id')->where('sponsorships.category_id', $ssd->category_id)->where('sponsorships.id', '!=', $request->id)->orderBy('id','DESC')->limit(3)->get();
        return view('website.sponsor.sponsor-details', compact('ssd','sslist','page_sub_title','ss_gallery_images'));
    }

    public function leadership(Request $request){


        if(isset($request->id)&&$request->id!=''){
            $leadership_data = Leadership::where('status',1)->where('id',$request->id)->orderBy('ordered_by','asc')->first();
        }else{
            $leadership_data = Leadership::where('status',1)->orderBy('ordered_by','asc')->first();
        }
        // get previous
        $previous_leadership = Leadership::where('ordered_by', '<', $leadership_data->ordered_by)->latest('id')->first();
        // get next
        $next_leadership = Leadership::where('ordered_by', '>', $leadership_data->ordered_by)->oldest('id')->first();
        
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
        //return Response()->json($request->all());
        //exit;
        if(!empty($request->first_name) && !empty($request->last_name) && !empty($request->email) && !empty($request->phone) && !empty($request->message)){
            $files = '';
            $mdata = [];
            $link = '';
            $resMessage = '';
            if(isset($request->download)):
                
                if($request->download == 'floor_plan'):
                    $portfolio = Portfolios::where('id', $request->portfolio)->first();
                    $path = $this->floorPlanFilesDownload($request, $portfolio->id,true);
                    $files = asset('public/'.$path);
                    $mdata['link'] = route('download.floorplan.files',['floorplan_id'=>$request->portfolio,'file'=>true]);
                    $resMessage = "Floorplan files as sent to mail. Please download form mail!";
                endif;

                if($request->download == 'brochure'):
                    //return Response()->json($request->all());
                    $portfolio = Portfolios::where('id', $request->portfolio)->first();
                    $path = $this->brochureFilesDownload($request, $portfolio->id,false);
                    $files = asset($path);
                    //$mdata['link'] = route('download.brochure.files',['floorplan_id'=>$request->portfolio,'file'=>true]);
                endif;
                
            endif;

            //return Response()->json(['request'=>$request->all(),'path'=>$path]);
            //'request_url','purpose','comment_message'
            $saveInquire = Inquire::create(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'email'=>$request->email,'mobile'=>$request->phone,'message'=>$request->message])->id;
            if($saveInquire > 0){
                //TODO : mail integration to active account
                $send_to = [];
                $send_to[] = [config('global.info_mail'),config('global.site_name')]; //change mail-id
                $sendto = [
                    'sendForm'  =>  [$request->email, $request->first_name],
                    'sendTo'    =>  $send_to,
                    'subject'   =>  'Inquire details - Omniyat',
                ];
                $mdata['request'] = $request;
                $mailRes = $this->sendEmail('email.inquire_details',$mdata,$sendto);
                if($mailRes == true){
                    $usend_to = [];
                    $usend_to[] = [$request->email, $request->first_name]; //change mail-id
                    $usendto = [
                        'sendForm'  =>  [config('global.info_mail'),config('global.site_name')],
                        'sendTo'    =>  $usend_to,
                        'subject'   =>  'Thank you for inquiring - Omniyat',
                    ];
                    $mdata['request'] = $request;
                    $userMailRes = $this->sendEmail('email.inquire_responce',$mdata,$usendto,$files);
                    if($userMailRes == true):
                        Inquire::where('id', $saveInquire)->update(['comment_message'=>'Successfully sent to user','mail_status'=>'true']);
                    else:
                        Inquire::where('id', $saveInquire)->update(['comment_message'=>'Failed to send for user','mail_status'=>'false']);
                    endif;
                }else{
                    Inquire::where('id', $saveInquire)->update(['comment_message'=>'Failed to send for client or admin','mail_status'=>'false']);
                }
                if(isset($resMessage) && !empty($resMessage)):
                    $message = $resMessage;
                else:
                    $message = 'Inquire details as sent. We will get back soon!';
                endif;
                $responce = array('response' => true,'message'=>$message,'mail'=>$mailRes);
            }else{
                $responce = array('response' => false,'message'=>'Failed to send your inquire details!');
            }
        }else{
            $responce = array('response' => false,'message'=>'Please fill all required fields..!');
        }
        return Response()->json($responce);
    }

    public function saveSubscribeNewsLetters(Request $request)
    {
        if(!empty($request->email)):
            $newsLetterMail = SubscribeNewsLetters::where('email',$request->email)->get();
            if(count($newsLetterMail) > 0):
                $responce = ['response'=>false,'message'=>'Mail Id is already subscribed!'];
            else:
                $NewsLetterSubscribe = SubscribeNewsLetters::create(['email'=>$request->email,'_token'=>$request->_token])->id;
                if($NewsLetterSubscribe > 0):
                    //send verification mail.
                    $link = route('verify.subscribe.news.letters',['email'=>$request->email,'token'=>$request->_token]);
                    $usend_to[] = [$request->email, $request->email]; //change mail-id
                    $usendto = [
                        'sendForm'  =>  [config('global.info_mail'),config('global.site_name')],
                        'sendTo'    =>  $usend_to,
                        'subject'   =>  'Thank you for subscribe newsletters - Omniyat',
                    ];
                    $mdata['request'] = $request;
                    $mdata['link'] = $link;
                    $userMailRes = $this->sendEmail('email.verify_newslitter_mail',$mdata,$usendto);

                    $responce = ['response'=>true,'message'=>'Thank you for subscribe. please verify your email!'];
                else:
                    $responce = ['response'=>false,'message'=>'Failed to subscribe your email!'];
                endif;
            endif;
        else:
            $responce = ['response'=>false,'message'=>'Invalid request to subscribe!'];
        endif;
        return Response()->json($responce);
    }

    public function verifySubscribeNewsLetters(Request $request)
    {
        $newsLetterMail = SubscribeNewsLetters::where(['email'=>$request->email,'_token'=>$request->token,'status'=>0])->get();
        if(count($newsLetterMail) > 0):
            SubscribeNewsLetters::where(['email'=>$request->email,'_token'=>$request->token,'status'=>0])->update(['status'=>1]);
            $message = "Thank you for subscribe newsletters!";
            $status = true;
        else:
            $message = "Failed to verifcation email to newsletters!";
            $status = false;
        endif;
        return view('website.subscribe_newsletter_status', compact('status','message'));
    }

    public function sendEmail($mailView,$data,$sendto, $attachments=null)
    {
        Mail::send($mailView, $data, function($message) use ($sendto, $attachments) {

            if(count($sendto['sendTo']) > 0){
                foreach($sendto['sendTo'] as $to)
                {
                    $message->to($to[0], $to[1]);
                }
            }

            if(isset($attachments)){
                if(is_array($attachments) && count($attachments) > 0){
                    foreach($attachments as $attachment){
                        $message->attach($attachment);
                    }
                }elseif(!empty($attachments)){
                    $message->attach($attachments);
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
    
    public function floorPlanFilesDownload(Request $request, $id = null, $sendToMail = false){

        $zip = new ZipArchive;
        if(isset($request->floorplan_id)):
            $portfolio_id = $request->floorplan_id;
        else:
            $portfolio_id = $id;
        endif;
        $portfolio = Portfolios::where('id', $portfolio_id)->first();
        $floorplan  = PortfolioDetails::where(['tab_name'=>'FloorPlan','portfolio_id'=>$portfolio_id])->get();
        //$brochure  = PortfolioDetails::where(['tab_name'=>'Brochure','portfolio_id'=>$request->floorplan_id])->first();
        if(!file_exists('public/download/portfolio/'.$portfolio_id)):
            mkdir('public/download/portfolio/'.$portfolio_id, 0777, true);
        endif;

        $fileName = 'download/portfolio/'.$portfolio_id.'/Floorplan_documents_'.str_replace('+','_',urlencode($portfolio->project_name)).'.zip';
        $floorPlanFilesPath = 'uploads/portfolio/floorplan/'.$portfolio->category_id.'/';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE){
            $files = File::files(public_path($floorPlanFilesPath));
            foreach ($files as $key => $value) {
                if(isset($floorplan[$key]->links) && file_exists($floorplan[$key]->links)):
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                endif;
            }
            $zip->close();
        }

        if($sendToMail == true):
            return $fileName;
        endif;
        
        return response()->download(public_path($fileName));
    }

    public function brochureFilesDownload(Request $request, $id = null, $sendToMail = false){

        $zip = new ZipArchive;
        if(isset($request->brochure_id)):
            $portfolio_id = $request->brochure_id;
        else:
            $portfolio_id = $id;
        endif;

        $portfolio = Portfolios::where('id', $portfolio_id)->first();
        $brochure  = PortfolioDetails::where(['tab_name'=>'Brochure','portfolio_id'=>$portfolio->id])->first();
        //$brochure  = PortfolioDetails::where(['tab_name'=>'Brochure','portfolio_id'=>$request->floorplan_id])->first();
        
        /*if(!file_exists('public/download/portfolio/'.$portfolio_id)):
            mkdir('public/download/portfolio/'.$portfolio_id, 0777, true);
        endif;

        $fileName = 'download/portfolio/'.$portfolio_id.'/brochure_documents_'.urlencode($portfolio->project_name).'.zip';
        $brochureFilesPath = 'uploads/portfolio/brochures/'.$portfolio->category_id.'/';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE){
            $files = File::files(public_path($brochureFilesPath));
            foreach ($files as $key => $value) {
                if(isset($brochure[$key]->links) && file_exists($brochure[$key]->links)):
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                endif;
            }
            $zip->close();
        }*/

        if($sendToMail == true):
            return $brochure->link;
        endif;
        
        return $brochure->links;
        //return response()->download(public_path($fileName));
    }
    
}
