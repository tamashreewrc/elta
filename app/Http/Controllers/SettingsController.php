<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Setting;
use Validator;
use Auth;
use Image;
use DB;

class SettingsController extends Controller
{ 
    public function index(Request $request){   
     $all_settings = Setting::all()->toArray();  
     //echo '<pre>';print_r($all_settings);die();
     //echo $all_settings[0]['header_logo'];die();
   
     if (empty($all_settings)){   
        return view('admin.settings')->with('settings'); 
     }

     else{
       return view('admin.settings')->with('settings',$all_settings[0]);   
     }  
   }

    public function save_settings(Request $request){
    	         
         $settings_data = Setting::all()->toArray();   

         if(empty($settings_data)){

             Validator::make($request->all(),[
            'header_content' => 'required',
            'admin_email' => 'required|email',
            'admin_contact_1' => 'required',
            'admin_contact_2' => 'required',
            'company_loaction' => 'required',
            'website_email' => 'required|email',
            'company_address' => 'required',
            'footer_content' => 'required',
            'facebook_link' => 'required',
            'youtube_link' => 'required',
            'instagram_link' => 'required',
            'header_logo' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144',
            'footer_logo' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144',
            'skype_link' => 'required'
        ],[
            'header_content.required' => 'Please enter header content',
            'admin_email.required' => 'Please enter your email',
            'admin_email.email' => 'Please enter a valid email address',
            'admin_contact_1.required' => 'Please enter primary contact',
            'admin_contact_2.required' => 'Please enter secondary contact',
            'company_loaction.required' => 'Please enter company loaction',
            'website_email.required' => 'Please enter email for website',
            'website_email.email' => 'Please enter a valid email address',
            'company_address.required' => 'Please enter company address',
            'footer_content.required' => 'Please enter footer content',
            'facebook_link.required' => 'Please enter facebook link',
            'youtube_link.required' => 'Please enter youtube link',
            'instagram_link.required' => 'Please enter instagram link',
            'header_logo.required' => 'Please enter header logo',
            'header_logo.*.mimetypes' => 'Please upload correct file',
            'header_logo.*.max' => 'Please upload file within 6MB',
            'footer_logo.required' => 'Please enter footer logo',
            'footer_logo.*.mimetypes' => 'Please upload correct file',
            'footer_logo.*.max' => 'Please upload file within 6MB',
            'skype_link.required' => 'Please enter skype link'
        ])->validate();
             
            if ($request->hasFile('header_logo')) {
            $file = $request->file('header_logo');
            $fileName1 = time().'_'.$file->getClientOriginalName();
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/header_logo/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName1);
            //original destination path
            $destinationPath = public_path().'/upload/header_logo/original/';
            $file->move($destinationPath,$fileName1);
           }

            if ($request->hasFile('footer_logo')) {
            $file = $request->file('footer_logo');
            $fileName2 = time().'_'.$file->getClientOriginalName();
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/footer_logo/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName2);
            //original destination path
            $destinationPath = public_path().'/upload/footer_logo/original/';
            $file->move($destinationPath,$fileName2);
           }

            $setting = new Setting();
            $setting->header_content = $request->header_content;
            $setting->admin_email = $request->admin_email;
            $setting->primary_contact = $request->admin_contact_1;
            $setting->secondary_contact = $request->admin_contact_2;
            $setting->company_loaction = $request->company_loaction;
            $setting->website_email = $request->website_email;
            $setting->company_address = $request->company_address;
            $setting->footer_content = $request->footer_content;
            $setting->facebook_link = $request->facebook_link;
            $setting->youtube_link = $request->youtube_link;
            $setting->instagram_link = $request->instagram_link;
            $setting->header_logo = $fileName1;
            $setting->footer_logo = $fileName2;
            $setting->skype_id = $request->skype_link;

            if ($setting->save()) {
              $request->session()->flash("submit-status", 'Data added successfully.');
              return redirect('/admin/settings');
           } 
         } 

            else{
                  Validator::make($request->all(),[
                  'header_content' => 'required',
                  'admin_email' => 'required|email',
                  'admin_contact_1' => 'required',
                  'admin_contact_2' => 'required',
                  'company_loaction' => 'required',
                  'website_email' => 'required|email',
                  'company_address' => 'required',
                  'footer_content' => 'required',
                  'facebook_link' => 'required',
                  'youtube_link' => 'required',
                  'instagram_link' => 'required',
                  'skype_link' => 'required',
                  'header_logo' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                  'footer_logo' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'          
               ],[
                  'header_content.required' => 'Please enter header content',
                  'admin_email.required' => 'Please enter your email',
                  'admin_email.email' => 'Please enter a valid email address',
                  'admin_contact_1.required' => 'Please enter primary contact',
                  'admin_contact_2.required' => 'Please enter secondary contact',
                  'company_loaction.required' => 'Please enter company loaction',
                  'website_email.required' => 'Please enter email for website',
                  'website_email.email' => 'Please enter a valid email address',
                  'company_address.required' => 'Please enter company address',
                  'footer_content.required' => 'Please enter footer content',
                  'facebook_link.required' => 'Please enter facebook link',
                  'youtube_link.required' => 'Please enter youtube link',
                  'instagram_link.required' => 'Please enter instagram link',
                  'skype_link.required' => 'Please enter skype link',
                  'header_logo.*.mimetypes' => 'Please upload correct file',
                  'header_logo.*.max' => 'Please upload file within 6MB',
                  'footer_logo.*.mimetypes' => 'Please upload correct file',
                  'footer_logo.*.max' => 'Please upload file within 6MB'
      
        ])->validate();

                  if ($request->hasFile('header_logo')) { 
                  $file = $request->file('header_logo');
                  $fileName1 = time().'_'.$file->getClientOriginalName();
        
                  //thumb destination path
                  $destinationPath_2 = public_path().'/upload/header_logo/resize';
                  $img = Image::make($file->getRealPath());
                  $img->resize(360, 640, function ($constraint) {
                  $constraint->aspectRatio();
                 })->save($destinationPath_2.'/'.$fileName1);
                 //original destination path
                 $destinationPath = public_path().'/upload/header_logo/original/';
                 $file->move($destinationPath,$fileName1);
                }

                else{
                    $fileName1 = $settings_data[0]['header_logo'];
                }

                if ($request->hasFile('footer_logo')) {
                $file = $request->file('footer_logo');
                $fileName2 = time().'_'.$file->getClientOriginalName();
        
                //thumb destination path
                $destinationPath_2 = public_path().'/upload/footer_logo/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
                })->save($destinationPath_2.'/'.$fileName2);
                //original destination path
                $destinationPath = public_path().'/upload/footer_logo/original/';
                $file->move($destinationPath,$fileName2);
               }

               else{
                    $fileName2 = $settings_data[0]['footer_logo'];
                }

                 $id = $settings_data[0]['id'];
                 $setting = Setting::find($id);
                 $setting->header_content = $request->header_content;
                 $setting->admin_email = $request->admin_email;
                 $setting->primary_contact = $request->admin_contact_1;
                 $setting->secondary_contact = $request->admin_contact_2;
                 $setting->company_loaction = $request->company_loaction;
                 $setting->website_email = $request->website_email;
                 $setting->company_address = $request->company_address;
                 $setting->footer_content = $request->footer_content;
                 $setting->facebook_link = $request->facebook_link;
                 $setting->youtube_link = $request->youtube_link;
                 $setting->instagram_link = $request->instagram_link;
                 $setting->header_logo = $fileName1;
                 $setting->footer_logo = $fileName2;
                 $setting->skype_id = $request->skype_link;

                 if ($setting->save()) {
                 $request->session()->flash("submit-status", 'Data updated successfully.');
                 return redirect('/admin/settings');
                } 

        }
    }
}
