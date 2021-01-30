<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnersbrandsCategoriesModel as PartnersBrandsCategories;
use App\PartnersbrandsModel as PartnersBrands;

class PartnersbrandsController extends Controller
{
    public function categories(Request $request)
    {
        $categories = PartnersBrandsCategories::orderBy('id','DESC')->get();
        return view('partners_brands.categories', compact('categories'));
    }

    public function categorySave(Request $request)
    {
        request()->validate([
            'title'  =>  'required|string|max:255',
        ]);

        try {
            $category = PartnersBrandsCategories::create(['name' => $request->title])->id;
            if($category > 0):
                return redirect()->back()->with('success','Successfully saved category');
            else:
                return redirect()->back()->with('failed','Failed to save category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function categoryUpdate(Request $request)
    {
        request()->validate([
            'title'  =>  'required|string|max:255',
        ]);
        $category = PartnersBrandsCategories::where('id', $request->category_id)->first();
        if(isset($category)):
            try {
                $categoryUpdate = PartnersBrandsCategories::where('id', $request->category_id)->update(['name' => $request->title]);
                if($categoryUpdate > 0):
                    return redirect()->route('partners.brands.categories')->with('success','Successfully updated category');
                else:
                    return redirect()->back()->with('failed','Failed to update category');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('warning','Invalid request to update category');
        endif;
    }

    public function categoryEdit(Request $request)
    {
        $categories = PartnersBrandsCategories::orderBy('id','DESC')->get();
        $category = PartnersBrandsCategories::where('id', $request->category_id)->first();
        return view('partners_brands.categories_edit', compact('categories','category'));
    }

    public function categoryDelete(Request $request){
        $category = PartnersBrandsCategories::where('id', $request->category_id)->first();
        if(isset($category)):
            try {
                $categoryDelete = PartnersBrandsCategories::where('id', $request->category_id)->delete();
                if($categoryDelete > 0):
                    //Delete related data partners and brands data
                    $partnerBrands = PartnersBrands::where('category_id', $request->category_id)->get();
                    foreach ($partnerBrands as $partnerBrand):
                        if(isset($partnerBrand->image) && file_exists($partnerBrand->image)):
                            unlink($partnerBrand->image);
                        endif;
                       PartnersBrands::where('id', $partnerBrand->id)->delete();
                    endforeach;

                    return redirect()->route('partners.brands.categories')->with('success','Successfully deleted category');
                else:
                    return redirect()->back()->with('failed','Failed to delete category');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','invalid request to delete category');
        endif;
    }

    //Partners Brands
    public function PartnersBrands(Request $request)
    {
        $partnerBrands = PartnersBrands::orderBy('id','DESC')->get();
        $categories = PartnersBrandsCategories::orderBy('id','DESC')->get();
        return view('partners_brands.partners_brands_index', compact('partnerBrands','categories'));
    }

    public function PartnersBrandSave(Request $request)
    {
        request()->validate([
            'category_id'  =>  'required',
            'name'  =>  'required|string|max:255',
            'image' =>  'required|image|mimes:jpeg,png,jpg'
        ]);
        try {
            $brandImage = $this->uploadFile($request,'image','categories');
            $partnerBrandSave = PartnersBrands::create(['category_id'=>$request->category_id,'name' => $request->name, 'image' => $brandImage])->id;
            if($partnerBrandSave > 0):
                return redirect()->back()->with('success','Successfully saved Partner & Brand');
            else:
                if(isset($brandImage) && file_exists($brandImage)):
                    unlink($brandImage);
                endif;
                return redirect()->back()->with('failed','Failed to save Partner & Brand');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function PartnersBrandsEdit(Request $request)
    {
        $partnerBrands = PartnersBrands::orderBy('id','DESC')->get();
        $partnerBrand = PartnersBrands::where('id', $request->partnerBrand_id)->first();
        $categories = PartnersBrandsCategories::orderBy('id','DESC')->get();
        return view('partners_brands.partners_brands_index', compact('partnerBrands','categories','partnerBrand'));
    }

    public function PartnersBrandUpdate(Request $request)
    {
        request()->validate([
            'category_id'  =>  'required',
            'name'  =>  'required|string|max:255',
            'image' =>  'image|mimes:jpeg,png,jpg'
        ]);

        $partnerBrand = PartnersBrands::where('id', $request->partnerBrandId)->first();
        if(isset($partnerBrand) && $partnerBrand->id == $request->partnerBrandId):
            try {
                $brandImage = $this->uploadFile($request,'image','categories');
                if(isset($brandImage) && file_exists($brandImage)):
                    if(isset($partnerBrand->image) && file_exists($partnerBrand->image)):
                        unlink($partnerBrand->image);
                    endif;
                    $brandImage = $brandImage;
                else:
                    $brandImage = $partnerBrand->image;
                endif;
                $partnerBrandSave = PartnersBrands::where('id', $request->partnerBrandId)->update(['category_id'=>$request->category_id,'name' => $request->name, 'image' => $brandImage]);
                if($partnerBrandSave > 0):
                    return redirect()->route('partners.brands')->with('success','Successfully updated Partner & Brand');
                else:
                    if(isset($brandImage) && file_exists($brandImage)):
                        unlink($brandImage);
                    endif;
                    return redirect()->back()->with('failed','Failed to update Partner & Brand');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('warning','Invaild request to update Partner & Brand');
        endif;
    }

    public function PartnersBrandsDelete(Request $request){
        $partnerBrand = PartnersBrands::where('id', $request->partnerBrand_id)->first();
        if(isset($partnerBrand) && $partnerBrand->id == $request->partnerBrand_id):
            try {
                if(isset($partnerBrand->image) && file_exists($partnerBrand->image)):
                    unlink($partnerBrand->image);
                endif;
                $PartnersBrandDelete = PartnersBrands::where('id', $request->category_id)->delete();
                if($PartnersBrandDelete > 0):
                    return redirect()->route('partners.brands')->with('success','Successfully deleted category');
                else:
                    return redirect()->back()->with('failed','Failed to delete category');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','invalid request to delete category');
        endif;
    }
}
