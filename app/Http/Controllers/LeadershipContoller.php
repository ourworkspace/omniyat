<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeadershipModel as Leadership;
class LeadershipContoller extends Controller
{

    public function leadershipNew(Request $request)
    {
        return view('leadership.leadership');
    }

    public function leadershipSave(Request $request)
    {
        request()->validate([
            'leadership_name'           =>  'required|string|max:255',
            'leadership_designation'    =>  'required|string|max:255',
            'image'                     =>  'image|mimes:jpeg,png,jpg',
            'long_description'         =>  'required',
        ]);

            try {
            $uploadImage = $this->uploadFile($request,'image','leadership/');
            $leadershipId = Leadership::create(['leadership_name'=>$request->leadership_name,'leadership_designation'=>$request->leadership_designation, 'image'=>$uploadImage,'long_description'=>$request->long_description])->id;

            if($leadershipId > 0):
                return redirect()->route('leadership.list')->with('success','Successfully saved leadership');
            else:
                if(isset($uploadImage) && file_exists($uploadImage)):
                    unlink($uploadImage);
                endif;
                return redirect()->back()->with('failed','Failed to save leadership');
            endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
    }

    public function leadershipList(Request $request)
    {
        $leadershipList = Leadership::where('status', 1)->get();
        /*echo "<pre>";
        print_r($leadershipList);exit();*/
        return view('leadership.leadership_list', compact('leadershipList'));
    }

    public function leadershipEdit(Request $request){
        $leadership = Leadership::where('id', $request->leadershipId)->first();
        return view('leadership.leadership', compact('leadership'));
    }

    public function leadershipUpdate(Request $request){
        request()->validate([
            'leadership_name'           =>  'required|string|max:255',
            'leadership_designation'    =>  'required|string|max:255',
            'image'                     =>  'image|mimes:jpeg,png,jpg',
            'long_description'         =>  'required',
        ]);

        $leadership = Leadership::where('id', $request->leadershipId)->first();
        if (isset($leadership)):
            try {
                $uploadImage = $this->uploadFile($request,'image','leadership/');
            if(isset($uploadImage) && file_exists($uploadImage)):
                if(file_exists($leadership->image)):
                    unlink($leadership->image);
                endif;
                $uploadImage = $uploadImage;
            else:
                $uploadImage = $leadership->image;
            endif;

                $leadershipSave = Leadership::where('id', $request->leadershipId)->update(['leadership_name'=>$request->leadership_name,'leadership_designation'=>$request->leadership_designation, 'image'=>$uploadImage,'long_description'=>$request->long_description]);
                if($leadershipSave > 0):
                    return redirect()->route('leadership.list')->with('success','Successfully updated leadership');
                else:
                    return redirect()->back()->with('failed','Failed to update leadership');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','Invalid request to update leadership');
        endif;
    }

    public function leadershipDelete(Request $request){
        $leadership = Leadership::where('id', $request->leadershipId)->first();
        if(isset($leadership) && $leadership->id == $request->leadershipId):
            try {
                if(isset($leadership->image) && file_exists($leadership->image)):
                    unlink($leadership->image);
                endif;
                $leadershipDelete = Leadership::where('id', $request->leadershipId)->delete();
                if($leadershipDelete > 0):
                    return redirect()->back()->with('success','Successfully deleted leadership');
                else:
                    return redirect()->back()->with('failed','Failed to delete leadership');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','invalid request to delete leadership');
        endif;
    }
}