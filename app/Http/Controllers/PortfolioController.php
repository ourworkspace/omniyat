<?php
namespace App\Http\Controllers;
error_reporting(0);

use Illuminate\Http\Request;
use App\AmenitiesDataModel as AmenitiesData;
use App\CategoriesModel as Categories;
use App\PortfolioModel as Portfolio;
use DB;

use App\PortfoliosModel as Portfolios;
use App\PortfolioDetailsModel as PortfolioDetails;
use App\PortfolioGalleryDetailsModel as PortfolioGalleryDetails;

class PortfolioController extends Controller
{
    protected $textAlignments;
    protected $theme;
    protected $imageSectionOptions;
    protected $gridColums;
    protected $gridAlignmentOptions;
    protected $gridContainerPositions;


    public function __construct()
    {
        $this->textAlignments = ['left-top','left-middle','left-bottom','center-top','center-middle','center-bottom','right-top','right-middle','right-bottom'];
        $this->theme = ['dark'=>'Dark Theme','light'=>'Light Theme'];

        $this->imageSectionOptions = ['full-width','left-bottom','right-bottom'];
        $this->gridColums = ['col-md-1','col-md-2','col-md-3','col-md-4','col-md-5','col-md-6','col-md-7','col-md-8','col-md-9','col-md-10','col-md-11','col-md-12'];
        $this->gridAlignmentOptions = ['Pull-left','Pull-right','col-centered'];
        $this->gridContainerPositions = ['container-vertical-middle','container-vertical-left-top','container-vertical-left-bottom','container-vertical-left-middle','container-vertical-right-top','container-vertical-right-bottom','container-vertical-right-middle'];
    }

    public function portfolioAdd(Request $request)
    {
        $categories = Categories::where('status', 1)->get();
        $amenities = AmenitiesData::where(['status'=>1])->orderBy('created_at','DESC')->get();
        $textAlignments = $this->textAlignments;
        $theme = $this->theme;
        $imageSectionOptions = $this->imageSectionOptions;
        $gridColums = $this->gridColums;
        $gridAlignmentOptions = $this->gridAlignmentOptions;
        $gridContainerPositions = $this->gridContainerPositions;
        return view('portfolio.portfolio_add', compact('categories','amenities','textAlignments','theme','imageSectionOptions','gridColums','gridAlignmentOptions','gridContainerPositions'));
    }

    public function portfolioTabType(Request $request)
    {
        $tabType = $request->tabType;
        if($tabType == 'withTabs'){
            $x = $request->x;
            if(isset($request->portfolioId)):
                $portfolio_design = PortfolioDetails::where(['option_type'=>'withTabs','portfolio_id'=>$request->portfolioId])->get();
                return view('portfolio.portfolio_design_with_tabs',compact('x','portfolio_design'));
            else:
                return view('portfolio.portfolio_design_with_tabs',compact('x'));
            endif;
        }else{
            if(isset($request->portfolioId)):
                $portfolio_design = PortfolioDetails::where(['option_type'=>'withOutTabs','portfolio_id'=>$request->portfolioId])->first();
                return view('portfolio.portfolio_design_without_tabs',compact('portfolio_design'));
            else:
                return view('portfolio.portfolio_design_without_tabs');
            endif;
        }
    }

    public function portFoliosDataSave(Request $request)
    {
        //dd($request->all());
        //Portfolio
        try{
            $insertDataPre = [];
            $insertDataPre[] = $request->all();
            $portfolio_project_logo = $this->uploadFile($request,'portfolio_project_logo','portfolio/logo/'.$request->portfolio_category.'');
            if(isset($portfolio_project_logo) && !file_exists($portfolio_project_logo)):
                $portfolio_project_logo = '';
            endif;

            $portfolio_project_image = $this->uploadFile($request,'portfolio_project_image','portfolio/images/'.$request->portfolio_category.'');
            if(isset($portfolio_project_image) && !file_exists($portfolio_project_image)):
                $portfolio_project_image = '';
            endif;

            $portfolio = Portfolios::create(['category_id'=>$request->portfolio_category,'project_name'=>$request->portfolio_project_name,'logo'=>$portfolio_project_logo,'status'=>1,'image'=>$portfolio_project_image])->id;
            //Portfolio Tabs start. 
            if($portfolio > 0):
                //About tab
                if(isset($request->about_title_name)):
                    $about_background_picture = $this->uploadFile($request,'about_background_picture','portfolio/backgroundImages/'.$request->portfolio_category.'');
                    if(isset($about_background_picture) && !file_exists($about_background_picture)):
                        $about_background_picture = '';
                    endif;

                    $about_project_logo = $this->uploadFile($request,'about_project_logo','portfolio/logo/'.$request->portfolio_category.'');
                    if(isset($about_project_logo) && !file_exists($about_project_logo)):
                        $about_project_logo = '';
                    endif;
                    //'bg_image_position'=>$request->about_image_position,
                    $about = PortfolioDetails::create(['portfolio_id' => $portfolio,'tab_name'=> 'About','theme_color'=>$request->about_theme_color,'text_alignment'=>$request->about_text_alignment,'background_image'=>$about_background_picture,'logo'=>$about_project_logo,'title'=>$request->about_title_name,'description_1'=>$request->about_description,'description_2'=>$request->about_description_2])->id;
                endif;

                //Location Tab
                if(isset($request->location_title_name)):
                    $location_background_picture = $this->uploadFile($request,'location_background_picture','portfolio/backgroundImages/'.$request->portfolio_category.'');
                    if(isset($location_background_picture) && !file_exists($location_background_picture)):
                        $location_background_picture = '';
                    endif;

                    $location_icon_image = $this->uploadFile($request,'location_icon_image','portfolio/locationImages/'.$request->portfolio_category.'');
                    if(isset($location_icon_image) && !file_exists($location_icon_image)):
                        $location_icon_image = '';
                    endif;

                    $location = PortfolioDetails::create(['portfolio_id'=>$portfolio,'tab_name'=>'Location','theme_color'=>$request->location_theme_color,'text_alignment'=>$request->location_text_alignment,'background_image'=>$location_background_picture,'title'=>$request->location_title_name,'description_1'=>$request->location_description,'icon_image'=>$location_icon_image])->id;
                endif;

                //Design
                if($request->design_tabs_type == 'withTabs'):
                    if(count($request->design_tab_name) > 0):
                        $design_gallery_silders = $this->multiUploadFiles($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');

                        foreach($request->design_tab_name as $key => $tabname):
                            $tab = PortfolioDetails::create(['portfolio_id' => $portfolio, 'tab_name' => 'Design', 'title' => $request->design_title_name[$key], 'description_1' => $request->design_description[$key], 'option_type' => 'withTabs','option_title' => $request->design_tab_name[$key], 'background_image'=> $design_gallery_silders[$key]])->id;
                        endforeach;

                        
                        /*if(count($design_gallery_silders) > 0):
                            foreach($design_gallery_silders as $gkey => $dgvalue):
                                $designGalleryImages = PortfolioGalleryDetails::create(['tab_id'=>$portfolio,'title'=>'Design_Slider_'.$gkey,'image'=>$dgvalue,'type'=>'design_gallery_images'])->id;
                            endforeach;
                        endif;*/
                    endif;
                elseif($request->design_tabs_type == 'withOutTabs'):

                    $design_gallery_images = $this->uploadFile($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');
                    if(isset($design_gallery_images) && !file_exists($design_gallery_images)):
                        $design_gallery_images = '';
                    endif;

                    $tab = PortfolioDetails::create(['portfolio_id' => $portfolio, 'tab_name' => 'Design', 'title' => $request->design_title_name_s, 'description_1' => $request->design_description_s, 'option_type' => 'withOutTabs','background_image'=> $design_gallery_images])->id;
                    
                    /*if(count($design_gallery_silders) > 0):
                        foreach($design_gallery_silders as $gkey => $dgvalue):
                            $designGalleryImages = PortfolioGalleryDetails::create(['tab_id'=>$portfolio,'title'=>'Design_Slider_'.$gkey,'image'=>$dgvalue,'type'=>'design_gallery_images'])->id;
                        endforeach;
                    endif;*/
                endif;

                //Amenities & Facilities
                if(isset($request->amenities_facilities_title_name)):
                    if(count($request->amenities_facilities_amenities) > 0):
                        $amenities = implode(',',$request->amenities_facilities_amenities);
                    else:
                        $amenities = '';
                    endif;

                    $amenities_facilities_logo = $this->uploadFile($request,'amenities_facilities_logo','portfolio/logoImages/'.$request->portfolio_category.'');
                    if(isset($amenities_facilities_logo) && !file_exists($amenities_facilities_logo)):
                        $amenities_facilities_logo = '';
                    endif;

                    $amenities_facilities = PortfolioDetails::create(['portfolio_id' => $portfolio,'tab_name' => 'Amenities & Facilities','title' => $request->amenities_facilities_title_name,'description_1' => $request->amenities_facilities_description,'amenities' => $amenities,'logo'=>$amenities_facilities_logo])->id;

                    $amenitieSliders = $this->multiUploadFiles($request,'amenities_facilities_gallery_images','portfolio/amenitieSliders/'.$request->portfolio_category.'');
                    if(count($amenitieSliders) > 0):
                        foreach($amenitieSliders as $key => $aivalue):
                            $amenitieImage = PortfolioGalleryDetails::create(['tab_id'=>$portfolio,'title'=>'Amenities_Slider_'.$key,'image'=>$aivalue,'type'=>'amenities_facilities_gallery_images']);
                        endforeach;
                    endif;
                endif;

                //LifeStyle
                if(isset($request->lifeStyle_title_name)):
                    // $lifeStyle_logo = $this->uploadFile($request,'lifeStyle_logo','portfolio/lifeStyle/'.$request->portfolio_category.'');
                    // if(isset($lifeStyle_logo) && empty($lifeStyle_logo)):
                    //     $lifeStyle_logo = '';
                    // endif; 'logo'=>$lifeStyle_logo,

                    $lifeStyle_slider_images = $this->uploadFile($request,'lifeStyle_slider_images','portfolio/lifeStyle/sliderImages/'.$request->portfolio_category.'');
                    if(isset($lifeStyle_slider_images) && !file_exists($lifeStyle_slider_images)):
                        $lifeStyle_slider_images = '';
                    endif;

                    $lifeStyle = PortfolioDetails::create(['portfolio_id'=> $portfolio,'tab_name'=>'LifeStyle','sub_tab_name'=>'no','title'=>$request->lifeStyle_title_name,'description_1'=>$request->lifeStyle_description,'background_image'=>$lifeStyle_slider_images])->id;

                    /*$lifeStyle_slider_images = $this->multiUploadFiles($request,'lifeStyle_slider_images','portfolio/lifeStyleSliders/'.$request->portfolio_category.'');
                    if(count($lifeStyle_slider_images) > 0):
                        foreach($lifeStyle_slider_images as $key => $lsivalue):
                            $lifeStyleImage = PortfolioGalleryDetails::create(['tab_id'=>$portfolio,'title'=>'Slider_'.$key,'image'=>$lsivalue,'type'=>'lifeStyle_slider_images'])->id;
                        endforeach;
                    endif;*/

                    if(isset($request->lifestyle_tab_name)): // 
                        if(count($request->lifestyle_tab_name) > 0):
                            $lifestyle_gallery_tab_images = $this->multiUploadFiles($request,'lifestyle_gallery_tab_images','portfolio/lifestyleTabImages/'.$request->portfolio_category.'');

                            foreach($request->lifestyle_tab_name as $key => $tabname):
                                if(isset($lifestyle_gallery_tab_images[$key])):
                                    $lifestyleGalleryTabImages = $lifestyle_gallery_tab_images[$key];
                                else:
                                    $lifestyleGalleryTabImages = '';
                                endif;
                                $tab = PortfolioDetails::create(['portfolio_id' => $portfolio, 'tab_name' => 'LifeStyle','sub_tab_name'=>'yes', 'title' => $request->lifestyle_tab_title_name[$key], 'description_1' => $request->lifestyle_tab_description[$key], 'option_type' => 'tabs','option_title' => $request->lifestyle_tab_name[$key], 'background_image'=> $lifestyleGalleryTabImages])->id;
                            endforeach;
                        endif;
                    endif;

                endif;

                //Gallery
                if(isset($request->gallery_title_name)):
                    $gallery = PortfolioDetails::create(['portfolio_id'=> $portfolio,'tab_name'=>'Gallery','title'=>$request->gallery_title_name,'description_1'=>$request->gallery_description])->id;

                    $gallery_slider_images = $this->multiUploadFiles($request,'gallery_slider_images','portfolio/galleryImages/'.$request->portfolio_category.'');

                    if(count($gallery_slider_images) > 0):
                        foreach($gallery_slider_images as $key => $givalue):
                            $galleryImage = PortfolioGalleryDetails::create(['tab_id'=>$portfolio,'title'=>'Gallery_slider_'.$key,'image'=>$givalue,'type'=>'gallery_slider_images'])->id;
                        endforeach;
                    endif;
                endif;

                //enquiry
                if(isset($request->enquire_theme_color) && isset($request->enquire_text_alignment)):
                    $enquireImage = $this->uploadFile($request,'enquire_background_image','portfolio/enquire/'.$request->portfolio_category.'');
                    if(isset($enquireImage) && !file_exists($enquireImage)):
                        $enquireImage = '';
                    endif;
                    PortfolioDetails::create(['portfolio_id'=> $portfolio,'tab_name'=> 'Enquire','theme_color'=>$request->enquire_theme_color,'text_alignment'=>$request->enquire_text_alignment,'background_image'=>$enquireImage,])->id;
                endif;

                //Vitual Tour
                if(count($request->vitual_tour_title) > 0 && isset($request->vitual_tour_title)):
                    foreach($request->vitual_tour_title as $key => $vtvalue):
                        $vitual_tour  = PortfolioDetails::create(['portfolio_id' => $portfolio,'tab_name'=>'Vitual Tour','title'=>$vtvalue,'links'=>$request->vitual_tour_url[$key]])->id;
                    endforeach;
                endif;

                //floorplan_file
                if((isset($request->floorplan_file) && count($request->floorplan_file)) &&  (isset($request->floorplan_file_title) && count($request->floorplan_file_title)>0)):
                    //$floorplan_file = $this->uploadFile($request,'floorplan_file','portfolio/floorplan/'.$request->portfolio_category.'');

                    $floorplan_file = $this->multiUploadFiles($request,'floorplan_file','portfolio/floorplan/'.$request->portfolio_category.'');

                    // if(isset($floorplan_file) && empty($floorplan_file)):
                    //     $floorplan_file = '';
                    // endif;
                    if(count($floorplan_file) > 0):
                        foreach($floorplan_file as $fpkey => $fpvalue):
                            if(file_exists($fpvalue)):
                                PortfolioDetails::create(['portfolio_id'=> $portfolio,'tab_name'=>'FloorPlan','title'=>$request->floorplan_file_title[$fpkey],'links'=>$fpvalue])->id;
                            endif;
                        endforeach;
                    endif;
                    //$lifeStyle = PortfolioDetails::create(['portfolio_id'=> $portfolio,'tab_name'=>'FloorPlan','title'=>'Floorplan File','links'=>$floorplan_file])->id;
                endif;

                //Brochure file
                if(isset($request->brochure_file)):
                    $brochure_file = $this->uploadFile($request,'brochure_file','portfolio/brochures/'.$request->portfolio_category.'');
                    if(isset($brochure_file) && file_exists($brochure_file)):
                        $lifeStyle = PortfolioDetails::create(['portfolio_id'=> $portfolio,'tab_name'=>'Brochure','title'=>'Brochure File','links'=>$brochure_file]);
                    endif;
                endif;

                
                //dd($request->all());
                return redirect()->route('portfolio.list')->with('success','Successfully saved portfolio');
            else:
                // echo $portfolio;
                // print_r('Failed to save portfolio details');
                PortfolioDetails::where(['portfolio_id'=> $portfolio])->delete();
                PortfolioGalleryDetails::where(['tab_id'=>$portfolio])->delete();
                Portfolios::where(['id'=> $portfolio])->delete();
                return redirect()->back()->with('failed','Failed to save portfolio details');
            endif;
        }catch (\Exception $exception) {
            // echo $portfolio;
            // print_r($exception->getMessage());
            PortfolioDetails::where(['portfolio_id'=> $portfolio])->delete();
            PortfolioGalleryDetails::where(['tab_id'=>$portfolio])->delete();
            Portfolios::where(['id'=> $portfolio])->delete();
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function savePortfolio(Request $request)
    {
        request()->validate([
            'category'  =>  'required',
            'ProjectName'  =>  'required|string|max:255',
            'TitleName'  =>  'required|string|max:255',
            'SubTitleName'  =>  'string|max:255',
            'Logo' =>  'image|mimes:jpeg,png,jpg',
        ]);

        try {
            $logoImage = $this->uploadFile($request,'Logo','portfolio/logo');
            $sliderImages = $this->multiUploadFiles($request,'Images','portfolio/images');
            if(isset($sliderImages) && count($sliderImages) > 0):
                $sliders = implode(',',$sliderImages);
            else:
                $sliders = '';
            endif;
            $saveList = ['category_id' => $request->category, 'project_name' => $request->ProjectName, 'title' => $request->TitleName, 'subtitle' => $request->SubTitleName, 'logo' => $logoImage,'slide_images' => $sliders, 'amenities' => implode(',',$request->amenities), 'description'=> $request->Description, 'location' => $request->Location];
            $portfolio = Portfolio::create($saveList)->id;
            if($portfolio > 0):
                return redirect()->route('portfolio.list')->with('success','Successfully saved portfolio');
            else:
                if(file_exists($logoImage)):
                    unlink($logoImage);
                endif;
                foreach($sliderImages as $image):
                    if(file_exists($image)):
                        unlink($image);
                    endif;
                endforeach;

                return redirect()->back()->with('failed','Failed to save portfolio');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function portfolioList(Request $request)
    {
        $portfolios = Portfolios::where(['status'=>1])->orderBy('id','DESC')->get();
        return view('portfolio.portfolio_list', compact('portfolios'));
    }

    public function editPortfolio(Request $request)
    {
        if(isset($request->portfolio_id)):
            $portfolio = Portfolios::where('id', $request->portfolio_id)->first();
            $amenities = AmenitiesData::where(['status'=>1])->orderBy('created_at','DESC')->get();
            $categories = Categories::where('status', 1)->get();

            $textAlignments = $this->textAlignments;
            $theme = $this->theme;
            $imageSectionOptions = $this->imageSectionOptions;
            $gridColums = $this->gridColums;
            $gridAlignmentOptions = $this->gridAlignmentOptions;
            $gridContainerPositions = $this->gridContainerPositions;

            //Portfolio Tabs
            $about  = PortfolioDetails::where(['tab_name'=>'About','portfolio_id'=>$portfolio->id])->first();
            $location  = PortfolioDetails::where(['tab_name'=>'Location','portfolio_id'=>$portfolio->id])->first();
            $design  = PortfolioDetails::where(['tab_name'=>'Design','portfolio_id'=>$portfolio->id])->get();
            $amenities_facilities  = PortfolioDetails::where(['tab_name'=>'Amenities & Facilities','portfolio_id'=>$portfolio->id])->first();
            $lifeStyle  = PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'no','portfolio_id'=>$portfolio->id])->first();
            $lifeStyleTabs  = PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'yes','portfolio_id'=>$portfolio->id,'option_type'=>'tabs'])->get();
            $gallery  = PortfolioDetails::where(['tab_name'=>'Gallery','portfolio_id'=>$portfolio->id])->first();
            $enquire  = PortfolioDetails::where(['tab_name'=>'Enquire','portfolio_id'=>$portfolio->id])->first();
            $vitual_tour  = PortfolioDetails::where(['tab_name'=>'Vitual Tour','portfolio_id'=>$portfolio->id])->get();
            $floorplan_file  = PortfolioDetails::where(['tab_name'=>'FloorPlan','portfolio_id'=>$portfolio->id])->get();
            $brochure_file  = PortfolioDetails::where(['tab_name'=>'Brochure','portfolio_id'=>$portfolio->id])->first();

            return view('portfolio.portfolio_edit', compact('categories','portfolio','amenities','about','location','design','amenities_facilities','lifeStyle','lifeStyleTabs','gallery','vitual_tour','floorplan_file','brochure_file','enquire','textAlignments','theme','imageSectionOptions','gridColums','gridAlignmentOptions','gridContainerPositions'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit portfolio!');
        endif;
    }

    public function updatePortfolio(Request $request)
    {
        //dd($request->all());
        try{
            $portfolio = Portfolios::where('id', $request->portfolio_id)->first();
            //dd($portfolio);
            $portfolio_project_logo = $this->uploadFile($request,'portfolio_project_logo','portfolio/logo/'.$request->portfolio_category.'');
            if(isset($portfolio_project_logo) && file_exists($portfolio_project_logo)):
                if(file_exists($portfolio->logo)):
                    unlink($portfolio->logo);
                endif;
                $portfolio_project_logo = $portfolio_project_logo;
            else:
                $portfolio_project_logo = $portfolio->logo;
            endif;
            //echo $portfolio_project_logo;
            $portfolio_project_image = $this->uploadFile($request,'portfolio_project_image','portfolio/images/'.$request->portfolio_category.'');
            if(isset($portfolio_project_image) && file_exists($portfolio_project_image)):
                if(file_exists($portfolio->image)):
                    unlink($portfolio->image);
                endif;
                $portfolio_project_image = $portfolio_project_image;
            else:
                $portfolio_project_image = $portfolio->image;
            endif;
            //echo $portfolio_project_image;
            //exit;
            $portfolio_update = Portfolios::where('id', $portfolio->id)->update(['category_id'=>$request->portfolio_category,'project_name'=>$request->portfolio_project_name,'logo'=>$portfolio_project_logo,'image'=>$portfolio_project_image]);
            if($portfolio_update > 0):
                
                //About update data
                if(isset($request->about_title_name)):
                    $about = PortfolioDetails::where(['tab_name'=>'About','id'=>$request->about_id,'portfolio_id'=>$portfolio->id])->first();
                    $about_background_picture = $this->uploadFile($request,'about_background_picture','portfolio/backgroundImages/'.$request->portfolio_category.'');
                    $about_project_logo = $this->uploadFile($request,'about_project_logo','portfolio/logo/'.$request->portfolio_category.'');
                    if(isset($about->id) && $about->id == $request->about_id):
                        
                        if(isset($about_background_picture) && file_exists($about_background_picture)):
                            if(file_exists($about->background_image)):
                                unlink($about->background_image);
                            endif;
                            $about_background_picture = $about_background_picture;
                        else:
                            $about_background_picture = $about->background_image;
                        endif;

                        if(isset($about_project_logo) && file_exists($about_project_logo)):
                            if(file_exists($about->logo)):
                                unlink($about->logo);
                            endif;
                            $about_project_logo = $about_project_logo;
                        else:
                            $about_project_logo = $about->logo;
                        endif;

                        $about = PortfolioDetails::where(['portfolio_id'=>$portfolio->id,'id'=>$request->about_id])->update(['theme_color'=>$request->about_theme_color,'text_alignment'=>$request->about_text_alignment,'background_image'=>$about_background_picture,'logo'=>$about_project_logo,'title'=>$request->about_title_name,'description_1'=>$request->about_description,'description_2'=>$request->about_description_2]);
                    else:
                        if(isset($about_background_picture) && !file_exists($about_background_picture)):
                            $about_background_picture = '';
                        endif;

                        if(isset($about_project_logo) && !file_exists($about_project_logo)):
                            $about_project_logo = '';
                        endif;
                        //'bg_image_position'=>$request->about_image_position,
                        $about = PortfolioDetails::create(['portfolio_id' => $portfolio->id,'tab_name'=> 'About','theme_color'=>$request->about_theme_color,'text_alignment'=>$request->about_text_alignment,'background_image'=>$about_background_picture,'logo'=>$about_project_logo,'title'=>$request->about_title_name,'description_1'=>$request->about_description,'description_2'=>$request->about_description_2])->id;
                    endif;
                endif;
                
                //Location Tab
                if(isset($request->location_title_name)):
                    $location = PortfolioDetails::where(['tab_name'=>'Location','id'=>$request->location_id,'portfolio_id'=>$portfolio->id])->first();

                    $location_background_picture = $this->uploadFile($request,'location_background_picture','portfolio/backgroundImages/'.$request->portfolio_category.'');
                    $location_icon_image = $this->uploadFile($request,'location_icon_image','portfolio/locationImages/'.$request->portfolio_category.'');

                    if(isset($location->id) && $location->id == $request->location_id):

                        if(isset($location_background_picture) && file_exists($location_background_picture)):
                            if(file_exists($location->background_image)):
                                unlink($location->background_image);
                            endif;
                            $location_background_picture = $location_background_picture;
                        else:
                            $location_background_picture = $location->background_image;
                        endif;

                        if(isset($location_icon_image) && file_exists($location_icon_image)):
                            if(file_exists($location->icon_image)):
                                unlink($location->icon_image);
                            endif;
                            $location_icon_image = $location_icon_image;
                        else:
                            $location_icon_image = $location->icon_image;
                        endif;

                        $location = PortfolioDetails::where(['tab_name'=>'Location','id'=>$location->id,'portfolio_id' => $portfolio->id])->update(['theme_color' => $request->location_theme_color,'text_alignment' => $request->location_text_alignment,'background_image' => $location_background_picture,'title' => $request->location_title_name, 'description_1' => $request->location_description,'icon_image'=>$location_icon_image]);
                    else:
                        if(isset($location_background_picture) && !file_exists($location_background_picture)):
                            $location_background_picture = '';
                        endif;

                        if(isset($location_icon_image) && !file_exists($location_icon_image)):
                            $location_icon_image = '';
                        endif;

                        $location = PortfolioDetails::create(['portfolio_id'=>$portfolio->id,'tab_name'=>'Location','theme_color'=>$request->location_theme_color,'text_alignment'=>$request->location_text_alignment,'background_image'=>$location_background_picture,'title'=>$request->location_title_name,'description_1'=>$request->location_description,'icon_image'=>$location_icon_image])->id;
                    endif;
                endif;

                //Gallery
                if(isset($request->gallery_title_name)):
                    $gallery = PortfolioDetails::where(['tab_name'=>'Gallery','id'=>$request->gallery_id,'portfolio_id'=>$portfolio->id])->first();
                    if(isset($gallery) && $gallery->id == $request->gallery_id):

                        $updatedGallery = PortfolioDetails::where(['tab_name'=>'Gallery','id'=>$request->gallery_id,'portfolio_id'=>$portfolio->id])->update(['title'=>$request->gallery_title_name,'description_1'=>$request->gallery_description]);

                        $gallery_slider_images = $this->multiUploadFiles($request,'gallery_slider_images','portfolio/galleryImages/'.$request->portfolio_category.'');
                        if(count($gallery_slider_images) > 0):
                            foreach($gallery_slider_images as $key => $givalue):
                                $galleryImage = PortfolioGalleryDetails::create(['tab_id'=>$portfolio->id,'title'=>'Gallery_slider_'.$key,'image'=>$givalue,'type'=>'gallery_slider_images'])->id;
                            endforeach;
                        endif;
                    else:
                        $gallery = PortfolioDetails::create(['portfolio_id'=> $portfolio->id,'tab_name'=>'Gallery','title'=>$request->gallery_title_name,'description_1'=>$request->gallery_description])->id;
                        $gallery_slider_images = $this->multiUploadFiles($request,'gallery_slider_images','portfolio/galleryImages/'.$request->portfolio_category.'');
                        if(count($gallery_slider_images) > 0):
                            foreach($gallery_slider_images as $key => $givalue):
                                $galleryImage = PortfolioGalleryDetails::create(['tab_id'=>$portfolio->id,'title'=>'Gallery_slider_'.$key,'image'=>$givalue,'type'=>'gallery_slider_images'])->id;
                            endforeach;
                        endif;
                    endif;
                endif;

                //Virtual Tour
                if(count($request->vitual_tour_title) > 0):
                    PortfolioDetails::where(['portfolio_id' => $portfolio->id,'tab_name'=>'Vitual Tour'])->delete();
                    foreach($request->vitual_tour_title as $key => $vtvalue):
                        $vitual_tour  = PortfolioDetails::create(['portfolio_id' => $portfolio->id,'tab_name'=>'Vitual Tour','title'=>$vtvalue,'links'=>$request->vitual_tour_url[$key]])->id;
                    endforeach;
                endif;

                //enquiry
                if(isset($request->enquire_theme_color) && isset($request->enquire_text_alignment)):
                    $enquire = $enquire  = PortfolioDetails::where(['tab_name'=>'Enquire','id'=>$request->enquire_id,'portfolio_id'=>$portfolio->id])->first();
                    $enquireImage = $this->uploadFile($request,'enquire_background_image','portfolio/enquire/'.$request->portfolio_category.'');
                    if(isset($enquire) && $enquire->id == $request->enquire_id):
                        if(isset($enquireImage) && file_exists($enquireImage)):
                            if(file_exists($enquire->background_image)):
                                unlink($enquire->background_image);
                            endif;
                            $enquireImage = $enquireImage;
                        else:
                            $enquireImage = $enquire->background_image;
                        endif;
                        PortfolioDetails::where(['tab_name'=>'Enquire','id'=>$request->enquire_id,'portfolio_id'=>$portfolio->id])->update(['theme_color'=>$request->enquire_theme_color,'text_alignment'=>$request->enquire_text_alignment,'background_image'=>$enquireImage,]);
                    else:
                        if(isset($enquireImage) && !file_exists($enquireImage)):
                            $enquireImage = '';
                        endif;
                        PortfolioDetails::create(['portfolio_id'=> $portfolio->id,'tab_name'=> 'Enquire','theme_color'=>$request->enquire_theme_color,'text_alignment'=>$request->enquire_text_alignment,'background_image'=>$enquireImage,])->id;
                    endif;
                endif;

                //Brochure file
                if(isset($request->brochure_file)):
                    $brochure  = PortfolioDetails::where(['tab_name'=>'Brochure','id'=>$request->brochure_file_id,'portfolio_id'=>$portfolio->id])->first();
                    $brochure_file = $this->uploadFile($request,'brochure_file','portfolio/brochures/'.$request->portfolio_category.'');

                    if(isset($brochure) && $brochure->id == $request->brochure_file_id):
                        if(isset($brochure_file) && file_exists($brochure_file)):
                            if(file_exists($brochure->links)):
                                unlink($brochure->links);
                            endif;
                            $brochure_file = $brochure_file;
                        else:
                            $brochure_file = $brochure->links;
                        endif;
                        $lifeStyle = PortfolioDetails::where(['tab_name'=>'Brochure','id'=>$request->brochure_file_id,'portfolio_id'=>$portfolio->id])->update(['links'=>$brochure_file]);
                    else:
                        if(isset($brochure_file) && !file_exists($brochure_file)):
                            $brochure_file = '';
                        endif;
                        $lifeStyle = PortfolioDetails::create(['portfolio_id'=> $portfolio->id,'tab_name'=>'Brochure','title'=>'Brochure File','links'=>$brochure_file]);
                    endif;
                endif;

                //Amenities & Facilities
                if(isset($request->amenities_facilities_title_name)):

                    $amenities_facilities_logo = $this->uploadFile($request,'amenities_facilities_logo','portfolio/logoImages/'.$request->portfolio_category.'');

                    $amenities_facilities = PortfolioDetails::where(['tab_name'=>'Amenities & Facilities','portfolio_id'=>$portfolio->id,'id'=>$request->amenities_facilities_id])->first();

                    $amenities = '';
                    if(count($request->amenities_facilities_amenities) > 0):
                        $amenities = implode(',',$request->amenities_facilities_amenities);
                    endif;

                    if(isset($amenities_facilities) && $amenities_facilities->id == $request->amenities_facilities_id):

                        if(isset($amenities_facilities_logo) && file_exists($amenities_facilities_logo)):
                            if(file_exists($amenities_facilities->logo)): unlink($amenities_facilities->logo); endif;
                            $amenities_facilities_logo = $amenities_facilities_logo;
                        else:
                            $amenities_facilities_logo = $amenities_facilities->logo;
                        endif;

                        $amenities_facilities = PortfolioDetails::where(['tab_name'=>'Amenities & Facilities','portfolio_id'=>$portfolio->id,'id'=>$request->amenities_facilities_id])->update(['title' => $request->amenities_facilities_title_name,'description_1' => $request->amenities_facilities_description,'amenities' => $amenities,'logo'=>$amenities_facilities_logo]);

                        $amenitieSliders = $this->multiUploadFiles($request,'amenities_facilities_gallery_images','portfolio/amenitieSliders/'.$request->portfolio_category.'');
                        if(count($amenitieSliders) > 0):
                            foreach($amenitieSliders as $key => $aivalue):
                                $amenitieImage = PortfolioGalleryDetails::create(['tab_id'=>$portfolio->id,'title'=>'Amenities_Slider_'.$key,'image'=>$aivalue,'type'=>'amenities_facilities_gallery_images']);
                            endforeach;
                        endif;
                    else:
                        
                        if(isset($amenities_facilities_logo) && !file_exists($amenities_facilities_logo)):
                            $amenities_facilities_logo = '';
                        endif;

                        $amenities_facilities = PortfolioDetails::create(['portfolio_id' => $portfolio->id,'tab_name' => 'Amenities & Facilities','title' => $request->amenities_facilities_title_name,'description_1' => $request->amenities_facilities_description,'amenities' => $amenities,'logo'=>$amenities_facilities_logo])->id;

                        $amenitieSliders = $this->multiUploadFiles($request,'amenities_facilities_gallery_images','portfolio/amenitieSliders/'.$request->portfolio_category.'');
                        if(count($amenitieSliders) > 0):
                            foreach($amenitieSliders as $key => $aivalue):
                                $amenitieImage = PortfolioGalleryDetails::create(['tab_id'=>$portfolio->id,'title'=>'Amenities_Slider_'.$key,'image'=>$aivalue,'type'=>'amenities_facilities_gallery_images']);
                            endforeach;
                        endif;
                    endif;
                endif;

                //floorplan_file
                $floorplans = PortfolioDetails::where(['tab_name'=>'FloorPlan','portfolio_id'=>$portfolio->id])->get();
                if(count($floorplans) > 0):
                    //dd($floorplans);
                    $floorplanExistingFileUpdate = $this->multiUploadFiles($request,'floorplan_existing_file_update','portfolio/floorplan/'.$request->portfolio_category.'');
                    //print_r($request->floorplan_file_ids);
                    foreach($floorplans as $fpkey => $fps):
                        if(in_array($fps->id, $request->floorplan_file_ids)):
                            if(isset($floorplanExistingFileUpdate[$fpkey]) && file_exists($floorplanExistingFileUpdate[$fpkey])):
                                if(file_exists($fps->links)):
                                    unlink($fps->links);
                                endif;
                                $floorPlanFile = $floorplanExistingFileUpdate[$fpkey];
                            else:
                                $floorPlanFile = $fps->links;
                            endif;
                            //echo $fps->id.'- Update <br>';
                            PortfolioDetails::where(['tab_name'=>'FloorPlan','id'=>$fps->id,'portfolio_id'=>$portfolio->id])->update(['portfolio_id'=> $portfolio->id,'links'=>$floorPlanFile,'title'=>$request->floorplan_existing_file_update_title[$fpkey]]);
                        else:
                            //echo $fps->id.'- Delete <br>';
                            if(isset($fps->links) && file_exists($fps->links)):
                                unlink($fps->links);
                            endif;
                            PortfolioDetails::where(['id'=>$fps->id,'portfolio_id'=>$portfolio->id])->delete();
                        endif;
                    endforeach;
                    
                    if(isset($request->floorplan_file)):
                        $floorplanNewFileInsert = $this->multiUploadFiles($request,'floorplan_file','portfolio/floorplan/'.$request->portfolio_category.'');
                        if(count($floorplanNewFileInsert) > 0):
                            foreach($floorplanNewFileInsert as $key => $fpvalue):
                                if(isset($fpvalue) && file_exists($fpvalue)):
                                    PortfolioDetails::create(['portfolio_id'=> $portfolio->id,'tab_name'=>'FloorPlan','links'=>$fpvalue,'title'=>$request->floorplan_file_title[$fpkey]])->id;
                                endif;
                            endforeach;
                        endif;
                    endif;

                else:
                    if(isset($request->floorplan_file)):
                        $floorplanNewFile = $this->multiUploadFiles($request,'floorplan_file','portfolio/floorplan/'.$request->portfolio_category.'');
                        if(count($floorplanNewFile) > 0):
                            foreach($floorplanNewFile as $key => $fpvalue):
                                if(isset($fpvalue) && file_exists($fpvalue)):
                                    PortfolioDetails::create(['portfolio_id'=> $portfolio->id,'tab_name'=>'FloorPlan','title'=>'Floorplan File','links'=>$fpvalue])->id;
                                endif;
                            endforeach;
                        endif;
                    endif;
                endif;

                //Lifestyle
                $lifeStyle  = PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'no','portfolio_id'=>$portfolio->id])->get();
                $lifeStyleTabs  = PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'yes','portfolio_id'=>$portfolio->id,'option_type'=>'tabs'])->get();
                if(count($lifeStyle) > 0):
                    $lifeStyle = $lifeStyle[0];
                    $lifeStyleSliderImages = $this->uploadFile($request,'lifeStyle_slider_images','portfolio/lifeStyle/sliderImages/'.$request->portfolio_category.'');
                    if(isset($lifeStyleSliderImages) && file_exists($lifeStyleSliderImages)):
                        if(isset($lifeStyle->background_image) && file_exists($lifeStyle->background_image)):
                            unlink($lifeStyle->background_image);
                        endif;
                        $lifeStyleSliderImage = $lifeStyleSliderImages;
                    else:
                        $lifeStyleSliderImage = $lifeStyle->background_image;
                    endif;
                    $updateLifeStyle = PortfolioDetails::where(['id'=>$lifeStyle->id,'portfolio_id'=>$portfolio->id])->update(['title'=>$request->lifeStyle_title_name,'description_1'=>$request->lifeStyle_description,'background_image'=>$lifeStyleSliderImage]);

                    //Tabs
                    if(count($lifeStyleTabs) > 0 && isset($request->lifestyle_tab_id)): //
                        $lifestyleTabExistingImageUpdate = $this->multiUploadFiles($request,'lifestyle_tab_existing_image_update','portfolio/lifestyleTabImages/'.$request->portfolio_category.'');
                        foreach($lifeStyleTabs as $lskey => $lifeStyleTab):
                            if(in_array($lifeStyleTab->id, $request->lifestyle_tab_id)):
                                if(isset($lifestyleTabExistingImageUpdate[$lskey]) && file_exists($lifestyleTabExistingImageUpdate[$lskey])):
                                    if(file_exists($lifeStyleTab->background_image)):
                                        unlink($lifeStyleTab->background_image);
                                    endif;
                                    $lifeStyleTabUpdatedImage = $lifestyleTabExistingImageUpdate[$lskey];
                                else:
                                    $lifeStyleTabUpdatedImage = $lifeStyleTab->background_image;
                                endif;
                                //echo $lifeStyleTab->id." - Update <br>";
                                $updateTab = PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'yes','portfolio_id'=>$portfolio->id,'option_type'=>'tabs','id'=>$lifeStyleTab->id])->update(['title' => $request->lifestyle_tab_existing_title_name[$lskey], 'description_1' => $request->lifestyle_tab_existing_description[$lskey], 'option_type' => 'tabs','option_title' => $request->lifestyle_tab_existing_name[$lskey], 'background_image'=> $lifeStyleTabUpdatedImage]);
                            else:
                                //echo $lifeStyleTab->id." - Delete <br>";
                                if(file_exists($lifeStyleTab->background_image)):
                                    unlink($lifeStyleTab->background_image);
                                endif;
                                PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'yes','portfolio_id'=>$portfolio->id,'option_type'=>'tabs','id'=>$lifeStyleTab->id])->delete();
                            endif;
                        endforeach;
                    else:
                        foreach($lifeStyleTabs as $lifeStyleTab):
                            if(file_exists($lifeStyleTab->background_image)):
                                unlink($lifeStyleTab->background_image);
                            endif;
                            PortfolioDetails::where(['tab_name'=>'LifeStyle','sub_tab_name'=>'yes','portfolio_id'=>$portfolio->id,'option_type'=>'tabs','id'=>$lifeStyleTab->id])->delete();
                        endforeach;
                    endif;

                    if(isset($request->lifestyle_tab_name)): // 
                        if(count($request->lifestyle_tab_name) > 0):
                            $lifestyleGalleryTabImages = $this->multiUploadFiles($request,'lifestyle_gallery_tab_images','portfolio/lifestyleTabImages/'.$request->portfolio_category.'');

                            foreach($request->lifestyle_tab_name as $key => $tabname):
                                if(isset($lifestyleGalleryTabImages[$key]) && file_exists($lifestyleGalleryTabImages[$key])):
                                    $lifestyleGalleryTabImage = $lifestyleGalleryTabImages[$key];
                                else:
                                    $lifestyleGalleryTabImage = '';
                                endif;
                                $tab = PortfolioDetails::create(['portfolio_id' => $portfolio->id, 'tab_name' => 'LifeStyle','sub_tab_name'=>'yes', 'title' => $request->lifestyle_tab_title_name[$key], 'description_1' => $request->lifestyle_tab_description[$key], 'option_type' => 'tabs','option_title' => $request->lifestyle_tab_name[$key], 'background_image'=> $lifestyleGalleryTabImage])->id;
                            endforeach;
                        endif;
                    endif;

                else:
                    if(isset($request->lifeStyle_title_name)):
                        
                        $lifeStyle_slider_images = $this->uploadFile($request,'lifeStyle_slider_images','portfolio/lifeStyle/sliderImages/'.$request->portfolio_category.'');
                        if(isset($lifeStyle_slider_images) && !file_exists($lifeStyle_slider_images)):
                            $lifeStyle_slider_images = '';
                        endif;
    
                        $lifeStyle = PortfolioDetails::create(['portfolio_id'=> $portfolio,'tab_name'=>'LifeStyle','sub_tab_name'=>'no','title'=>$request->lifeStyle_title_name,'description_1'=>$request->lifeStyle_description,'background_image'=>$lifeStyle_slider_images])->id;
    
                        if(isset($request->lifestyle_tab_name)): // 
                            if(count($request->lifestyle_tab_name) > 0):
                                $lifestyle_gallery_tab_images = $this->multiUploadFiles($request,'lifestyle_gallery_tab_images','portfolio/lifestyleTabImages/'.$request->portfolio_category.'');
    
                                foreach($request->lifestyle_tab_name as $key => $tabname):
                                    if(isset($lifestyle_gallery_tab_images[$key])):
                                        $lifestyleGalleryTabImages = $lifestyle_gallery_tab_images[$key];
                                    else:
                                        $lifestyleGalleryTabImages = '';
                                    endif;
                                    $tab = PortfolioDetails::create(['portfolio_id' => $portfolio, 'tab_name' => 'LifeStyle','sub_tab_name'=>'yes', 'title' => $request->lifestyle_tab_title_name[$key], 'description_1' => $request->lifestyle_tab_description[$key], 'option_type' => 'tabs','option_title' => $request->lifestyle_tab_name[$key], 'background_image'=> $lifestyleGalleryTabImages])->id;
                                endforeach;
                            endif;
                        endif;
    
                    endif;
                endif;

                //dd($request->all());

                //Design
                $design  = PortfolioDetails::where(['tab_name'=>'Design','portfolio_id'=>$portfolio->id])->get();
                
                if(count($design) > 0):
                    $designWithTabs  = PortfolioDetails::where(['tab_name'=>'Design','option_type'=>'withTabs','portfolio_id'=>$portfolio->id])->get();
                    $designWithOutTabs  = PortfolioDetails::where(['tab_name'=>'Design','option_type'=>'withOutTabs','portfolio_id'=>$portfolio->id])->get();
                    
                    
                    if(count($designWithTabs) > 0):
                        //$designWithOutTabs = $designWithOutTabs[0];
                        if($request->design_tabs_type == 'withTabs'):
                            // echo 'delete withOutTabs <br>';
                            // echo 'update withTabs <br>';
                            $designGallerySildersWithTabs = $this->multiUploadFiles($request,'design_gallery_existing_image_update','portfolio/designGalleryImages/'.$request->portfolio_category.'');
                            foreach($designWithTabs as $dtkey => $designWithTab):
                                if(in_array($designWithTab->id, $request->design_tab_id)):
                                    if(isset($designGallerySildersWithTabs[$dtkey]) && file_exists($designGallerySildersWithTabs[$dtkey])):
                                        if(file_exists($designWithTab->background_image)):
                                            unlink($designWithTab->background_image);
                                        endif;
                                        $designWithTabGalleryImage = $designGallerySildersWithTabs[$dtkey];
                                    else:
                                        $designWithTabGalleryImage = $designWithTab->background_image;
                                    endif;
                                    PortfolioDetails::where(['option_type'=>'withTabs','id'=>$designWithTab->id,'portfolio_id'=>$portfolio->id])->update(['portfolio_id' => $portfolio->id, 'tab_name' => 'Design', 'title' => $request->design_tab_existing_name[$dtkey], 'description_1' => $request->design_tab_existing_description[$dtkey], 'option_type' => 'withTabs','option_title' => $request->design_tab_existing_name[$dtkey], 'background_image'=> $designWithTabGalleryImage]);
                                else:
                                    if(file_exists($designWithTab->background_image)):
                                        unlink($designWithTab->background_image);
                                    endif;
                                    PortfolioDetails::where(['option_type'=>'withTabs','id'=>$designWithTab->id,'portfolio_id'=>$portfolio->id])->delete();
                                endif;
                            endforeach;

                            //insert new tabs
                            if(count($request->design_tab_name) > 0):
                                $design_gallery_silders = $this->multiUploadFiles($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');
        
                                foreach($request->design_tab_name as $key => $tabname):
                                    $tab = PortfolioDetails::create(['portfolio_id' => $portfolio->id, 'tab_name' => 'Design', 'title' => $request->design_title_name[$key], 'description_1' => $request->design_description[$key], 'option_type' => 'withTabs','option_title' => $request->design_tab_name[$key], 'background_image'=> $design_gallery_silders[$key]])->id;
                                endforeach;
                            endif;

                        elseif($request->design_tabs_type == 'withOutTabs'):
                            //echo 'Insert withOutTabs <br>';
                            $designGalleryImagesWithOutTab = $this->uploadFile($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');
                            if(isset($designGalleryImagesWithOutTab) && !file_exists($designGalleryImagesWithOutTab)):
                                $designGalleryImagesWithOutTab = '';
                            endif;
                            $tab = PortfolioDetails::create(['portfolio_id' => $portfolio->id, 'tab_name' => 'Design', 'title' => $request->design_title_name_s, 'description_1' => $request->design_description_s, 'option_type' => 'withOutTabs','background_image'=> $designGalleryImagesWithOutTab])->id;

                            //echo 'delete withTabs <br>';
                            //delete withTab Details
                            if(count($designWithTabs) > 0):
                                foreach($designWithTabs as $dtkey => $designWithTab):
                                    if(file_exists($designWithTab->background_image)):
                                        unlink($designWithTab->background_image);
                                    endif;
                                    PortfolioDetails::where(['option_type'=>'withTabs','id'=>$designWithTab->id,'portfolio_id'=>$portfolio->id])->delete();
                                endforeach;
                            endif;
                        endif;
                    endif;

                    if(count($designWithOutTabs) > 0):
                        dd($designWithTabs);
                        $designWithOutTabs = $designWithOutTabs[0];
                        if($request->design_tabs_type == 'withTabs'):
                            if(count($request->design_tab_name) > 0):
                                $design_gallery_silders = $this->multiUploadFiles($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');
        
                                foreach($request->design_tab_name as $key => $tabname):
                                    $tab = PortfolioDetails::create(['portfolio_id' => $portfolio->id, 'tab_name' => 'Design', 'title' => $request->design_title_name[$key], 'description_1' => $request->design_description[$key], 'option_type' => 'withTabs','option_title' => $request->design_tab_name[$key], 'background_image'=> $design_gallery_silders[$key]])->id;
                                endforeach;
                            endif;

                            if(file_exists($designWithOutTabs->background_image)):
                                unlink($designWithOutTabs->background_image);
                            endif;
                            PortfolioDetails::where(['tab_name'=>'Design','option_type'=>'withOutTabs','portfolio_id'=>$portfolio->id,'id'=>$designWithOutTabs->id])->delete();
                        elseif($request->design_tabs_type == 'withOutTabs'):
                            $designGalleryImagesWithOutTab = $this->uploadFile($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');
                            if(isset($designGalleryImagesWithOutTab) && file_exists($designGalleryImagesWithOutTab)):
                                if(file_exists($designWithOutTabs->background_image)):
                                    unlink($designWithOutTabs->background_image);
                                endif;
                                $designGalleryImagesWithOutTab = $designGalleryImagesWithOutTab;
                            else:
                                $designGalleryImagesWithOutTab = $designWithOutTabs->background_image;
                            endif;
                            PortfolioDetails::where(['tab_name'=>'Design','option_type'=>'withOutTabs','portfolio_id'=>$portfolio->id,'id'=>$designWithOutTabs->id])->update(['title' => $request->design_title_name_s, 'description_1' => $request->design_description_s,'background_image'=> $designGalleryImagesWithOutTab]);
                        endif;
                    endif;
                else:
                    if($request->design_tabs_type == 'withTabs'):
                        if(count($request->design_tab_name) > 0):
                            $design_gallery_silders = $this->multiUploadFiles($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');
    
                            foreach($request->design_tab_name as $key => $tabname):
                                $tab = PortfolioDetails::create(['portfolio_id' => $portfolio->id, 'tab_name' => 'Design', 'title' => $request->design_title_name[$key], 'description_1' => $request->design_description[$key], 'option_type' => 'withTabs','option_title' => $request->design_tab_name[$key], 'background_image'=> $design_gallery_silders[$key]])->id;
                            endforeach;
                        endif;
                    elseif($request->design_tabs_type == 'withOutTabs'):
    
                        $design_gallery_images = $this->uploadFile($request,'design_gallery_images','portfolio/designGalleryImages/'.$request->portfolio_category.'');
                        if(isset($design_gallery_images) && !file_exists($design_gallery_images)):
                            $design_gallery_images = '';
                        endif;
    
                        $tab = PortfolioDetails::create(['portfolio_id' => $portfolio->id, 'tab_name' => 'Design', 'title' => $request->design_title_name_s, 'description_1' => $request->design_description_s, 'option_type' => 'withOutTabs','background_image'=> $design_gallery_images])->id;
                    endif;
                endif; 
                


                //dd($request->all());
                return redirect()->route('portfolio.list')->with('success','Successfully updated portfolio');
            else:
                //echo "Failed to update portfolio details";
                return redirect()->back()->with('failed','Failed to update portfolio details');
            endif;

        }catch (\Exception $exception) {
            //print_r($exception->getMessage());
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }


    public function updatePortfolio_backup(Request $request)
    {
        request()->validate([
            'category'  =>  'required',
            'ProjectName'  =>  'required|string|max:255',
            'TitleName'  =>  'required|string|max:255',
            'SubTitleName'  =>  'string|max:255',
            'Logo' =>  'image|mimes:jpeg,png,jpg',
        ]);
        try {
            $portfolio = Portfolio::where('id', $request->portfolio_id)->first();
            if(isset($portfolio)):
                $logoImage = $this->uploadFile($request,'Logo','portfolio/logo');
                if(!empty($logoImage)):
                    if(file_exists($portfolio->logo)):
                        @unlink($portfolio->logo);
                    endif;
                    $logoImage = $logoImage;
                else:
                    $logoImage = $portfolio->logo;
                endif;

                $sliderImages = $this->multiUploadFiles($request,'Images','portfolio/images');
                if(isset($sliderImages) && count($sliderImages) > 0):
                    $sliders = implode(',',$sliderImages);
                    $sliders = $sliders.','.implode(',',$request->uploaded_images);
                else:
                    $sliders = implode(',',$request->uploaded_images);
                endif;
                $updatePortfolio = ['category_id' => $request->category, 'project_name' => $request->ProjectName, 'title' => $request->TitleName, 'subtitle' => $request->SubTitleName, 'logo' => $logoImage,'slide_images' => $sliders, 'amenities' => implode(',',$request->amenities), 'description'=> $request->Description, 'location' => $request->Location];
                $portfolio = Portfolio::where('id', $request->portfolio_id)->update($updatePortfolio);
                if($portfolio > 0):
                    return redirect()->route('portfolio.list')->with('success','Successfully updated portfolio');
                else:
                    if(file_exists($logoImage)):
                        unlink($logoImage);
                    endif;
                    foreach($sliderImages as $image):
                        if(file_exists($image)):
                            unlink($image);
                        endif;
                    endforeach;

                    return redirect()->back()->with('failed','Failed to update portfolio');
                endif;
            else:
                return redirect()->back()->with('failed','Invalid portfolio to update.');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function deletePortfolio(Request $request)
    {
        $portfolio = Portfolios::where('id', $request->portfolio_id)->first();
        try{
            $portfolio_id = $portfolio->id;
            $portfolio_delete = Portfolios::where('id', $portfolio_id)->delete();
            if($portfolio_delete > 0):
                $portfolioDetails = PortfolioDetails::where('portfolio_id', $portfolio_id)->get();
                foreach($portfolioDetails as $pvalue):
                    if(file_exists($pvalue->background_image)):
                        unlink($pvalue->background_image);
                    endif;

                    if(file_exists($pvalue->logo)):
                        unlink($pvalue->logo);
                    endif;

                    if(file_exists($pvalue->icon_image)):
                        unlink($pvalue->icon_image);
                    endif;
                    
                    if(file_exists($pvalue->upload)):
                        unlink($pvalue->upload);
                    endif;
                    
                    if(file_exists($pvalue->links) && ($pvalue->tab_name == 'FloorPlan' || $pvalue->tab_name == 'Brochure')):
                        unlink($pvalue->links);
                    endif;
                endforeach;
                PortfolioDetails::where('portfolio_id', $portfolio_id)->delete();

                $gallery = PortfolioGalleryDetails::where('tab_id', $portfolio_id)->get();
                foreach($gallery as $value):
                    if(file_exists($value->image)):
                        unlink($value->image);
                    endif;
                endforeach;
                PortfolioGalleryDetails::where('tab_id', $portfolio_id)->delete();
                
                return redirect()->route('portfolio.list')->with('success','Successfully delete portfolio');
            else:
                return redirect()->back()->with('failed','Invalid request to delete portfolio');
            endif;
        }catch(\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function deletePortfolio_backup(Request $request)
    {
        $portfolio = Categories::where('id', $request->portfolio_id)->first();
        if(isset($portfolio)):
            try {
                $logo = $portfolio->logo;
                $slideImages = $portfolio->slide_images;
                //$portfolioDelete = Portfolio::where('id', $request->portfolio_id)->delete();
                $portfolioDelete = Portfolio::where('id', $request->portfolio_id)->update(['status'=>0]);
                if($portfolioDelete > 0):
                    /*if(file_exists($logo)):
                        @unlink($logo);
                    endif;
                    foreach ($slideImages as $images):
                        if(file_exists($images)):
                            @unlink($images);
                        endif;
                    endforeach;*/
                    return redirect()->route('portfolio.list')->with('success','Successfully deleted portfolio');
                else:
                    return redirect()->back()->with('failed','Failed to delete portfolio');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','invalid request to delete category');
        endif;
    }

    //done
    public function deleteImagesPortfolio(Request $request){
        $portfolio = PortfolioGalleryDetails::where(['id'=>$request->gallery_image_id,'tab_id'=>$request->portfolioId])->first();
        if(isset($portfolio) && file_exists($portfolio->image)):
            if(file_exists($portfolio->image)):
                @unlink($portfolio->image);
            endif;
            PortfolioGalleryDetails::where(['id'=>$request->gallery_image_id,'tab_id'=>$request->portfolioId])->delete();
            $data = array('res'=>true,'message'=>'Image deleted');
        else:
            $data = array('res'=>false,'message'=>'No Image found to delete.');
        endif;
        echo json_encode($data);
    }

    public function deleteImagesPortfolio_backup(Request $request){
        $portfolio = Portfolio::where(['id'=>$request->portfolioId])->first();
        if(isset($portfolio) > 0 && !empty($portfolio->slide_images)):
            $images = explode(',',$portfolio->slide_images);
            if(in_array($request->portfolioImage, $images)):
                if(file_exists($request->portfolioImage)):
                    @unlink($request->portfolioImage);
                endif;
                $key = array_search($request->portfolioImage, $images);
                array_splice($images,$key,1);
                $resetImages = array_values($images);
                $uploadImages = implode(',',$resetImages);
                Portfolio::where(['id'=>$request->portfolioId])->update(['slide_images'=>$uploadImages]);
                $data = array('res'=>true,'message'=>'Image deleted');
            else:
                $data = array('res'=>false,'message'=>'No Image found to delete.');
            endif;
        else:
            $data = array('res'=>false,'message'=>'Unable to delete image.');
        endif;
        echo json_encode($data);
    }
}
