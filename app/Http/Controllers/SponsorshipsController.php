<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SponsorshipsModel as Sponsorships;
use App\SponsorshipsCategoriesModel as SponsorshipsCategories;
use App\SponsorshipGalleryImagesModel as SponsorshipGalleryImages;
use App\PageSubTitlesModel as PageSubTitles;

class SponsorshipsController extends Controller
{
    public function sponsorshipsCategory(Request $request)
    {
        $SponsorshipsCategories = SponsorshipsCategories::where('status',1)->orderBy('id','DESC')->get();
        return view('sponsorships.category', compact('SponsorshipsCategories'));
    }

    public function sponsorshipsCategorySave(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);

        try {
            $category = SponsorshipsCategories::create(['name' => $request->title])->id;
            if($category > 0):
                return redirect()->back()->with('success','Successfully saved category');
            else:
                return redirect()->back()->with('failed','Failed to save category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function sponsorshipsCategoryEdit(Request $request)
    {
        $category = SponsorshipsCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $SponsorshipsCategories = SponsorshipsCategories::where('status', 1)->orderBy('id','DESC')->get();
            return view('sponsorships.category_edit', compact('SponsorshipsCategories','category'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit category');
        endif;
    }

    public function sponsorshipsCategoryUpdate(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);
        //dd($request->all());
        $category = SponsorshipsCategories::where('id', $request->Id)->first();
        try {
            $category = SponsorshipsCategories::where('id', $category->id)->update(['name' => $request->title]);
            if($category > 0):
                return redirect()->route('sponsorships.category')->with('success','Successfully Updated category');
            else:
                return redirect()->back()->with('failed','Failed to update category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function sponsorshipsCategoryDelete(Request $request)
    {
        $category = SponsorshipsCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $categoryDelete = SponsorshipsCategories::where('id', $request->Id)->delete();
            if($categoryDelete > 0):
                $sponsorships = Sponsorships::where('category_id',$request->Id)->get();
                foreach($sponsorships as $value):
                    $thumbImage = $value->thumb_image;
                    $largeImage = $value->large_image;
                    $pdfFile    = $value->pdf_file;
                    $delete = Sponsorships::where('id',$value->id)->delete();
                    if($delete > 0):
                        if(file_exists($thumbImage)):
                            unlink($thumbImage);
                        endif;
                        if(file_exists($largeImage)):
                            unlink($largeImage);
                        endif;
                        if(file_exists($pdfFile)):
                            unlink($pdfFile);
                        endif;
                    endif;
                endforeach;
                return redirect()->back()->with('success','Successfully deleted category data');
            else:
                return redirect()->back()->with('failed','Unable to delete category data');
            endif;
        else:
            return redirect()->back()->with('failed','Invalid request to delete category');
        endif;
    }

    public function sponsorshipsIndex(Request $request)
    {
        $SponsorshipsCategories = SponsorshipsCategories::where('status',1)->orderBy('id','DESC')->get();
        return view('sponsorships.sponsorships_add', compact('SponsorshipsCategories'));
    }

    public function sponsorshipsSave(Request $request)
    {
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'required|image|mimes:jpeg,png,jpg',
            'large_image'  =>   'required|image|mimes:jpeg,png,jpg'
        ]);
        //dd($request->all());
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','sponsorships/');
            $uploadLargeImage = $this->uploadFile($request,'large_image','sponsorships/');
            $sponsorships = Sponsorships::create(['category_id' => $request->categoryId, 'title'=>$request->title,'short_description'=>$request->short_description,'long_description'=>$request->long_description,  'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage,'date'=>date('d-m-Y',strtotime($request->date))])->id;
            //echo "dfdsf__". $sponsorships;exit();
                $sponsorship_gallery_images = $this->multiUploadFiles($request,'sponsorship_gallery_images','sponsorships/galleryImages/'.$sponsorships.'');
                if(count($sponsorship_gallery_images) > 0):
                    foreach($sponsorship_gallery_images as $gkey => $dgvalue):
                        $designGalleryImages = SponsorshipGalleryImages::create(['sponsorship_id'=>$sponsorships,'title'=>'Gallery_image_'.$gkey,'image'=>$dgvalue])->id;
                    endforeach;
                endif;
            if($sponsorships > 0):
                return redirect()->route('sponsorships.list')->with('success','Successfully saved data');
            else:
                return redirect()->back()->with('failed','Failed to save data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function sponsorshipsList(Request $request)
    {   
        $PageSub = PageSubTitles::where('page_type', 5)->first();
        $sponsorshipsList = Sponsorships::where('status',1)->orderBy('id','DESC')->get();
        return view('sponsorships.sponsorships_list', compact('sponsorshipsList','PageSub'));
    }

    public function sponsorshipsEdit(Request $request)
    {
        $sponsorships = Sponsorships::where('id',$request->Id)->first();
        if(isset($request->Id) && $sponsorships->id == $request->Id):
            $SponsorshipsCategories = SponsorshipsCategories::where('status',1)->orderBy('id','DESC')->get();
            $sponsorship_gallary = SponsorshipGalleryImages::where('sponsorship_id',$request->Id)->orderBy('id','DESC')->get();
            return view('sponsorships.sponsorships_edit', compact('SponsorshipsCategories','sponsorships','sponsorship_gallary'));
        else:
            return redirect()->back();
        endif;
    }

    public function sponsorshipsUpdate(Request $request)
    {
        //print_r($request->all());exit();
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'image|mimes:jpeg,png,jpg',
            'large_image'  =>   'image|mimes:jpeg,png,jpg'
        ]);
        //dd($request->all());
        $sponsorships = Sponsorships::where('id',$request->id)->first();
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','sponsorships/');
            if(isset($uploadThumbImage) && file_exists($uploadThumbImage)):
                if(file_exists($sponsorships->thumb_image)):
                    unlink($sponsorships->thumb_image);
                endif;
                $uploadThumbImage = $uploadThumbImage;
            else:
                $uploadThumbImage = $sponsorships->thumb_image;
            endif;
            $uploadLargeImage = $this->uploadFile($request,'large_image','sponsorships/');
            if(isset($uploadLargeImage) && file_exists($uploadLargeImage)):
                if(file_exists($sponsorships->large_image)):
                    unlink($sponsorships->large_image);
                endif;
                $uploadLargeImage = $uploadLargeImage;
            else:
                $uploadLargeImage = $sponsorships->large_image;
            endif;
            
            $sponsorships = Sponsorships::where('id', $request->id)->update(['category_id' => $request->categoryId, 'title'=>$request->title,'short_description'=>$request->short_description,'long_description'=>$request->long_description, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage,'date'=>date('d-m-Y',strtotime($request->date))]);

            $sponsorship_gallery_images = $this->multiUploadFiles($request,'sponsorship_gallery_images','sponsorships/galleryImages/'.$sponsorships.'');
                if(count($sponsorship_gallery_images) > 0):
                    foreach($sponsorship_gallery_images as $gkey => $dgvalue):
                        $designGalleryImages = SponsorshipGalleryImages::create(['sponsorship_id'=>$request->id,'title'=>'Gallery_image_'.$gkey,'image'=>$dgvalue])->id;
                    endforeach;
                endif;
               //echo "string". $request->id;exit();
            if($request->id > 0):
                return redirect()->route('sponsorships.list')->with('success','Successfully updated data');
            else:
                return redirect()->back()->with('failed','Failed to update data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function sponsorshipsDelete(Request $request)
    {
        $sponsorships = Sponsorships::where('id',$request->Id)->first();
        if(isset($request->Id) && $sponsorships->id == $request->Id):
            $thumbImage = $sponsorships->thumb_image;
            $largeImage = $sponsorships->large_image;
            $pdfFile    = $sponsorships->pdf_file;
            $sponsorships = Sponsorships::where('id', $sponsorships->id)->delete();
            if($sponsorships > 0):
                if(file_exists($thumbImage)):
                    unlink($thumbImage);
                endif;
                if(file_exists($largeImage)):
                    unlink($largeImage);
                endif;
                if(file_exists($pdfFile)):
                    unlink($pdfFile);
                endif;
                return redirect()->route('sponsorships.list')->with('success','Successfully deleted data');
            else:
                return redirect()->back()->with('failed','Failed to delete data');
            endif;
        else:
            return redirect()->back();
        endif;
    }
    public function sponsorshipsDeleteImage(Request $request){
        $sponsorships = SponsorshipGalleryImages::where('id', $request->image_id)->first();
        if(isset($sponsorships) && file_exists($sponsorships->image)):
            if(file_exists($sponsorships->image)):
                @unlink($sponsorships->image);
            endif;
            SponsorshipGalleryImages::where(['id'=>$request->image_id])->delete();
            $data = array('res'=>true,'message'=>'Image deleted');
        else:
            $data = array('res'=>false,'message'=>'No Image found to delete.');
        endif;
        echo json_encode($data);
    }
}
