<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioModel as Portfolio;
use App\FeatureProjectModel as FeatureProject;
use App\FeatureProjectSlider1Model as FeatureProjectSlider1;
use App\FeatureProjectSlider2Model as FeatureProjectSlider2;
use App\FeatureProjectSlider3Model as FeatureProjectSlider3;
class projectsController extends Controller
{
    public function addFeatureProject(Request $request)
    {
        $portfolios = Portfolio::where('status', 1)->get();
        return view('projects.featureproject_add', compact('portfolios'));
    }

    public function saveFeatureProject(Request $request)
    {
        request()->validate([
            'projectId'  =>  'required',
            'slider1Image' =>  'image|mimes:jpeg,png,jpg',
            'slider2Logo' =>  'image|mimes:jpeg,png,jpg',
            'slider3MainImage' =>  'image|mimes:jpeg,png,jpg',
        ]);
        try {
            $featureProjects = FeatureProject::create(['portfolio_id' => $request->projectId,'explore_label' => $request->exploreTitle])->id;
            if($featureProjects > 0):
                /* slider 1 */
                $slider1Image = $this->uploadFile($request,'slider1Image','featureProjects/'.$request->projectId.'/slider1');
                $slider1Data = ['project_id' => $featureProjects,'title'=>$request->slider1Title,'sub_title'=>$request->slider1SubTitle,'image'=>$slider1Image];
                FeatureProjectSlider1::create($slider1Data)->id;

                /* slider 2 */
                $logoSlider2Image = $this->uploadFile($request,'slider2Logo','featureProjects/'.$request->projectId.'/slider2');
                $slider2MainImage = $this->uploadFile($request,'slider2MainImage','featureProjects/'.$request->projectId.'/slider2');
                $slider2MainData = ['project_id'=>$featureProjects,'type'=>1,'logo'=>$logoSlider2Image,'image'=>$slider2MainImage];
                FeatureProjectSlider2::create($slider2MainData)->id;
                $slider2Images = $this->multiUploadFiles($request,'slider2Image','featureProjects/'.$request->projectId.'/slider2');
                if(count($slider2Images) > 0):
                    foreach ($request->slider2Title as $key => $slider2Title):
                        if(isset($slider2Images[$key])):
                            $slider2PointersData = ['project_id'=>$featureProjects,'type'=>2,'bp_image'=>$slider2Images[$key],'bp_title'=>$slider2Title];
                            FeatureProjectSlider2::create($slider2PointersData)->id;
                        else:
                            if(isset($slider2Title)):
                                $slider2PointersData = ['project_id'=>$featureProjects,'type'=>2,'bp_title'=>$slider2Title];
                                FeatureProjectSlider2::create($slider2PointersData)->id;
                            endif;
                        endif;
                    endforeach;
                else:
                    foreach ($request->slider2Title as $key => $slider2Title):
                        if(isset($slider2Title)):
                            $slider2PointersData = ['project_id'=>$featureProjects,'type'=>2,'bp_title'=>$slider2Title];
                            FeatureProjectSlider2::create($slider2PointersData)->id;
                        endif;
                    endforeach;
                endif;

                /* slider 3 */
                $slider3MainImage = $this->uploadFile($request,'slider3MainImage','featureProjects/'.$request->projectId.'/slider3');
                $slider3MainData = ['project_id'=>$featureProjects,'type'=>1,'image'=>$slider3MainImage];
                FeatureProjectSlider3::create($slider3MainData)->id;
                $slider3Images = $this->multiUploadFiles($request,'slider3Image','featureProjects/'.$request->projectId.'/slider3');
                if(count($slider3Images) > 0):
                    foreach ($request->slider3Title as $key => $slider3Title):
                        if(isset($slider3Images[$key])):
                            $slider3PointersData = ['project_id'=>$featureProjects,'type'=>2,'bp_image'=>$slider3Images[$key],'bp_title'=>$slider3Title];
                            FeatureProjectSlider3::create($slider3PointersData)->id;
                        else:
                            if(isset($slider3Title)):
                                $slider3PointersData = ['project_id'=>$featureProjects,'type'=>2,'bp_title'=>$slider3Title];
                                FeatureProjectSlider3::create($slider3PointersData)->id;
                            endif;
                        endif;
                    endforeach;
                else:
                    foreach ($request->slider3Title as $key => $slider3Title):
                        if(isset($slider3Title)):
                            $slider3PointersData = ['project_id'=>$featureProjects,'type'=>2,'bp_title'=>$slider3Title];
                            FeatureProjectSlider3::create($slider3PointersData)->id;
                        endif;
                    endforeach;
                endif;

                return redirect()->route('featureProjectList')->with('success','Successfully saved Feature project');
            else:
                return redirect()->back()->with('failed','Failed to save Feature project');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function featureProjectList()
    {
        $featureProjects = FeatureProject::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('projects.featureproject_list', compact('featureProjects'));
    }

    public function editFeatureProject(Request $request)
    {
        $featureProject = FeatureProject::where('id', $request->featureProject_id)->first();
        if(isset($featureProject)):
            $portfolios = Portfolio::where('status', 1)->get();
            $sliderOne = FeatureProjectSlider1::where('project_id', $featureProject->id)->first();
            $sliderTwo = FeatureProjectSlider2::where(['project_id' => $featureProject->id, 'type' => 2])->get();
            $sliderMainTwo = FeatureProjectSlider2::where(['project_id' => $featureProject->id, 'type' => 1])->first();
            $sliderThree = FeatureProjectSlider3::where(['project_id' => $featureProject->id, 'type' => 2])->get();
            $sliderMainThree = FeatureProjectSlider3::where(['project_id' => $featureProject->id, 'type' => 1])->first();
            return view('projects.featureproject_edit', compact('portfolios','featureProject','sliderOne','sliderTwo', 'sliderMainTwo','sliderMainThree','sliderThree'));
        else:
            return redirect()->back()->with('failed','Invalid request to edit feature project!');
        endif;
    }

    public function updateFeatureProject(Request $request)
    {
        //dd($request->all());
        request()->validate([
            'projectId'  =>  'required',
            'slider1Image' =>  'image|mimes:jpeg,png,jpg',
            'slider2Logo' =>  'image|mimes:jpeg,png,jpg',
            'slider3MainImage' =>  'image|mimes:jpeg,png,jpg',
        ]);
        try {
            $featureProject = FeatureProject::where('id', $request->featureProject_id)->first();
            if(isset($featureProject)):
                $featureProjects = FeatureProject::where('id', $request->featureProject_id)->update(['portfolio_id' => $request->projectId,'explore_label' => $request->exploreTitle]);
                if($featureProjects > 0):
                    $featureProjects = $request->featureProject_id;
                    //slider 1
                    if(isset($request->sliderOne_id)):
                        $sliderOne = FeatureProjectSlider1::where(['project_id'=>$featureProject->id,'id'=>$request->sliderOne_id])->first();
                        $slider1Image = $this->uploadFile($request,'slider1Image','featureProjects/'.$request->projectId.'/slider1');
                        if(isset($slider1Image) && file_exists($slider1Image)):
                            if(isset($sliderOne->image) && file_exists($sliderOne->image)):
                                //unlink($sliderOne->image);
                            endif;
                            $slider1Image = $slider1Image;
                        else:
                            $slider1Image = $sliderOne->image;
                        endif;
                        //FeatureProjectSlider1::where(['project_id'=>$featureProject->id,'id'=>$request->sliderOne_id])->update(['title'=>$request->slider1Title,'sub_title'=>$request->slider1SubTitle,'image'=>$slider1Image]);
                    else:
                        $slider1Image = $this->uploadFile($request,'slider1Image','featureProjects/'.$request->projectId.'/slider1');
                        $slider1Data = ['project_id' => $featureProjects,'title'=>$request->slider1Title,'sub_title'=>$request->slider1SubTitle,'image'=>$slider1Image];
                        FeatureProjectSlider1::create($slider1Data)->id;
                    endif;

                    //slider 2
                    if(isset($request->sliderTwo_id)):
                        $sliderTwoMain = FeatureProjectSlider2::where(['project_id'=>$featureProject->id,'id'=>$request->sliderTwo_id])->first();
                        $logoSlider2Image = $this->uploadFile($request,'slider2Logo','featureProjects/'.$request->projectId.'/slider2');
                        if(isset($logoSlider2Image) && file_exists($logoSlider2Image)):
                            if(file_exists($sliderTwoMain->logo)):
                                unlink($sliderTwoMain->logo);
                            endif;
                            $logoSlider2Image = $logoSlider2Image;
                        else:
                            $logoSlider2Image = $sliderTwoMain->logo;
                        endif;

                        $slider2MainImage = $this->uploadFile($request,'slider2MainImage','featureProjects/'.$request->projectId.'/slider2');
                        if(isset($slider2MainImage) && file_exists($slider2MainImage)):
                            if(file_exists($sliderTwoMain->image)):
                                unlink($sliderTwoMain->image);
                            endif;
                            $slider2MainImage = $slider2MainImage;
                        else:
                            $slider2MainImage = $sliderTwoMain->image;
                        endif;

                        //FeatureProjectSlider2::where(['project_id'=>$featureProject->id,'id'=>$request->sliderTwo_id])->update(['project_id'=>$featureProjects,'type'=>1,'logo'=>$logoSlider2Image,'image'=>$slider2MainImage]);
                    else:
                        $logoSlider2Image = $this->uploadFile($request,'slider2Logo','featureProjects/'.$request->projectId.'/slider2');
                        $slider2MainImage = $this->uploadFile($request,'slider2MainImage','featureProjects/'.$request->projectId.'/slider2');
                        //FeatureProjectSlider2::create(['project_id'=>$featureProjects,'type'=>1,'logo'=>$logoSlider2Image,'image'=>$slider2MainImage])->id;
                    endif;
                    //slider 2 Pointers
                    $sliderTwoData = FeatureProjectSlider2::where(['project_id' =>$request->featureProject_id,'type'=>2])->get(); //delete others
                    foreach ($sliderTwoData as $exvalue):
                        if(!in_array($exvalue->id,$request->slider2Ids)):
                            /*if(!empty($exvalue->bp_image) && file_exists($exvalue->bp_image)):
                                unlink($exvalue-bp_image);
                            endif;*/
                            FeatureProjectSlider2::whereId($exvalue->id)->delete();
                        endif;
                    endforeach;
                    $slider2Images = $this->multiUploadFiles($request,'slider2Image','featureProjects/'.$request->projectId.'/slider2');
                    foreach ($request->slider2Title as $key => $slider2Title):
                        if(isset($request->slider2Ids[$key])):
                            //$sliderTwoDataExisting = FeatureProjectSlider2::where(['project_id' =>$request->featureProject_id,'id'=>$request->slider2Ids[$key],'type'=>2])->first();
                            if(isset($slider2Images[$key]) && isset($request->slider2Ids[$key])):
                                if(file_exists($request->uploadedSlider2BulletImages[$key])):
                                    //unlink($request->uploadedSlider2BulletImages[$key]);
                                endif;
                                $slider2PointImage = $slider2Images[$key];
                            else:
                                if(isset($request->uploadedSlider2BulletImages[$key])):
                                    $slider2PointImage = $request->uploadedSlider2BulletImages[$key];
                                else:
                                    $slider2PointImage = '';
                                endif;
                            endif;
                            $featureProject2Data = ['project_id'=>$featureProjects,'type'=>2,'bp_image'=>$slider2PointImage,'bp_title'=>$slider2Title];
                            FeatureProjectSlider2::where('id', $request->slider2Ids[$key])->update($featureProject2Data);
                        else:
                            if(isset($slider2Images[$key])):
                                $slider2PointImage = $slider2Images[$key];
                            else:
                                $slider2PointImage = '';
                            endif;
                            $featureProject2Data = ['project_id'=>$featureProjects,'type'=>2,'bp_image'=>$slider2PointImage,'bp_title'=>$slider2Title];
                            FeatureProjectSlider2::create($featureProject2Data)->id;
                        endif;
                        echo "<pre>";
                            print_r($featureProject2Data);
                        echo "</pre>";
                    endforeach;


                    //slider 3
                    if(isset($request->sliderThree_id)):
                        $sliderThreeMain = FeatureProjectSlider3::where(['project_id'=>$featureProject->id,'id'=>$request->sliderThree_id])->first();
                        $slider3MainImage = $this->uploadFile($request,'slider3MainImage','featureProjects/'.$request->projectId.'/slider3');
                        if(isset($slider3MainImage) && file_exists($slider3MainImage)):
                            if(file_exists($sliderThreeMain->image)):
                                unlink($sliderThreeMain->image);
                            endif;
                            $slider3MainImage = $slider3MainImage;
                        else:
                            $slider3MainImage = $sliderThreeMain->image;
                        endif;
                        FeatureProjectSlider3::where(['project_id'=>$featureProject->id,'id'=>$request->sliderThree_id])->update(['project_id'=>$featureProjects,'type'=>1,'image'=>$slider3MainImage]);
                    else:
                        $slider3MainImage = $this->uploadFile($request,'slider3MainImage','featureProjects/'.$request->projectId.'/slider3');
                        FeatureProjectSlider3::create(['project_id'=>$featureProjects,'type'=>1,'image'=>$slider3MainImage])->id;
                    endif;
                    //slider 3 Pointers
                    $slider3Images = $this->multiUploadFiles($request,'slider3Image','featureProjects/'.$request->projectId.'/slider3');
                    $sliderThreeData = FeatureProjectSlider3::where(['project_id' =>$request->featureProject_id,'type'=>2])->get();
                    foreach ($sliderThreeData as $exvalue):
                        if(!in_array($exvalue->id,$request->slider3Ids)):
                            /*if(!empty($exvalue->bp_image) && file_exists($exvalue->bp_image)):
                                unlink($exvalue-bp_image);
                            endif;*/
                            FeatureProjectSlider3::where('id', $exvalue->id)->delete();
                        endif;
                    endforeach;
                    foreach ($request->slider3Title as $key => $slider3Title):
                        if(isset($request->slider3Ids[$key])):
                            $sliderThreeDataExisting = FeatureProjectSlider3::where(['project_id' =>$request->featureProject_id,'id' => $request->slider3Ids[$key],'type'=>2])->first();
                            if(isset($slider3Images[$key]) && isset($request->slider3Ids[$key])):
                                if(file_exists($request->uploadedSlider3BulletImages[$key])):
                                    unlink($request->uploadedSlider3BulletImages[$key]);
                                endif;
                                $slider3PointImage = $slider3Images[$key];
                            else:
                                if(isset($request->uploadedSlider3BulletImages[$key])):
                                    $slider3PointImage = $request->uploadedSlider3BulletImages[$key];
                                else:
                                    $slider3PointImage = '';
                                endif;
                            endif;
                            FeatureProjectSlider3::where(['id'=>$request->slider3Ids[$key],'project_id'=>$featureProjects])->update(['project_id'=>$featureProjects,'type'=>2,'bp_image'=>$slider3PointImage,'bp_title'=>$slider3Title]);
                        else:
                            if(isset($slider3Images[$key])):
                                $slider3PointImage = $slider3Images[$key];
                            else:
                                $slider3PointImage = '';
                            endif;
                            FeatureProjectSlider3::create(['project_id'=>$featureProjects,'type'=>2,'bp_image'=>$slider3PointImage,'bp_title'=>$slider3Title])->id;
                        endif;
                    endforeach;


                    return redirect()->route('featureProjectList')->with('success','Successfully updated Feature project');
                else:
                    return redirect()->back()->with('failed','Failed to update Feature project');
                endif;
            else:
                return redirect()->back()->with('error','Invalid feature project to update data!');
            endif;
        }catch (\Exception $exception) {
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }

    }

    public function deleteFeatureProject(Request $request)
    {
        //dd($request->featureProject_id);
        $featureProject = FeatureProject::where('id', $request->featureProject_id)->first();
        if (isset($featureProject)):
            try {
                $deleteproject = FeatureProject::whereId($request->featureProject_id)->update(['status'=>0]);
                if($deleteproject > 0):
                    //slider 1
                    $sliderOne = FeatureProjectSlider1::where(['project_id'=>$request->featureProject_id])->get();
                    if(isset($sliderOne) > 0):
                        foreach ($sliderOne  as $one):
                            if(isset($one->image) && file_exists($one->image)):
                                //unlink($one->image);
                            endif;
                            FeatureProjectSlider1::whereId($one->id)->update(['status'=>0]);
                        endforeach;
                    endif;

                    //slider 2
                    $sliderTwo = FeatureProjectSlider2::where(['project_id'=>$request->featureProject_id])->get();
                    if(count($sliderTwo) > 0):
                        foreach ($sliderTwo  as $two):
                            if(isset($two->image) && file_exists($two->image)):
                                //unlink($two->image);
                            endif;
                            if(isset($two->logo) && file_exists($two->logo)):
                                //unlink($two->logo);
                            endif;
                            if(isset($two->bp_image) && file_exists($two->bp_image)):
                                //unlink($two->bp_image);
                            endif;
                            FeatureProjectSlider2::whereId($two->id)->update(['status'=>0]);
                        endforeach;
                    endif;

                    //slider 3
                    $sliderThree = FeatureProjectSlider2::where(['project_id'=>$request->featureProject_id])->get();
                    if(count($sliderThree) > 0):
                        foreach ($sliderThree  as $three):
                            if(isset($three->image) && file_exists($three->image)):
                                //unlink($three->image);
                            endif;

                            if(isset($three->bp_image) && file_exists($three->bp_image)):
                                //unlink($three->bp_image);
                            endif;
                            FeatureProjectSlider3::whereId($three->id)->update(['status'=>0]);
                        endforeach;
                    endif;

                    return redirect()->route('featureProjectList')->with('success','Successfully deleted Feature project');
                else:
                    return redirect()->back()->with('failed','Failed to delete feature project!');
                endif;
            }catch (\Exception $exception) {
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','Invalid request to delete feature project!');
        endif;
    }
}
