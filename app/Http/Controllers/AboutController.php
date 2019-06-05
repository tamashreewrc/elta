<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\About;
use Validator;
use Auth;
use Image;
use DB;

class AboutController extends Controller
{
  public function index(Request $request){

  	$about_details = About::all()->toArray();

  	if(empty($about_details)){
      return view('admin.cms.about_us')->with('about');
  	}

  	else{
      return view('admin.cms.about_us')->with('about',$about_details[0]);
  	}
  } 

  public function save_about(Request $request){

  	$about_data = About::all()->toArray();

  	if(empty($about_data)){

  		Validator::make($request->all(),[
            'title' => 'required',
            'top_content' => 'required',
            'bottom_content' => 'required',   
            'banner' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ],[
            'title.required' => 'Please enter title',
            'top_content.required' => 'Please enter top content',
            'bottom_content.required' => 'Please enter bottom content',   
            'banner.required' => 'Please upload image for banner',
            'banner.*.mimetypes' => 'Please upload correct file',
            'banner.*.max' => 'Please upload file within 6MB'
        ])->validate();	


        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $fileName1 = time().'_'.$file->getClientOriginalName();
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/cms/about_us/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName1);
            //original destination path
            $destinationPath = public_path().'/upload/cms/about_us/original/';
            $file->move($destinationPath,$fileName1);
           }

         
         $about_details =  new About();
         $about_details->title = $request->title;
         $about_details->top_content = $request->top_content;
         $about_details->bottom_content = $request->bottom_content;
         $about_details->banner = $fileName1;

         if ($about_details->save()) {
              $request->session()->flash("submit-status", 'Data added successfully.');
              return redirect('/admin/cms/about_us');
           }

  	}

  	else{

  		Validator::make($request->all(),[
            'title' => 'required',
            'top_content' => 'required',
            'bottom_content' => 'required',
            'banner' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'  
        ],[
            'title.required' => 'Please enter title',
            'top_content.required' => 'Please enter top content',
            'bottom_content.required' => 'Please enter bottom content',  
            'banner.*.mimetypes' => 'Please upload correct file',
            'banner.*.max' => 'Please upload file within 6MB'
        ])->validate();	


        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $fileName1 = time().'_'.$file->getClientOriginalName();
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/cms/about_us/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName1);
            //original destination path
            $destinationPath = public_path().'/upload/cms/about_us/original/';
            $file->move($destinationPath,$fileName1);
           }

         else{
         	$fileName1 = $about_data[0]['banner'];
         }  


         $id = $about_data[0]['id'];
         $about_details = About:: find($id);

         $about_details->title = $request->title;
         $about_details->top_content = $request->top_content;
         $about_details->bottom_content = $request->bottom_content;
         $about_details->banner = $fileName1;

         if ($about_details->save()) {
              $request->session()->flash("submit-status", 'Data updated successfully.');
              return redirect('/admin/cms/about_us');
           }

  	}


  }


}
	