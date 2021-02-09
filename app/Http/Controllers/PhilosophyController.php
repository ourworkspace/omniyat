<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,Session;
use App\PhilosophyModel as Philosophy;
class PhilosophyController extends Controller
{

    public function philosophyIndex(Request $request)
    {
        $philosophy = Philosophy::where('status', 1)->first();
        $title_3_data = isset($philosophy->title_3)?explode(',', $philosophy->title_3):[];

        return view('philosophy.philosophy_index', compact('philosophy','title_3_data'));
    }

    public function savePhilosophy(Request $request)
    {
        request()->validate([
            'image_1'  =>  'image|mimes:jpeg,png,jpg',
            'description_1'=>  'required',
            'image_2_1'  =>  'image|mimes:jpeg,png,jpg',
            'description_2'=>  'required',
            'image_2_2'  =>  'image|mimes:jpeg,png,jpg',
            'title_3'   => 'required',
            'description_3'=>  'required'
        ]);

        try {
            $title3String = implode(',',$request->title_3);
            //echo $thestring;
            $philosophyImg1 = $this->uploadFile($request,'image_1','Philosophy');
            $philosophyImg21 = $this->uploadFile($request,'image_2_1','Philosophy');
            $philosophyImg22 = $this->uploadFile($request,'image_2_2','Philosophy');
            $savePhilosophy = Philosophy::create(['image_1'=>$philosophyImg1,'description_1'=>$request->description_1,'image_2_1'=>$philosophyImg21,'description_2'=>$request->description_2,'image_2_2'=>$philosophyImg22,'title_3'=>$title3String,'description_3'=>$request->description_3,'sub_title'=>$request->sub_title,'title_4_1'=>$request->title_4_1,'title_4_2'=>$request->title_4_2,'button_text'=>$request->button_text,'button_url'=>$request->button_url])->id;
            if($savePhilosophy > 0):
                return redirect()->back()->with('success','Successfully saved Philosophy');
            else:
                return redirect()->back()->with('failed','Failed to save Philosophy');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function updatePhilosophy(Request $request)
    {
        /*echo "<pre>";
        print_r($request->all());exit();*/
        request()->validate([
            'image_1'  =>  'image|mimes:jpeg,png,jpg',
            'description_1'=>  'required',
            'image_2_1'  =>  'image|mimes:jpeg,png,jpg',
            'description_2'=>  'required',
            'image_2_2'  =>  'image|mimes:jpeg,png,jpg',
            'title_3'   => 'required',
            'description_3'=>  'required'
        ]);
        if(isset($request->philosophy_id)):
            try {
                $philosophy = Philosophy::where('id', $request->philosophy_id)->first();
                
                $philosophyImg1 = $this->uploadFile($request,'image_1','Philosophy');
                if(isset($philosophyImg1) && file_exists($philosophyImg1)):
                    if(isset($philosophy->image_1) && file_exists($philosophy->image_1)):
                        unlink($philosophy->image_1);
                    endif;
                    $philosophyImg1 = $philosophyImg1;
                else:
                    $philosophyImg1 = $philosophy->image_1;
                endif;

                $philosophyImg21 = $this->uploadFile($request,'image_2_1','Philosophy');
                if(isset($philosophyImg21) && file_exists($philosophyImg21)):
                    if(isset($philosophy->image_2_1) && file_exists($philosophy->image_2_1)):
                        unlink($philosophy->image_2_1);
                    endif;
                    $philosophyImg21 = $philosophyImg21;
                else:
                    $philosophyImg21 = $philosophy->image_2_1;
                endif;

                $philosophyImg22 = $this->uploadFile($request,'image_2_2','Philosophy');
                if(isset($philosophyImg22) && file_exists($philosophyImg22)):
                    if(isset($philosophy->image_2_2) && file_exists($philosophy->image_2_2)):
                        unlink($philosophy->image_2_2);
                    endif;
                    $philosophyImg22 = $philosophyImg22;
                else:
                    $philosophyImg22 = $philosophy->image_2_2;
                endif;
                $title3String = implode(',',$request->title_3);
                $updatePhilosophy = Philosophy::where('id', $request->philosophy_id)->update(['image_1'=>$philosophyImg1,'description_1'=>$request->description_1,'image_2_1'=>$philosophyImg21,'description_2'=>$request->description_2,'image_2_2'=>$philosophyImg22,'title_3'=>$title3String,'description_3'=>$request->description_3,'sub_title'=>$request->sub_title,'title_4_1'=>$request->title_4_1,'title_4_2'=>$request->title_4_2,'button_text'=>$request->button_text,'button_url'=>$request->button_url]);
                if($updatePhilosophy > 0):
                    return redirect()->back()->with('success','Successfully updated Philosophy');
                else:
                    return redirect()->back()->with('failed','Failed to update Philosophy');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('error','Invalid request to update Philosophy');
        endif;
    }

    public function chairmanNewLetterIndex(Request $request)
    {
        return view('cms_pages.chairman_newsletters_add');
    }

}
