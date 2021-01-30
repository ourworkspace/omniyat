<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhatsOnMediaModel as WhatsOnMedia;
use DB;
use App\PageSubTitlesModel as PageSubTitles;


class WhatsOnMediaController extends Controller
{
    public function whatsOnMediaIndex(Request $request)
    {
        return view('whatsOnMedia.whats_on_media');
    }

    public function whatsOnMediaSave(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
            'short_description' =>  'required',
            'long_description' =>  'required',
            'thumb_image' =>  'image|mimes:jpeg,png,jpg|required',
        ]);
        
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','whatsOnMedia/');
            $uploadLargeImage = $this->uploadFile($request,'large_image','whatsOnMedia/');
            $uploadpdfFile = $this->uploadFile($request,'pdf_file','whatsOnMedia/');
            $whatsOnMediaId = WhatsOnMedia::create(['title'=>$request->title,'short_description'=>$request->short_description,'long_description'=>$request->long_description, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile,'date'=>date('d-m-Y',strtotime($request->date))])->id;
            //$uploadUrl = 'whatsOnMedia/'.$whatsOnMediaId;
            
            /*$candidate_employee = CandidateEmployees::create($requestData);
            $candidate_employee_id = $candidate_employee->id;*/
            if($whatsOnMediaId > 0):
                return redirect()->route('whatsOnMedia.list')->with('success','Successfully saved data');
            else:
                return redirect()->back()->with('failed','Failed to save data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function whatsOnMediaList(Request $request)
    {
        $PageSub = PageSubTitles::where('page_type', 1)->first();
        $WhatsOnMedia = WhatsOnMedia::where('status',1)->get();
        return view('whatsOnMedia.whats_on_media_list', compact('WhatsOnMedia','PageSub'));
    }

    public function whatsOnMediaEdit(Request $request)
    {
        $WhatsOnMedia = WhatsOnMedia::where('id',$request->Id)->first();
        if(isset($request->Id) && $WhatsOnMedia->id == $request->Id):
            return view('whatsOnMedia.whats_on_media', compact('WhatsOnMedia'));
        else:
            return redirect()->back();
        endif;
    }

    public function whatsOnMediaDelete(Request $request)
    {
        $WhatsOnMedia = WhatsOnMedia::where('id',$request->Id)->first();
        if(isset($request->Id) && $WhatsOnMedia->id == $request->Id):
            try {
                if(file_exists($WhatsOnMedia->image)):
                    unlink($WhatsOnMedia->image);
                endif;
                $whatsOnMedia = WhatsOnMedia::where('id', $WhatsOnMedia->id)->delete();
                if($whatsOnMedia > 0):
                    return redirect()->route('whatsOnMedia.list')->with('success','Successfully deleted data');
                else:
                    return redirect()->back()->with('failed','Failed to delete data');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back();
        endif;
    }

    public function whatsOnMediaUpdate(Request $request)
    {
        //echo "string".exit();
        request()->validate([
            'title'  =>  'required',
            'short_description' =>  'required',
            'long_description' =>  'required',
        ]);
        //dd($request->all());exit();
        $whatsOnMedia = WhatsOnMedia::where('id',$request->Id)->first();
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','whatsOnMedia/');
            if(isset($uploadThumbImage) && file_exists($uploadThumbImage)):
                if(file_exists($whatsOnMedia->thumb_image)):
                    unlink($whatsOnMedia->thumb_image);
                endif;
                $uploadThumbImage = $uploadThumbImage;
            else:
                $uploadThumbImage = $whatsOnMedia->thumb_image;
            endif;
            $uploadLargeImage = $this->uploadFile($request,'large_image','whatsOnMedia/');
            if(isset($uploadLargeImage) && file_exists($uploadLargeImage)):
                if(file_exists($whatsOnMedia->large_image)):
                    unlink($whatsOnMedia->large_image);
                endif;
                $uploadLargeImage = $uploadLargeImage;
            else:
                $uploadLargeImage = $whatsOnMedia->large_image;
            endif;
            $uploadpdfFile = $this->uploadFile($request,'pdf_file','whatsOnMedia/');
            if(isset($uploadpdfFile) && file_exists($uploadpdfFile)):
                if(file_exists($whatsOnMedia->pdf_file)):
                    unlink($whatsOnMedia->pdf_file);
                endif;
                $uploadpdfFile = $uploadpdfFile;
            else:
                $uploadpdfFile = $whatsOnMedia->pdf_file;
            endif;
            $whatsOnMedia = WhatsOnMedia::where('id', $whatsOnMedia->id)->update([ 'title'=>$request->title, 'short_description'=>$request->short_description,'long_description'=>$request->long_description, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile,'date'=>date('d-m-Y',strtotime($request->date))]);
            if($whatsOnMedia > 0):
                return redirect()->route('whatsOnMedia.list')->with('success','Successfully updated data');
            else:
                return redirect()->back()->with('failed','Failed to update data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
        //dd($request->all());
    }
}
