<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OmniyatTCPModel as OmniyatTCP;
use App\PageSubTitlesModel as PageSubTitles;

class OmniyatTCPController extends Controller
{

    public function PrivacyPolicyIndex(Request $request)
    {
        $privacyPolicy = OmniyatTCP::where('type', 1)->first();
        print_r($privacyPolicy);exit();
        if(isset($privacyPolicy) && isset($privacyPolicy->id)):
            return view('cms_pages.privacy_policy_edit', compact('privacyPolicy'));
        else:
            return view('cms_pages.privacy_policy_add');
        endif;
    }

    public function PrivacyPolicySave(Request $request)
    {
        //dd($request->all());
        try{

            OmniyatTCP::where('type', 1)->delete();
            OmniyatTCP::create(['type'=>1,'sub_title'=>$request->sub_title,'title'=>$request->TitleName,'description'=>$request->Description]);
            return redirect()->back()->with('success','Successfully saved details');

        }catch(\Expection $expection){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function TermsAndConductionsIndex(Request $request)
    {
        $termsAndConduction = OmniyatTCP::where('type', 2)->first();
        if(isset($termsAndConduction) && isset($termsAndConduction->id)):
            return view('cms_pages.terms_and_conduction_edit', compact('termsAndConduction'));
        else:
            return view('cms_pages.terms_and_conduction_add');
        endif;
    }

    public function TermsAndConductionSave(Request $request)
    {
        //dd($request->all());
        try{

            OmniyatTCP::where('type', 2)->delete();
            OmniyatTCP::create(['type'=>2,'sub_title'=>$request->sub_title,'title'=>$request->TitleName,'title'=>$request->TitleName,'description'=>$request->Description]);
            return redirect()->back()->with('success','Successfully saved details');

        }catch(\Expection $expection){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }
    public function subTitleSave(Request $request){
        //echo "string".$request->id;exit();
        if(isset($request->id)&&$request->id!=''){
            PageSubTitles::where('id', $request->id)->update([ 'sub_title'=>$request->sub_title]);
            return redirect()->back()->with('success','Page Sub Title Updated Successfully');
        }else{
            PageSubTitles::create(['page_type'=>$request->page_type,'sub_title'=>$request->sub_title]);
            return redirect()->back()->with('success','Page Sub Title Saved Successfully');
        }

    }

}
