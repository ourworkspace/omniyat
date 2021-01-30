<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,Session;
use App\AboutModel as About;
class AboutController extends Controller
{

    public function aboutIndex(Request $request)
    {
        $about = About::where('type', 1)->first();
        return view('about.about_index', compact('about'));
    }

    public function saveAbout(Request $request)
    {
        request()->validate([
            'sub_title'=>  'required',
            'LogoImage'  =>  'image|mimes:jpeg,png,jpg',
            'description'=>  'required'
        ]);

        try {
            $aboutLogoImg = $this->uploadFile($request,'LogoImage','aboutUs');
            $saveAbout = About::create(['type'=>1,
                        'sub_title'=>$request->sub_title,
                        'image'=>$aboutLogoImg,
                        'image_text'=>$request->image_text,
                        'description'=>$request->description,
                        'button_text'=>$request->button_text,
                        'button_url'=>$request->button_url
                        ])->id;
            if($saveAbout > 0):
                return redirect()->back()->with('success','Successfully saved aboutUs');
            else:
                return redirect()->back()->with('failed','Failed to save aboutUs');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function updateAbout(Request $request)
    {
        request()->validate([
            //'titleName'  =>  'required|string|max:255',
            'LogoImage'  =>  'image|mimes:jpeg,png,jpg',
            'description'=>  'required'
        ]);
        if(isset($request->about_id)):
            try {
                $about = About::where('id', $request->about_id)->first();
                $aboutLogoImg = $this->uploadFile($request,'LogoImage','aboutUs');
                if(isset($aboutLogoImg) && file_exists($aboutLogoImg)):
                    if(isset($about->image) && file_exists($about->image)):
                        unlink($about->image);
                    endif;
                    $aboutLogoImg = $aboutLogoImg;
                else:
                    $aboutLogoImg = $about->image;
                endif;
                $updateAbout = About::where('id', $request->about_id)->update(['type'=>1,
                                'sub_title'=>$request->sub_title,
                                'image'=>$aboutLogoImg,
                                'image_text'=>$request->image_text,
                                'description'=>$request->description,
                                'button_text'=>$request->button_text,
                                'button_url'=>$request->button_url
                                    ]);
                if($updateAbout > 0):
                    return redirect()->back()->with('success','Successfully updated aboutUs');
                else:
                    return redirect()->back()->with('failed','Failed to update aboutUs');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('error','Invalid request to update aboutUs');
        endif;
    }

    public function chairmanNewLetterIndex(Request $request)
    {
        return view('cms_pages.chairman_newsletters_add');
    }

}
