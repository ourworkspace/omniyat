<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhatsNewModel as WhatsNew;
use App\WhatsNewCategoriesModel as WhatsNewCategories;
use App\PageSubTitlesModel as PageSubTitles;

class WhatsNewContoller extends Controller
{
    public function whatsNewCategories(Request $request)
    {
        $whatsnewCatgories = WhatsNewCategories::where('status', 1)->orderBy('id','DESC')->get();
        return view('whatsnew.categories', compact('whatsnewCatgories'));
    }

    public function whatsNewCategorySave(Request $request)
    {
        request()->validate([
            'title'  =>  'required|string|max:255',
        ]);

        try {
            $category = WhatsNewCategories::create(['name' => $request->title])->id;
            if($category > 0):
                return redirect()->back()->with('success','Successfully saved category');
            else:
                return redirect()->back()->with('failed','Failed to save category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function categoryEdit(Request $request)
    {
        $whatsnewCatgories = WhatsNewCategories::orderBy('id','DESC')->get();
        $category = WhatsNewCategories::where('id', $request->category_id)->first();
        return view('whatsnew.categories_edit', compact('whatsnewCatgories','category'));
    }

    public function categoryUpdate(Request $request)
    {
        request()->validate([
            'title'  =>  'required|string|max:255',
        ]);
        $category = WhatsNewCategories::where('id', $request->category_id)->first();
        if(isset($category)):
            try {
                $categoryUpdate = WhatsNewCategories::where('id', $request->category_id)->update(['name' => $request->title]);
                if($categoryUpdate > 0):
                    return redirect()->route('whatsNew.categories')->with('success','Successfully updated category');
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

    public function categoryDelete(Request $request){
        $category = WhatsNewCategories::where('id', $request->category_id)->first();
        if(isset($category)):
            try {
                $categoryDelete = WhatsNewCategories::where('id', $request->category_id)->delete();
                if($categoryDelete > 0):
                    //Delete related data partners and brands data
                    $whatsNew = WhatsNew::where('category_id', $request->category_id)->get();
                    foreach ($whatsNew as $value):
                        if(isset($value->image) && file_exists($value->image)):
                            unlink($value->image);
                        endif;
                        WhatsNew::where('id', $value->id)->delete();
                    endforeach;

                    return redirect()->route('whatsNew.categories')->with('success','Successfully deleted category');
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

    public function whatsNew(Request $request)
    {
        $categories = WhatsNewCategories::where('status', 1)->orderBy('id','DESC')->get();
        return view('whatsnew.whatsnew', compact('categories'));
    }

    public function whatsNewSave(Request $request)
    {
        request()->validate([
            //'category_id'  =>  'required',
            'title'  =>  'required|string|max:255',
            'short_description'  =>  'required'
        ]);

            try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','whatsNew/');
            $uploadLargeImage = $this->uploadFile($request,'large_image','whatsNew/');
            $whatsNewId = WhatsNew::create(['title'=>$request->title,'short_description'=>$request->short_description,'long_description'=>$request->long_description, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage,'date'=>date('d-m-Y',strtotime($request->date))])->id;

            if($whatsNewId > 0):
                return redirect()->route('whatsNew.list')->with('success','Successfully saved whatsNew');
            else:
                if(isset($uploadThumbImage) && file_exists($uploadThumbImage)):
                    unlink($uploadThumbImage);
                endif;
                if(isset($uploadLargeImage) && file_exists($uploadLargeImage)):
                    unlink($uploadLargeImage);
                endif;
                return redirect()->back()->with('failed','Failed to save whatsNew');
            endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
    }

    public function whatsNewList(Request $request)
    {
        $PageSub = PageSubTitles::where('page_type', 6)->first();
        $whatsNewList = WhatsNew::where('status', 1)->get();
        /*echo "<pre>";
        print_r($whatsNewList);exit();*/
        return view('whatsnew.whatsnew_list', compact('whatsNewList','PageSub'));
    }

    public function whatsNewEdit(Request $request){
        $categories = WhatsNewCategories::where('status', 1)->orderBy('id','DESC')->get();
        $whatsNew = WhatsNew::where('id', $request->whatsNewId)->first();
        return view('whatsnew.whatsnew', compact('categories', 'whatsNew'));
    }

    public function whatsNewUpdate(Request $request){
        request()->validate([
            //'category_id'  =>  'required',
            'title'  =>  'required|string|max:255',
            'short_description'  =>  'required',
            'thumb_image' =>  'image|mimes:jpeg,png,jpg'
        ]);

        $whatsNew = WhatsNew::where('id', $request->whatsNewId)->first();
        if (isset($whatsNew)):
            try {
                $uploadThumbImage = $this->uploadFile($request,'thumb_image','whatsNew/');
            if(isset($uploadThumbImage) && file_exists($uploadThumbImage)):
                if(file_exists($whatsNew->thumb_image)):
                    unlink($whatsNew->thumb_image);
                endif;
                $uploadThumbImage = $uploadThumbImage;
            else:
                $uploadThumbImage = $whatsNew->thumb_image;
            endif;
            $uploadLargeImage = $this->uploadFile($request,'large_image','whatsNew/');
            if(isset($uploadLargeImage) && file_exists($uploadLargeImage)):
                if(file_exists($whatsNew->large_image)):
                    unlink($whatsNew->large_image);
                endif;
                $uploadLargeImage = $uploadLargeImage;
            else:
                $uploadLargeImage = $whatsNew->large_image;
            endif;
                $whatsNewSave = WhatsNew::where('id', $request->whatsNewId)->update([ 'title'=>$request->title, 'short_description'=>$request->short_description,'long_description'=>$request->long_description, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage,'date'=>date('d-m-Y',strtotime($request->date))]);
                if($whatsNewSave > 0):
                    return redirect()->route('whatsNew.list')->with('success','Successfully updated whatsNew');
                else:
                    return redirect()->back()->with('failed','Failed to update whatsNew');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','Invalid request to update whatsNew');
        endif;
    }

    public function whatsNewDelete(Request $request){
        $whatsNew = WhatsNew::where('id', $request->whatsNewId)->first();
        if(isset($whatsNew) && $whatsNew->id == $request->whatsNewId):
            try {
                if(isset($whatsNew->image) && file_exists($whatsNew->image)):
                    unlink($whatsNew->image);
                endif;
                $whatsNewDelete = WhatsNew::where('id', $request->whatsNewId)->delete();
                if($whatsNewDelete > 0):
                    return redirect()->back()->with('success','Successfully deleted whatsNew');
                else:
                    return redirect()->back()->with('failed','Failed to delete whatsNew');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','invalid request to delete whatsNew');
        endif;
    }
}
