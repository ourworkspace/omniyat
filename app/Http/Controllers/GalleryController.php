<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryModel as Gallery;

class GalleryController extends Controller
{
    public function gallery(Request $request)
    {
        $galleryAbout = Gallery::where(['type' => 1,'status'=>1])->first();
        $galleryImages = Gallery::where(['type' => 2,'status'=>1])->orderBy('id', 'DESC')->get();
        return view('gallery.gallery_index',compact('galleryAbout','galleryImages'));
    }

    public function galleryAboutSave(Request $request)
    {
        request()->validate([
            'titleName'  =>  'required|string|max:255',
            'summary'=>  'string'
        ]);

        try {
            $saveGallery = Gallery::create(['title'=>$request->titleName,'type'=>1,'summary'=>$request->summary])->id;
            if($saveGallery > 0):
                return redirect()->back()->with('success','Successfully saved aboutGallery');
            else:
                return redirect()->back()->with('failed','Failed to save aboutGallery');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function galleryAboutUpdate(Request $request)
    {
        request()->validate([
            'titleName'  =>  'required|string|max:255',
            'summary'=>  'string'
        ]);

        if(isset($request->galleryAboutId)):
            try {
                $galleryAbout = Gallery::where(['id' => $request->galleryAboutId])->first();
                $updateGalleryAbout = Gallery::where(['id' => $request->galleryAboutId])->update(['title'=>$request->titleName,'type'=>1,'summary'=>$request->summary]);
                if($updateGalleryAbout > 0):
                    return redirect()->back()->with('success','Successfully updated aboutGallery');
                else:
                    return redirect()->back()->with('failed','Failed to update aboutGallery');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('error','Invalid request to update aboutGallery');
        endif;
    }

    public function uploadGallery(Request $request)
    {
        try {
            $sliderImages = $this->multiUploadFiles($request,'galleryImages','galleryImages');
            if(count($sliderImages) > 0):
                foreach ($sliderImages as $key => $value):
                    Gallery::create(['type'=>2,'image'=>$value])->id;
                endforeach;
                return redirect()->back()->with('success','Successfully saved Gallery');
            else:
                return redirect()->back()->with('failed','No gallery images to save');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function deleteGalleryImage(Request $request){
        if (isset($request->galleryId)):
            $gallery = Gallery::whereId($request->galleryId)->first();
            if(isset($gallery) && file_exists($gallery->image)):
                unlink($gallery->image);
                Gallery::whereId($request->galleryId)->delete();
                $data = ['res'=>true,'message'=>'Image as deleted!'];
            else:
                $data = ['res'=>false,'message'=>'No image found to delete!'];
            endif;
        else:
            $data = ['res'=>false,'message'=>'Invalid request to delete image!'];
        endif;
        return response()->json($data);
    }
}
