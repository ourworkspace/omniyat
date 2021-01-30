<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OtherPagesModel as OtherPages;

class OtherPagesController extends Controller
{
    public function otherPages(Request $request)
    {
        return view('other_pages.otherPages');
    }

    public function otherPageSaveData(Request $request)
    {
        request()->validate([
            'TitleName'  =>  'required|string|max:255',
            'Description'  =>  'string|required',
        ]);
        try {
            $otherPageSave = OtherPages::create(['title'=>$request->TitleName,'description'=>$request->Description])->id;
            if($otherPageSave > 0):
                return redirect()->route('other.pages.list')->with('success','Successfully saved other page details');
            else:
                return redirect()->back()->with('failed','Failed to save other page details.');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function otherPagesList(Request $request)
    {
        $otherPagesList = OtherPages::orderBy('id', 'DESC')->get();
        return view('other_pages.otherPagesList',compact('otherPagesList'));
    }

    public function otherPagesEdit(Request $request)
    {
        $otherPage = OtherPages::where('id', $request->otherPageId)->first();
        return view('other_pages.otherPages_edit', compact('otherPage'));
    }

    public function otherPageUpdateData(Request $request)
    {
        request()->validate([
            'TitleName'  =>  'required|string|max:255',
            'Description'  =>  'string|required',
        ]);
        $otherPage = OtherPages::where('id', $request->otherPageId)->first();
        if(isset($otherPage)):
            try {
                $otherPageSave = OtherPages::where('id', $request->otherPageId)->update(['title'=>$request->TitleName,'description'=>$request->Description]);
                if($otherPageSave > 0):
                    return redirect()->route('other.pages.list')->with('success','Successfully updated other page details');
                else:
                    return redirect()->back()->with('failed','Failed to update other page details.');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','Invalid request to update otherPage details.');
        endif;
    }

    public function otherPagesDelete(Request $request)
    {
        $otherPage = OtherPages::where('id', $request->otherPageId)->first();
        if(isset($otherPage)):
            try {
                $otherPageSave = OtherPages::where('id', $request->otherPageId)->delete();
                if($otherPageSave > 0):
                    return redirect()->route('other.pages.list')->with('success','Successfully deleted other page details');
                else:
                    return redirect()->back()->with('failed','Failed to delete other page details.');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','Invalid request to delete otherPage data.');
        endif;
    }
}
