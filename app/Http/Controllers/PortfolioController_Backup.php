<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmenitiesDataModel as AmenitiesData;
use App\CategoriesModel as Categories;
use App\PortfolioModel as Portfolio;

class PortfolioController extends Controller
{
    public function portfolioAdd(Request $request)
    {
        $categories = Categories::where('status', 1)->get();
        $amenities = AmenitiesData::where(['status'=>1])->orderBy('created_at','DESC')->get();
        return view('portfolio.portfolio_add', compact('amenities','categories'));
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
        $portfolios = Portfolio::where(['status'=>1])->get();
        return view('portfolio.portfolio_list', compact('portfolios'));
    }

    public function editPortfolio(Request $request)
    {
        if(isset($request->portfolio_id)):
            $portfolio = Portfolio::where('id', $request->portfolio_id)->first();
            $amenities = AmenitiesData::where(['status'=>1])->orderBy('created_at','DESC')->get();
            $categories = Categories::where('status', 1)->get();
            return view('portfolio.portfolio_edit', compact('categories','portfolio','amenities'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit portfolio!');
        endif;
    }

    public function updatePortfolio(Request $request)
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

    public function deleteImagesPortfolio(Request $request){
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
