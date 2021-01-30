<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DesignModel as Design;
class DesignController extends Controller
{
    public function design()
    {
        $architecture = Design::where(['type' => 1,'design_type'=>'architecture','status'=>1])->first();
        $interior = Design::where(['type' => 1,'design_type'=>'interior','status'=>1])->first();
        $slidersImages = Design::where(['type' => 2,'status'=>1])->orderBy('id', 'DESC')->get();
        return view('design.design_index', compact('interior','architecture','slidersImages'));
    }

    public function saveDesignData(Request $request){
        request()->validate([
            'titleName'  =>  'required|string|max:255',
            'description'=>  'string'
        ]);

        try {
            $saveDesign = Design::create(['title'=>$request->titleName,'type'=>1,'design_type' => $request->designType,'summary'=>$request->description])->id;
            if($saveDesign > 0):
                return redirect()->back()->with('success','Successfully saved design details');
            else:
                return redirect()->back()->with('failed','Failed to save design details');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }

    }

    public function updateDesignData(Request $request){
        request()->validate([
            'titleName'  =>  'required|string|max:255',
            'description'=>  'string'
        ]);

        if(isset($request->editId)):
            try {
                $design = Design::where(['id' => $request->editId])->first();
                $updateDesign = Design::where(['id' => $request->editId])->update(['title'=>$request->titleName,'summary'=>$request->description]);
                if($updateDesign > 0):
                    return redirect()->back()->with('success','Successfully updated design details');
                else:
                    return redirect()->back()->with('failed','Failed to update design details');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('error','Invalid request to update design details');
        endif;
    }

    public function uploadDesignSliders(Request $request)
    {
        try {
            $sliderImages = $this->multiUploadFiles($request,'slidersImages','designSlidersImages');
            if(count($sliderImages) > 0):
                foreach ($sliderImages as $key => $value):
                    Design::create(['type'=>2,'image'=>$value])->id;
                endforeach;
                return redirect()->back()->with('success','Successfully uploaded design sliders');
            else:
                return redirect()->back()->with('failed','No design sliders to save');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function deleteSliderImage(Request $request)
    {
        if(isset($request->sliderId)):
            $gallery = Design::whereId($request->sliderId)->first();
            if(isset($gallery) && file_exists($gallery->image)):
                unlink($gallery->image);
                Design::whereId($request->sliderId)->delete();
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
