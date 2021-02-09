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
                $ordered_by_id = Leadership::where('status',1)->max('ordered_by');
                
                if($ordered_by_id==''){
                    $ordered_by_id = 1;
                }else{
                    $ordered_by_id = $ordered_by_id+1;
                }
                //echo "string".$ordered_by_id;exit();
            $uploadImage = $this->uploadFile($request,'image','leadership/');
            $leadershipId = Leadership::create(['leadership_name'=>$request->leadership_name,'leadership_designation'=>$request->leadership_designation, 'image'=>$uploadImage,'long_description'=>$request->long_description,'ordered_by'=>$ordered_by_id])->id;

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

    public function leadershipUpdateOrderPage(Request $request)
    {
        $leadership = Leadership::where(['status'=>1])->get();
        $order = [];
        foreach($leadership as $key => $value):
            Leadership::where('id', $request->page_id_array[$key])->update(['ordered_by'=>$key+1]);
            $order[] = ['id'=>$key+1];
        endforeach;
        return Response()->json(['message'=>'Order as been changed.','order'=>$order]);
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
