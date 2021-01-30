<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,Session;
use App\CategoriesModel as Categories;
class CategoriesController extends Controller
{
    public function categories(Request $request)
    {
        $categories = Categories::where('status', 1)->get();
        return view('categories.category', compact('categories'));
    }

    public function editCategories(Request $request)
    {
        if(isset($request->category_id)):
            $category = Categories::where('id', $request->category_id)->first();
            $categories = Categories::where('status', 1)->whereNotIn('id', [$request->category_id])->get();
            return view('categories.category_edit', compact('categories','category'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit category');
        endif;
    }

    public function saveCategory(Request $request){
        request()->validate([
            'title'  =>  'required|string|max:255',
            'image' =>  'required|image|mimes:jpeg,png,jpg'
        ]);
        try {
            $categoryImages = $this->uploadFile($request,'image','categories');
            $category = Categories::create(['name' => $request->title, 'image' => $categoryImages])->id;
            if($category > 0):
                return redirect()->back()->with('success','Successfully saved category');
            else:
                return redirect()->back()->with('failed','Failed to save category');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function updateCategory(Request $request)
    {
        request()->validate([
            'title'  =>  'required|string|max:255',
            'image' =>  'image|mimes:jpeg,png,jpg'
        ]);
        $category = Categories::where('id', $request->category_id)->first();
        if(isset($category)):
            try {
                $categoryImages = $this->uploadFile($request,'image','categories');
                if(!empty($categoryImages)):
                    if(file_exists($category->image)):
                        @unlink($category->image);
                    endif;
                    $categoryImages = $categoryImages;
                else:
                    $categoryImages = $category->image;
                endif;
                $categoryUpdate = Categories::where('id', $request->category_id)->update(['name' => $request->title, 'image' => $categoryImages]);
                if($categoryUpdate > 0):
                    return redirect()->route('categories')->with('success','Successfully updated category');
                else:
                    return redirect()->back()->with('failed','Failed to update category');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','invalid request to update category');
        endif;
    }

    public function deleteCategory(Request $request)
    {
        $category = Categories::where('id', $request->category_id)->first();
        if(isset($category)):
            try {
                $image = $category->image;
                $categoryDelete = Categories::where('id', $request->category_id)->delete();
                if($categoryDelete > 0):
                    if(file_exists($image)):
                        @unlink($image);
                    endif;
                    return redirect()->route('categories')->with('success','Successfully deleted category');
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
}
