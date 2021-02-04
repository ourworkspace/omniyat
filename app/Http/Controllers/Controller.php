<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadFile($request,$inputname,$folderpath)
	{
		$filepath = 'public/uploads/'.$folderpath.'/';
		if($request->hasfile($inputname) && $_FILES[$inputname]['name'] != ''){
            $file = $request->file($inputname);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'RD'.rand(1,999).'.'.$extension;
            $file->move($filepath,$filename);
            $uploaddata = $filepath.$filename;
        }else{
			$uploaddata = '';
		}
		return $uploaddata;
    }

    public function multiUploadFiles($request,$inputname,$folderpath)
    {
        $images = [];
        $filepath = 'public/uploads/'.$folderpath.'/';
        if($request->hasfile($inputname)){
            $files = $request->file($inputname);
            //$allowedfileExtension=['pdf','jpg','png','docx'];
            foreach($files as $k => $file){
                //$filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $filename = time().'RD'.rand(1,999).'.'.$extension;
                $file->move($filepath, $filename);
                //copy($file, $filepath.$filename);
                $images[$k] = $filepath. $filename;
            }
        }
        return $images;
    }

    


}
