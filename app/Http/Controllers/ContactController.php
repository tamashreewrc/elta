<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Contact;
use Validator;

class ContactController extends Controller
{
    public function index(Request $request){

     $contact_details = Contact::all()->toArray();

     if(empty($contact_details)){
      return view('admin.cms.contact_us')->with('contact');
  	}

  	else{
      return view('admin.cms.contact_us')->with('contact',$contact_details[0]);
  	}	

   }

   public function save_contact(Request $request){

   	Validator::make($request->all(),[
            'contact_title' => 'required',
            'contact_content' => 'required'

        ],[
            'contact_title.required' => 'Please enter title',
            'contact_content.required' => 'Please enter your content'

        ])->validate();	
    

    $contact_data = Contact::all()->toArray();

    if(empty($contact_data)){

     $contact_details = new Contact();
     $contact_details->title = $request->contact_title;
     $contact_details->description = $request->contact_content;

      if ($contact_details->save()) {
        $request->session()->flash("submit-status", 'Data added successfully.');
        return redirect('/admin/cms/contact_us');
       }	

    }
    else{

      $id = $contact_data[0]['id'];
      $contact_details = Contact::find($id);

      $contact_details->title = $request->contact_title;
      $contact_details->description = $request->contact_content;

      if ($contact_details->save()) {
        $request->session()->flash("submit-status", 'Data updated successfully.');
        return redirect('/admin/cms/contact_us');
       }	

    }

  }
}
