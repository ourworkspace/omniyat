<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PressReleasesModel as PressReleases; 
use App\PressReleasesCategoriesModel as PressReleasesCategories; 

class PressReleasesControl extends Controller
{
    public function pressReleaseCategory(Request $request)
    {
        $PressReleasesCategories = PressReleasesCategories::where('status',1)->orderBy('id','DESC')->get();
        return view('press_releases.category', compact('PressReleasesCategories'));
    }

    public function pressReleaseCategorySave(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);

        try {
            $category = PressReleasesCategories::create(['name' => $request->title])->id;
            if($category > 0):
                return redirect()->back()->with('success','Successfully saved category');
            else:
                return redirect()->back()->with('failed','Failed to save category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressReleaseCategoryEdit(Request $request)
    {
        $category = PressReleasesCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $PressReleasesCategories = PressReleasesCategories::where('status', 1)->orderBy('id','DESC')->get();
            return view('press_releases.category_edit', compact('PressReleasesCategories','category'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit category');
        endif;
    }

    public function pressReleaseCategoryUpdate(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);
        //dd($request->all());
        $category = PressReleasesCategories::where('id', $request->Id)->first();
        try {
            $category = PressReleasesCategories::where('id', $category->id)->update(['name' => $request->title]);
            if($category > 0):
                return redirect()->route('press.releases.category')->with('success','Successfully Updated category');
            else:
                return redirect()->back()->with('failed','Failed to update category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressReleaseCategoryDelete(Request $request)
    {
        $category = PressReleasesCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $categoryDelete = PressReleasesCategories::where('id', $request->Id)->delete();
            if($categoryDelete > 0):
                $pressReleases = PressReleases::where('category_id',$request->Id)->orderBy('id','DESC')->get();
                foreach($pressReleases as $value):
                    $thumbImage = $value->thumb_image;
                    $largeImage = $value->large_image;
                    $pdfFile    = $value->pdf_file;
                    $delete = PressReleases::where('id',$value->id)->delete();
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

    public function pressReleaseIndex(Request $request)
    {
        $pressReleaseCategory = PressReleasesCategories::where('status',1)->orderBy('id','DESC')->get();
        return view('press_releases.press_release_add', compact('pressReleaseCategory'));
    }

    public function pressReleaseSave(Request $request)
    {
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'required|image|mimes:jpeg,png,jpg',
            'large_image'  =>   'required|image|mimes:jpeg,png,jpg',
            'document_pdf' =>   'required|mimes:pdf',
        ]);
        //dd($request->all());
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','pressReleases/');
            $uploadLargeImage = $this->uploadFile($request,'large_image','pressReleases/');
            $uploadpdfFile = $this->uploadFile($request,'document_pdf','pressReleases/');
            $pressReleases = PressReleases::create(['category_id' => $request->categoryId, 'title'=>$request->title, 'short_description'=>$request->ShortDescription,'long_description'=>$request->longDescription, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile])->id;
            if($pressReleases > 0):
                return redirect()->route('press.releases.list')->with('success','Successfully saved data');
            else:
                return redirect()->back()->with('failed','Failed to save data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressReleaseList(Request $request)
    {
        $pressReleases = PressReleases::where('status',1)->orderBy('id','DESC')->get();
        return view('press_releases.press_release_list', compact('pressReleases'));
    }

    public function pressReleaseEdit(Request $request)
    {
        $pressRelease = PressReleases::where('id',$request->Id)->first();
        if(isset($request->Id) && $pressRelease->id == $request->Id):
            $pressReleaseCategory = PressReleasesCategories::where('status',1)->orderBy('id','DESC')->get();
            return view('press_releases.press_release_edit', compact('pressReleaseCategory','pressRelease'));
        else:
            return redirect()->back();
        endif;
    }

    public function pressReleaseUpdate(Request $request)
    {
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'image|mimes:jpeg,png,jpg',
            'large_image'  =>   'image|mimes:jpeg,png,jpg',
            'document_pdf' =>   'mimes:pdf',
        ]);
        //dd($request->all());
        $pressRelease = PressReleases::where('id',$request->Id)->first();
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','pressReleases/');
            if(isset($uploadThumbImage) && file_exists($uploadThumbImage)):
                if(file_exists($pressRelease->thumb_image)):
                    unlink($pressRelease->thumb_image);
                endif;
                $uploadThumbImage = $uploadThumbImage;
            else:
                $uploadThumbImage = $pressRelease->thumb_image;
            endif;
            $uploadLargeImage = $this->uploadFile($request,'large_image','pressReleases/');
            if(isset($uploadLargeImage) && file_exists($uploadLargeImage)):
                if(file_exists($pressRelease->large_image)):
                    unlink($pressRelease->large_image);
                endif;
                $uploadLargeImage = $uploadLargeImage;
            else:
                $uploadLargeImage = $pressRelease->large_image;
            endif;
            $uploadpdfFile = $this->uploadFile($request,'document_pdf','pressReleases/');
            if(isset($uploadpdfFile) && file_exists($uploadpdfFile)):
                if(file_exists($pressRelease->pdf_file)):
                    unlink($pressRelease->pdf_file);
                endif;
                $uploadpdfFile = $uploadpdfFile;
            else:
                $uploadpdfFile = $pressRelease->pdf_file;
            endif;
            $pressReleases = PressReleases::where('id', $pressRelease->id)->update(['category_id' => $request->categoryId, 'title'=>$request->title, 'short_description'=>$request->ShortDescription,'long_description'=>$request->longDescription, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile]);
            if($pressReleases > 0):
                return redirect()->route('press.releases.list')->with('success','Successfully updated data');
            else:
                return redirect()->back()->with('failed','Failed to update data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function pressReleaseDelete(Request $request)
    {
        $pressRelease = PressReleases::where('id',$request->Id)->first();
        if(isset($request->Id) && $pressRelease->id == $request->Id):
            $thumbImage = $pressRelease->thumb_image;
            $largeImage = $pressRelease->large_image;
            $pdfFile    = $pressRelease->pdf_file;
            $pressReleases = PressReleases::where('id', $pressRelease->id)->delete();
            if($pressReleases > 0):
                if(file_exists($thumbImage)):
                    unlink($thumbImage);
                endif;
                if(file_exists($largeImage)):
                    unlink($largeImage);
                endif;
                if(file_exists($pdfFile)):
                    unlink($pdfFile);
                endif;
                return redirect()->route('press.releases.list')->with('success','Successfully deleted data');
            else:
                return redirect()->back()->with('failed','Failed to delete data');
            endif;
        else:
            return redirect()->back();
        endif;
    }
}
