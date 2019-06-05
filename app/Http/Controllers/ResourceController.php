<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Resource;
use Validator;
use Auth;
use DB;

class ResourceController extends Controller
{
     public function index(Request $request) {

       $all_details = Resource::all()->toArray();

       //echo '<pre>';print_r($all_details);die();

       if(empty($all_details)){
       	return view('admin.cms.resource')->with('resource');
       }

       else{
       	return view('admin.cms.resource')->with('resource',$all_details[0]);
       }	
     }

     public function save_resource(Request $request){

     	$resource_data = Resource::all()->toArray();

     	Validator::make($request->all(),[
            'title' => 'required',
            'content' => 'required',
            'content_2' => 'required'

            ],[

            'title.required' => 'Please enter title',
            'content.required' => 'Please enter first content',
            'content_2.required' => 'Please enter second content'

            ])->validate();

     	if(empty($resource_data)){
         $resource_details = new Resource();
         $resource_details->title = $request->title;
         $resource_details->content = $request->content;  
         $resource_details->content_2 = $request->content_2;  

         if ($resource_details->save()) {
              $request->session()->flash("submit-status", 'Data added successfully.');
              return redirect('/admin/cms/resource');
           }

     	}

     	else{
         $id = $resource_data[0]['id'];
         $resource_details = Resource::find($id);
         $resource_details->title = $request->title;
         $resource_details->content = $request->content;  
         $resource_details->content_2 = $request->content_2;   

         if ($resource_details->save()) {
              $request->session()->flash("submit-status", 'Data updated successfully.');
              return redirect('/admin/cms/resource');
           }

     	}

     }
}
