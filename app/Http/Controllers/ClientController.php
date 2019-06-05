<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Client;
use \App\Event;
use \App\EventPivot;
use Validator;
use Auth;
use Image;
use DB;

class ClientController extends Controller
{
  public function index(Request $request){
  	$all_clients = Client::where('status','1')->orderby('id','desc')->get()->toArray();  
    return view('admin.client.listing')->with('all_clients',$all_clients); 
   }

   public function add(Request $request){  
    return view('admin.client.add');  
  }

  public function save_client(Request $request){

  	Validator::make($request->all(),[
            'client_name' => 'required',
            'client_image' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ],[
            'client_name.required' => 'Please enter the name of the client',
            'client_image.required' => 'Please upload image of the client',
            'client_image.*.mimetypes' => 'Please upload correct file',
            'client_image.*.max' => 'Please upload file within 6MB'
        ])->validate();


     if ($request->hasFile('client_image')) {
            $file = $request->file('client_image'); 
            $fileName1 = time().'_'.$file->getClientOriginalName(); 
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/client/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName1);
            //original destination path
            $destinationPath = public_path().'/upload/client/original/';
            $file->move($destinationPath,$fileName1);
           }

      $client = new Client();
      $client->name = $request->client_name;
      $client->image = $fileName1;
      $client->status = '1';

      if ($client->save()) {
        $request->session()->flash("submit-status", 'Data added successfully.');
        return redirect('/admin/client');
   }     

  }

  public function edit(Request $request, $id){

     $client_details = Client::where('id',$id)->get()->toArray(); 
     //echo '<pre>';print_r($client_details);die();   
     return view('admin.client.edit')->with('client_details',$client_details[0]);  	
    }
   
  public function edit_client(Request $request, $id){

  	$client_details = Client::where('id',$id)->get()->toArray(); 
    
    Validator::make($request->all(),[
            'client_name' => 'required',
            'client_image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ],[
            'client_name.required' => 'Please enter the name of the client',
            'client_image.*.mimetypes' => 'Please upload correct file',
            'client_image.*.max' => 'Please upload file within 6MB'
        ])->validate();


    if ($request->hasFile('client_image')) {
            $file = $request->file('client_image'); 
            $fileName1 = time().'_'.$file->getClientOriginalName(); 
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/client/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName1);
            //original destination path
            $destinationPath = public_path().'/upload/client/original/';
            $file->move($destinationPath,$fileName1);
           }

     else{
     	$fileName1 = $client_details[0]['image'];
     }  

     $client = Client::find($id);
     $client->name = $request->client_name;
     $client->image = $fileName1;    
  	
  	if ($client->save()) {
        $request->session()->flash("submit-status", 'Data updated successfully.');
        return redirect('/admin/client');
   }   
  } 

   public function delete(Request $request, $id){
    $client = Client::find($id);
    $client->status = '2';

    if ($client->save()) {
        $request->session()->flash("submit-status", 'Data deleted successfully.');
        return redirect('/admin/client');
   } 
  
   } 

   public function view_event(Request $request, $id){
    $event_details = Event::where('status','1')->where('client_id',$id)->get()->toArray(); 
    return view('admin.event.listing')->with('event_details',$event_details)->with('client_id',$id);  
   }

   public function add_event(Request $request, $id){
    return view('admin.event.add')->with('client_id',$id);  
   }

   public function event_submit(Request $request){

    Validator::make($request->all(),[
            'event_name' => 'required',
            'event_description' => 'required',
            // 'event_image' => 'required',
            'event_image.*' => 'mimes:jpeg,png,jpg|max:6144'
        ],[
            'event_name.required' => 'Please enter the name of the event',
            'event_description.required' => 'Please enter description of the event',
            // 'event_image.required' => 'Please upload images of the event',
            'event_image.*.mimes' => 'Please upload correct file',
            'event_image.*.max' => 'Please upload file within 6MB'    
        ])->validate();

     
   
    $img_arr = array(); 

    if ($request->hasFile('event_image')) {
        foreach ($request->file('event_image') as $file) {
          $imgName = time().'_'.$file->getClientOriginalName();
        //original destination path
        $destinationPath = public_path().'/upload/event/image';
        $file->move($destinationPath, $imgName);
        $img_arr[] = array(
          'img' => $imgName
          );
        }
    } 
 
    $event_add = new Event();
    
    $client_id = $request->clientId;
    $video_arr = $request->event_video;

    $event_add->client_id = $client_id;
    $event_add->name = $request->event_name;
    $event_add->description = $request->event_description;
    
    if ($event_add->save()) {    
        $event_id = $event_add->id;

     if(!empty($video_arr['0'])){
        foreach ($video_arr as $video_key => $video_val) {
          $pivot_add = new EventPivot();
          $pivot_add->client_id = $request->clientId;
          $pivot_add->event_id =  $event_id;
          $pivot_add->type = 2;
          $pivot_add->content = $video_val;     
          $pivot_add->save();     
        }  
     }
      
      if(count($img_arr) !='0'){
        foreach ($img_arr as $img_key => $img) {
          $pivot_add = new EventPivot();
          $pivot_add->client_id = $request->clientId;
          $pivot_add->event_id =  $event_id;
          $pivot_add->content = $img_arr[$img_key]['img'];
          $pivot_add->type = 1;    
          $pivot_add->save();        
          }
        }   
      }

        if ($event_add->save()) {
        $request->session()->flash("submit-status", 'Data Added successfully.');
        return redirect('/admin/client/event/'.$client_id); 
       }
   }

   public function edit_event(Request $request, $id){
    $event_details = Event::where('status','1')->where('id',$id)->get()->toArray();
    $content_details = EventPivot::where('status','1')->where('event_id',$id)->orderby('id','desc')->get()->toArray();
    return view('admin.event.edit')->with('event_details',$event_details[0])->with('content_details',$content_details);
   }

   public function update_event(Request $request, $id){
   
    $event_details = Event::where('status','1')->where('id',$id)->get()->toArray();
    $client_id = $event_details[0]['client_id'];

    Validator::make($request->all(),[
            'event_name' => 'required',
            'event_description' => 'required',
            // 'event_image' => 'required',
            'event_image.*' => 'mimes:jpeg,png,jpg|max:6144'
        ],[
            'event_name.required' => 'Please enter the name of the event',
            'event_description.required' => 'Please enter description of the event',
            // 'event_image.required' => 'Please upload images of the event',
            'event_image.*.mimes' => 'Please upload correct file',
            'event_image.*.max' => 'Please upload file within 6MB'    
        ])->validate();


    $img_arr = array(); 

    if ($request->hasFile('event_image')) {
        foreach ($request->file('event_image') as $file) {
          $imgName = time().'_'.$file->getClientOriginalName();
        //original destination path
        $destinationPath = public_path().'/upload/event/image';
        $file->move($destinationPath, $imgName);
        $img_arr[] = array(
          'img' => $imgName
          );
        }
    } 

    $event_edit = Event::find($id);
    $video_arr = $request->event_video;
    $event_edit->name = $request->event_name;
    $event_edit->description = $request->event_description;
    
    if ($event_edit->save()) {    

     if(!empty($video_arr['0'])){
        foreach ($video_arr as $video_key => $video_val) {
          $pivot_add = new EventPivot();
          $pivot_add->client_id = $client_id;
          $pivot_add->event_id =  $id;
          $pivot_add->type = 2;
          $pivot_add->content = $video_val;     
          $pivot_add->save();     
        }  
     }
      
      if(count($img_arr) !='0'){
        foreach ($img_arr as $img_key => $img) {
          $pivot_add = new EventPivot();
          $pivot_add->client_id =$client_id;
          $pivot_add->event_id =  $id;
          $pivot_add->content = $img_arr[$img_key]['img'];
          $pivot_add->type = 1;    
          $pivot_add->save();     
              
           }
        }   
      }

      if ($event_edit->save()) {
        $request->session()->flash("submit-status", 'Data updted successfully.');
        return redirect('/admin/client/event/'.$client_id); 
       }

   }

   public function delete_event(Request $request, $id){

    $event_details = Event::where('id',$id)->get()->toArray();
    $client_id = $event_details[0]['client_id'];
    
    $event = Event::find($id);
    $event->status = 2;

    $event_pivot = EventPivot::where("event_id",$id)->update(['status' => 2]);

    if ($event->save()) {
        $request->session()->flash("submit-status", 'Data deleted successfully.');
        return redirect('/admin/client/event/'.$client_id);
     } 
   }

   public function delete_content(Request $request, $id){

    $event_details = EventPivot::where('id',$id)->get()->toArray();
    $client_id = $event_details[0]['client_id'];
    
    $event_pivot = EventPivot::where("id",$id)->update(['status' => 2]);

    if ($event_pivot) {
        $request->session()->flash("submit-status", 'Data deleted successfully.');
        return redirect('/admin/client/event/'.$client_id);
     } 
   }
}
