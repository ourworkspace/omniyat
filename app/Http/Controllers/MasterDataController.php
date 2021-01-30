<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmenitiesDataModel as AmenitiesData;

class MasterDataController extends Controller
{
    //AmenitiesData
    public function amenitiesData(Request $request)
    {
        $amenitiesData = AmenitiesData::where(['status'=>1])->orderBy('created_at','DESC')->get();
        return view('masterdata.amenities',compact('amenitiesData'));
    }

    public function amenitieSaveData(Request $request)
    {
        $uploadImageIcon = $this->multiUploadFiles($request,'imageIcon','amenitiesIcons');
        if(!empty($uploadImageIcon[0])):
            $saveData = ['name'=>$request->titleName,'image'=>$uploadImageIcon[0]];
            $insert  = AmenitiesData::create($saveData)->id;
            if($insert > 0):
                return redirect()->back()->with('success','Successfully uploaded data.');
            else:
                return redirect()->back()->with('failed','Failed to upload icon image.');
            endif;
        else:
            return redirect()->back()->with('failed','Unable to upload icon image.');
        endif;
    }

    public function amenitiesEditData(Request $request)
    {
        $amenitiesData = AmenitiesData::where(['status'=>1])->orderBy('created_at','DESC')->get();
        if(isset($request->amenitiesId)):
            $amenities = AmenitiesData::where(['status'=>1,'id'=>$request->amenitiesId])->first();
            return view('masterdata.amenities', compact('amenitiesData','amenities'));
        else:
            return view('masterdata.amenities',compact('amenitiesData'));
        endif;
    }

    public function amenitiesUpdateData(Request $request)
    {
        $amenities = AmenitiesData::where(['status'=>1,'id'=>$request->amenitiesId])->first();
        if(isset($amenities->id)):
            $uploadImageIcon = $this->multiUploadFiles($request,'imageIcon','amenitiesIcons');
            if(!empty($uploadImageIcon[0])):
                @unlink($amenities->image);
                $uploadImage = $uploadImageIcon[0];
            else:
                $uploadImage = $amenities->image;
            endif;
            $saveData = ['name'=>$request->titleName,'image'=>$uploadImage];
            $insert  = AmenitiesData::where(['id'=>$request->amenitiesId])->update($saveData);
            if($insert > 0):
                return redirect()->route('amenities')->with('success','Successfully uploaded data.');
            else:
                return redirect()->back()->with('failed','Failed to upload icon image.');
            endif;
        else:
            return redirect()->back()->with('failed','Invalid request to update!.');
        endif;
    }

    public function amenitiesDeleteData(Request $request)
    {
        if(isset($request->amenitiesId)):
            $delete = AmenitiesData::where(['status'=>1,'id'=>$request->amenitiesId])->update(['status'=>0]);
            if($delete > 0):
                return redirect()->route('amenities')->with('success','Successfully deleted data.');
            else:
                return redirect()->back()->with('failed','Failed to delete data.');
            endif;
        else:
            return redirect()->back()->with('failed','Invalid request to delete!.');
        endif;
    }
}
