<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUsModel as ContactUs;
use DB;
use App\InquireModel as Inquire;

class ContactUsController extends Controller
{
    public function contactUsIndex(Request $request)
    {
        $contactDetails  = ContactUs::where('status',1)->get();
        if(count($contactDetails) > 0):
            $locationDetails = ContactUs::where(['type'=>1,'status'=>1])->get();
            $contactusDetails = ContactUs::where(['type'=>2,'status'=>1])->get();
            $emails = ContactUs::where(['type'=>3,'status'=>1])->get();
            $facebook = ContactUs::where(['type'=>4,'title'=>'facebook','status'=>1])->first();
            $instagram = ContactUs::where(['type'=>4,'title'=>'instagram','status'=>1])->first();
            $twitter = ContactUs::where(['type'=>4,'title'=>'twitter','status'=>1])->first();
            $linkedIn = ContactUs::where(['type'=>4,'title'=>'linkedIn','status'=>1])->first();
            $youtube = ContactUs::where(['type'=>4,'title'=>'youtube','status'=>1])->first();
            $sub_title = ContactUs::where(['type'=>5,'title'=>'sub_title','status'=>1])->first();
            $form_title = ContactUs::where(['type'=>5,'title'=>'form_title','status'=>1])->first();
            $location_title = ContactUs::where(['type'=>5,'title'=>'location_title','status'=>1])->first();
            $contact_title = ContactUs::where(['type'=>5,'title'=>'contact_title','status'=>1])->first();
            //print_r($contact_title);exit();
            //$email_title = ContactUs::where(['type'=>5,'title'=>'email_title','status'=>1])->first();
            $social_title = ContactUs::where(['type'=>5,'title'=>'social_title','status'=>1])->first();
            $terms_cond = ContactUs::where(['type'=>6,'status'=>1])->first();
            $privacy_polocy = ContactUs::where(['type'=>7,'status'=>1])->first();
            $map_locations = DB::table('contact_us as cu1')->select('cu1.*','cu2.description as location_name')->where(['cu1.type'=>8,'cu1.status'=>1])->leftjoin('contact_us as cu2','cu1.id','cu2.title')->get();
            //print_r($map_locations);exit();
            //'contact_us'
            return view('cms_pages.contact_us_edit', compact('locationDetails','contactusDetails','emails','facebook','instagram','twitter','linkedIn','youtube','sub_title','form_title','location_title','social_title','terms_cond','privacy_polocy','contact_title','map_locations'));
        else:
            return view('cms_pages.contact_us_add');
        endif;
    }

    public function contactUsSave(Request $request)
    {
       //dd($request->all());
        try{
            //Location Address
            foreach($request->locationTitle as $key => $lvalue):
                $ldescription = $request->locationAddress[$key];
                ContactUs::create(['type' => 1,'title' => $lvalue,'description'=>$ldescription]);
            endforeach;

            //Contact Numbers
            foreach($request->contactTitle as $key => $cvalue):
                $cdescription = $request->mobileNumber[$key];
                ContactUs::create(['type' => 2,'title' => $cvalue,'description'=>$cdescription]);
            endforeach;

            //Emails
            foreach($request->emails as $key => $evalue):
                ContactUs::create(['type' => 3,'title' => 'email','description'=>$evalue]);
            endforeach;

            //Social Media
            ContactUs::create(['type' => 4,'title' => 'facebook','description'=>$request->facebook]);
            ContactUs::create(['type' => 4,'title' => 'instagram','description'=>$request->instagram]);
            ContactUs::create(['type' => 4,'title' => 'twitter','description'=>$request->twitter]);
            ContactUs::create(['type' => 4,'title' => 'linkedIn','description'=>$request->linkedIn]);
            ContactUs::create(['type' => 4,'title' => 'youtube','description'=>$request->youtube]);
            ContactUs::create(['type' => 5,'title' => 'form_title','description'=>$request->form_title]);
            ContactUs::create(['type' => 5,'title' => 'sub_title','description'=>$request->sub_title]);
            ContactUs::create(['type' => 5,'title' => 'location_title','description'=>$request->section1_title]);
            ContactUs::create(['type' => 5,'title' => 'contact_title','description'=>$request->section2_title]);
            //ContactUs::create(['type' => 5,'title' => 'email_title','description'=>$request->section3_title]);
            ContactUs::create(['type' => 5,'title' => 'social_title','description'=>$request->section4_title]);
            ContactUs::create(['type' => 6,'title' => $request->terms_conditions_title,'description'=>$request->terms_conditions_url]);
            ContactUs::create(['type' => 7,'title' => $request->privacy_policy_title,'description'=>$request->privacy_policy_url]);

            // map locations
            foreach($request->latitude as $key => $evalue):
                $location_id = ContactUs::create(['type' => 8,'title' => $evalue,'description'=>$request->longitude[$key]])->id;
                ContactUs::create(['type' => 9,'title' => $location_id,'description'=>$request->location_name[$key]])->id;
            endforeach;

            return redirect()->back()->with('success','Successfully saved contact details');

        }catch(\Expection $expection){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }
    
    public function contactUsUpdate(Request $request)
    {
       //dd($request->all());
        try{
            ContactUs::truncate();

            //dd($request->all());
            
            //Location Address
            foreach($request->locationTitle as $key => $lvalue):
                $ldescription = $request->locationAddress[$key];
                ContactUs::create(['type' => 1,'title' => $lvalue,'description'=>$ldescription]);
            endforeach;

            //Contact Numbers
            foreach($request->contactTitle as $key => $cvalue):
                $cdescription = $request->mobileNumber[$key];
                ContactUs::create(['type' => 2,'title' => $cvalue,'description'=>$cdescription]);
            endforeach;

            //Emails
            foreach($request->emails as $key => $evalue):
                ContactUs::create(['type' => 3,'title' => 'email','description'=>$evalue]);
            endforeach;

            //Social Media
            ContactUs::create(['type' => 4,'title' => 'facebook','description'=>$request->facebook]);
            ContactUs::create(['type' => 4,'title' => 'instagram','description'=>$request->instagram]);
            ContactUs::create(['type' => 4,'title' => 'twitter','description'=>$request->twitter]);
            ContactUs::create(['type' => 4,'title' => 'linkedIn','description'=>$request->linkedIn]);
            ContactUs::create(['type' => 4,'title' => 'youtube','description'=>$request->youtube]);
            ContactUs::create(['type' => 5,'title' => 'form_title','description'=>$request->form_title]);
            ContactUs::create(['type' => 5,'title' => 'sub_title','description'=>$request->sub_title]);
            ContactUs::create(['type' => 5,'title' => 'location_title','description'=>$request->section1_title]);
            ContactUs::create(['type' => 5,'title' => 'contact_title','description'=>$request->section2_title]);
            //ContactUs::create(['type' => 5,'title' => 'email_title','description'=>$request->section3_title]);
            ContactUs::create(['type' => 5,'title' => 'social_title','description'=>$request->section4_title]);
            ContactUs::create(['type' => 6,'title' => $request->terms_conditions_title,'description'=>$request->terms_conditions_url]);
            ContactUs::create(['type' => 7,'title' => $request->privacy_policy_title,'description'=>$request->privacy_policy_url]);

            // map locations
            foreach($request->latitude as $key => $evalue):
                $location_id = ContactUs::create(['type' => 8,'title' => $evalue,'description'=>$request->longitude[$key]])->id;
                ContactUs::create(['type' => 9,'title' => $location_id,'description'=>$request->location_name[$key]])->id;
            endforeach;

            return redirect()->back()->with('success','Successfully saved contact details');

        }catch(\Expection $expection){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }


    public function inquiredetailsList(Request $request)
    {
        $inquireList = Inquire::where('status', 1)->get();
        return view('inquire.inquire_list', compact('inquireList'));
    }

}
