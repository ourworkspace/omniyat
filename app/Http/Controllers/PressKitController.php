<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PressKitModel as PressKit;
use App\PressKitCategoriesModel as PressKitCategories;
use App\PageSubTitlesModel as PageSubTitles;

class PressKitController extends Controller
{
    public function pressKitCategory(Request $request)
    {
        $PressKitCategories = PressKitCategories::where('status',1)->orderBy('id','DESC')->get();
        //print_r($PressKitCategories);exit();
        return view('press_kit.category', compact('PressKitCategories'));
    }

    public function pressKitCategorySave(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);

        try {
            $category = PressKitCategories::create(['name' => $request->title])->id;
            if($category > 0):
                return redirect()->back()->with('success','Successfully saved category');
            else:
                return redirect()->back()->with('failed','Failed to save category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressKitCategoryEdit(Request $request)
    {
        $category = PressKitCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $PressKitCategories = PressKitCategories::where('status', 1)->orderBy('id','DESC')->get();
            return view('press_kit.category_edit', compact('PressKitCategories','category'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit category');
        endif;
    }

    public function pressKitCategoryUpdate(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);
        //dd($request->all());
        $category = PressKitCategories::where('id', $request->Id)->first();
        try {
            $category = PressKitCategories::where('id', $category->id)->update(['name' => $request->title]);
            if($category > 0):
                return redirect()->route('press.kit.category')->with('success','Successfully Updated category');
            else:
                return redirect()->back()->with('failed','Failed to update category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressKitCategoryDelete(Request $request)
    {
        $category = PressKitCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $categoryDelete = PressKitCategories::where('id', $request->Id)->delete();
            if($categoryDelete > 0):
                $PressKit = PressKit::where('category_id',$request->Id)->get();
                foreach($PressKit as $value):
                    $thumbImage = $value->thumb_image;
                    $largeImage = $value->large_image;
                    $pdfFile    = $value->pdf_file;
                    $delete = PressKit::where('id',$value->id)->delete();
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

    public function pressKitIndex(Request $request)
    {
        $PressKitCategories = PressKitCategories::where('status',1)->orderBy('id','DESC')->get();
        return view('press_kit.press_kit_add', compact('PressKitCategories'));
    }

    public function PressKitSave(Request $request)
    {
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'required|image|mimes:jpeg,png,jpg',
            'large_image'  =>   'required|image|mimes:jpeg,png,jpg',
            //'document_pdf' =>   'required|mimes:pdf',
        ]);
        //dd($request->all());
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','PressKit/');
            $uploadLargeImage = $this->uploadFile($request,'large_image','PressKit/');
            $uploadpdfFile = $this->uploadFile($request,'document_pdf','PressKit/');
            $PressKit = PressKit::create(['category_id' => $request->categoryId, 'title'=>$request->title,  'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile])->id;
            if($PressKit > 0):
                return redirect()->route('press.kit.list')->with('success','Successfully saved data');
            else:
                return redirect()->back()->with('failed','Failed to save data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressKitList(Request $request)
    {
        $PageSub = PageSubTitles::where('page_type', 3)->first();
        $PressKit = PressKit::where('status',1)->orderBy('id','DESC')->get();
        return view('press_kit.press_kit_list', compact('PressKit','PageSub'));
    }

    public function pressKitEdit(Request $request)
    {
        $PressKit = PressKit::where('id',$request->Id)->first();
        if(isset($request->Id) && $PressKit->id == $request->Id):
            $PressKitCategories = PressKitCategories::where('status',1)->orderBy('id','DESC')->get();
            return view('press_kit.press_kit_edit', compact('PressKitCategories','PressKit'));
        else:
            return redirect()->back();
        endif;
    }

    public function pressKitUpdate(Request $request)
    {
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'image|mimes:jpeg,png,jpg',
            'large_image'  =>   'image|mimes:jpeg,png,jpg',
            //'document_pdf' =>   'mimes:pdf',
        ]);
        //dd($request->all());
        $pressRelease = PressKit::where('id',$request->Id)->first();
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','PressKit/');
            if(isset($uploadThumbImage) && file_exists($uploadThumbImage)):
                if(file_exists($pressRelease->thumb_image)):
                    unlink($pressRelease->thumb_image);
                endif;
                $uploadThumbImage = $uploadThumbImage;
            else:
                $uploadThumbImage = $pressRelease->thumb_image;
            endif;
            $uploadLargeImage = $this->uploadFile($request,'large_image','PressKit/');
            if(isset($uploadLargeImage) && file_exists($uploadLargeImage)):
                if(file_exists($pressRelease->large_image)):
                    unlink($pressRelease->large_image);
                endif;
                $uploadLargeImage = $uploadLargeImage;
            else:
                $uploadLargeImage = $pressRelease->large_image;
            endif;
            $uploadpdfFile = $this->uploadFile($request,'document_pdf','PressKit/');
            if(isset($uploadpdfFile) && file_exists($uploadpdfFile)):
                if(file_exists($pressRelease->pdf_file)):
                    unlink($pressRelease->pdf_file);
                endif;
                $uploadpdfFile = $uploadpdfFile;
            else:
                $uploadpdfFile = $pressRelease->pdf_file;
            endif;
            $PressKit = PressKit::where('id', $pressRelease->id)->update(['category_id' => $request->categoryId, 'title'=>$request->title, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile]);
            if($PressKit > 0):
                return redirect()->route('press.kit.list')->with('success','Successfully updated data');
            else:
                return redirect()->back()->with('failed','Failed to update data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressKitDelete(Request $request)
    {
        $pressRelease = PressKit::where('id',$request->Id)->first();
        if(isset($request->Id) && $pressRelease->id == $request->Id):
            $thumbImage = $pressRelease->thumb_image;
            $largeImage = $pressRelease->large_image;
            $pdfFile    = $pressRelease->pdf_file;
            $PressKit = PressKit::where('id', $pressRelease->id)->delete();
            if($PressKit > 0):
                if(file_exists($thumbImage)):
                    unlink($thumbImage);
                endif;
                if(file_exists($largeImage)):
                    unlink($largeImage);
                endif;
                if(file_exists($pdfFile)):
                    unlink($pdfFile);
                endif;
                return redirect()->route('press.kit.list')->with('success','Successfully deleted data');
            else:
                return redirect()->back()->with('failed','Failed to delete data');
            endif;
        else:
            return redirect()->back();
        endif;
    }
}
