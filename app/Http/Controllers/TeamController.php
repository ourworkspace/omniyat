<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeamModel as Team;

class TeamController extends Controller
{
    public function teamMembers(Request $request)
    {
        return view('team.team');
    }

    public function teamSaveMembers(Request $request)
    {
        request()->validate([
            'name'  =>  'required|string|max:255',
            'designation'  =>  'required|string|max:255',
            'description'  =>  'string|max:255',
            'image' =>  'required|image|mimes:jpeg,png,jpg',
        ]);

        try {
            $teamImage = $this->uploadFile($request,'image','teamMembers');
            $dataSave = Team::create(['name' =>$request->name,'image' => $teamImage,'designation'=>$request->designation,'description'=>$request->description])->id;
            if($dataSave > 0):
                return redirect()->route('team.members.list')->with('success','Successfully saved team member');
            else:
                if(isset($teamImage) && file_exists($teamImage)):
                    unlink($teamImage);
                endif;
                return redirect()->back()->with('failed','Failed to save team member');
            endif;
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
        }
    }

    public function teamMembersList(Request $request)
    {
        $team = Team::where('status', 1)->get();
        return view('team.team_list', compact('team'));
    }

    public function teamMemberEdit(Request $request)
    {
        $team = Team::where('id', $request->team_id)->first();
        return view('team.team', compact('team'));
    }

    public function teamUpdateMembers(Request $request)
    {
        request()->validate([
            'name'  =>  'required|string|max:255',
            'designation'  =>  'required|string|max:255',
            'description'  =>  'string|max:255',
            'image' =>  'required|image|mimes:jpeg,png,jpg',
        ]);

        $team = Team::where('id', $request->team_id)->first();
        if(isset($team) && $team->id == $request->team_id):
            try {
                $teamImage = $this->uploadFile($request,'image','teamMembers');
                if(isset($teamImage) && file_exists($teamImage)):
                    if(isset($team->image) && file_exists($team->image)):
                        unlink($team->image);
                    endif;
                    $teamImage = $teamImage;
                else:
                    $teamImage = $team->image;
                endif;
                $dataSave = Team::where('id', $request->team_id)->update(['name' =>$request->name,'image' => $teamImage,'designation'=>$request->designation,'description'=>$request->description]);
                if($dataSave > 0):
                    return redirect()->route('team.members.list')->with('success','Successfully updated team member');
                else:
                    if(isset($teamImage) && file_exists($teamImage)):
                        unlink($teamImage);
                    endif;
                    return redirect()->back()->with('failed','Failed to update team member');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','Invalid request to update team member');
        endif;
    }

    public function teamMemberDelete(Request $request)
    {
        $team = Team::where('id', $request->team_id)->first();
        if(isset($team) && $team->id == $request->team_id):
            try {
                if(isset($team->image) && file_exists($team->image)):
                    unlink($team->image);
                endif;
                $dataDelete = Team::where('id', $request->team_id)->delete();
                if($dataDelete > 0):
                    return redirect()->route('team.members.list')->with('success','Successfully deleted team member');
                else:
                    return redirect()->back()->with('failed','Failed to delete team member');
                endif;
            }catch (\Exception $exception){
                return redirect()->back()->with('error','Oop\'s error : '.$exception->getMessage());
            }
        else:
            return redirect()->back()->with('failed','Invalid request to delete team member');
        endif;
    }
}
