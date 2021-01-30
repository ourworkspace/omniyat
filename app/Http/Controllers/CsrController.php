<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CsrModel as Csr;
use App\CsrCategoriesModel as CsrCategories;
use App\PageSubTitlesModel as PageSubTitles;

class CsrController extends Controller
{
    public function csrCategory(Request $request)
    {
        $CsrCategories = CsrCategories::where('status',1)->orderBy('id','DESC')->get();
        return view('csr.category', compact('CsrCategories'));
    }

    public function csrCategorySave(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);

        try {
            $category = CsrCategories::create(['name' => $request->title])->id;
            if($category > 0):
                return redirect()->back()->with('success','Successfully saved category');
            else:
                return redirect()->back()->with('failed','Failed to save category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function csrCategoryEdit(Request $request)
    {
        $category = CsrCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $CsrCategories = CsrCategories::where('status', 1)->orderBy('id','DESC')->get();
            return view('csr.category_edit', compact('CsrCategories','category'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit category');
        endif;
    }

    public function csrCategoryUpdate(Request $request)
    {
        request()->validate([
            'title'  =>  'required',
        ]);
        //dd($request->all());
        $category = CsrCategories::where('id', $request->Id)->first();
        try {
            $category = CsrCategories::where('id', $category->id)->update(['name' => $request->title]);
            if($category > 0):
                return redirect()->route('csr.category')->with('success','Successfully Updated category');
            else:
                return redirect()->back()->with('failed','Failed to update category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function csrCategoryDelete(Request $request)
    {
        $category = CsrCategories::where('id', $request->Id)->first();
        if(isset($request->Id) && $category->id == $request->Id):
            $categoryDelete = CsrCategories::where('id', $request->Id)->delete();
            if($categoryDelete > 0):
                $csr = Csr::where('category_id',$request->Id)->get();
                foreach($csr as $value):
                    $thumbImage = $value->thumb_image;
                    $largeImage = $value->large_image;
                    $pdfFile    = $value->pdf_file;
                    $delete = Csr::where('id',$value->id)->delete();
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

    public function csrIndex(Request $request)
    {
        $CsrCategories = CsrCategories::where('status',1)->orderBy('id','DESC')->get();
        return view('csr.csr_add', compact('CsrCategories'));
    }

    public function csrSave(Request $request)
    {
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'required|image|mimes:jpeg,png,jpg',
            'large_image'  =>   'required|image|mimes:jpeg,png,jpg',
            'document_pdf' =>   'required|mimes:pdf',
        ]);
        //dd($request->all());
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','csr/');
            $uploadLargeImage = $this->uploadFile($request,'large_image','csr/');
            $uploadpdfFile = $this->uploadFile($request,'document_pdf','csr/');
            $csr = Csr::create(['category_id' => $request->categoryId,'short_description'=>$request->short_description,'long_description'=>$request->long_description, 'title'=>$request->title,  'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile,'date'=>date('d-m-Y',strtotime($request->date))])->id;
            if($csr > 0):
                return redirect()->route('csr.list')->with('success','Successfully saved data');
            else:
                return redirect()->back()->with('failed','Failed to save data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function csrList(Request $request)
    {
        $PageSub = PageSubTitles::where('page_type', 4)->first();
        $CsrList = Csr::where('status',1)->orderBy('id','DESC')->get();
        return view('csr.csr_list', compact('CsrList','PageSub'));
    }

    public function csrEdit(Request $request)
    {
        $csr = Csr::where('id',$request->Id)->first();
        if(isset($request->Id) && $csr->id == $request->Id):
            $CsrCategories = CsrCategories::where('status',1)->orderBy('id','DESC')->get();
            return view('csr.csr_edit', compact('CsrCategories','csr'));
        else:
            return redirect()->back();
        endif;
    }

    public function csrUpdate(Request $request)
    {
        request()->validate([
            'title'        =>   'required',
            'thumb_image'  =>   'image|mimes:jpeg,png,jpg',
            'large_image'  =>   'image|mimes:jpeg,png,jpg',
            'document_pdf' =>   'mimes:pdf',
        ]);
        //dd($request->all());
        $csr = Csr::where('id',$request->Id)->first();
        try {
            $uploadThumbImage = $this->uploadFile($request,'thumb_image','csr/');
            if(isset($uploadThumbImage) && file_exists($uploadThumbImage)):
                if(file_exists($csr->thumb_image)):
                    unlink($csr->thumb_image);
                endif;
                $uploadThumbImage = $uploadThumbImage;
            else:
                $uploadThumbImage = $csr->thumb_image;
            endif;
            $uploadLargeImage = $this->uploadFile($request,'large_image','csr/');
            if(isset($uploadLargeImage) && file_exists($uploadLargeImage)):
                if(file_exists($csr->large_image)):
                    unlink($csr->large_image);
                endif;
                $uploadLargeImage = $uploadLargeImage;
            else:
                $uploadLargeImage = $csr->large_image;
            endif;
            $uploadpdfFile = $this->uploadFile($request,'document_pdf','csr/');
            if(isset($uploadpdfFile) && file_exists($uploadpdfFile)):
                if(file_exists($csr->pdf_file)):
                    unlink($csr->pdf_file);
                endif;
                $uploadpdfFile = $uploadpdfFile;
            else:
                $uploadpdfFile = $csr->pdf_file;
            endif;
            $csr = Csr::where('id', $csr->id)->update(['category_id' => $request->categoryId, 'title'=>$request->title,'short_description'=>$request->short_description,'long_description'=>$request->long_description, 'thumb_image'=>$uploadThumbImage,'large_image'=>$uploadLargeImage, 'pdf_file'=>$uploadpdfFile,'date'=>date('d-m-Y',strtotime($request->date))]);
            if($csr > 0):
                return redirect()->route('csr.list')->with('success','Successfully updated data');
            else:
                return redirect()->back()->with('failed','Failed to update data');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function csrDelete(Request $request)
    {
        $csr = Csr::where('id',$request->Id)->first();
        if(isset($request->Id) && $csr->id == $request->Id):
            $thumbImage = $csr->thumb_image;
            $largeImage = $csr->large_image;
            $pdfFile    = $csr->pdf_file;
            $csr = Csr::where('id', $csr->id)->delete();
            if($csr > 0):
                if(file_exists($thumbImage)):
                    unlink($thumbImage);
                endif;
                if(file_exists($largeImage)):
                    unlink($largeImage);
                endif;
                if(file_exists($pdfFile)):
                    unlink($pdfFile);
                endif;
                return redirect()->route('csr.list')->with('success','Successfully deleted data');
            else:
                return redirect()->back()->with('failed','Failed to delete data');
            endif;
        else:
            return redirect()->back();
        endif;
    }
}
