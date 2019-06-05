<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\ResourceDownload;
use Validator;
use Auth;
use DB;

class ResourceDownloadController extends Controller
{
     public function index(Request $request){
     	$all_downloads = ResourceDownload::where('status','1')->orderby('id','desc')->get()->toArray();  
     	return view('admin.resource_download.listing')->with('all_downloads',$all_downloads);
     }

     public function add(Request $request){  
       return view('admin.resource_download.add');  
     }

     public function save_download(Request $request){

     	Validator::make($request->all(),[
            'title' => 'required',
            'subtitle' => 'required',
            'author' => 'required',
            'book' => 'required|mimes:pdf|max:61440',
            'note' => 'required|mimes:pdf|max:61440'
        ],[
            'title.required' => 'Please enter the title',
            'subtitle.required' => 'Please enter the subtitle',
            'author.required' => 'Please enter the name of author',
            'book.required' => 'Please upload the book file',
            'note.required' => 'Please upload the note file',
            'book.*.mimes' => 'Please upload correct file',
            'book.*.max' => 'Please upload file within 60 MB',
            'note.*.mimes' => 'Please upload correct file',
            'note.*.max' => 'Please upload file within 60 MB'    

        ])->validate();

        if ($request->hasFile('book')) {
            $file = $request->file('book');
            $fileName1 = time() . '_' . $file->getClientOriginalName();
            //original destination path
            $destinationPath = public_path() . '/upload/resource_download/books';
            $file->move($destinationPath, $fileName1);
        }

        if ($request->hasFile('note')) {
            $file = $request->file('note');
            $fileName2 = time() . '_' . $file->getClientOriginalName();
            //original destination path
            $destinationPath = public_path() . '/upload/resource_download/notes';
            $file->move($destinationPath, $fileName2);
        }

        $download = new ResourceDownload();
        $download->title = $request->title;
        $download->subtitle = $request->subtitle;
        $download->author = $request->author;
        $download->status = '1';
        $download->book = $fileName1;
        $download->note = $fileName2;


        if ($download->save()) {
        $request->session()->flash("submit-status", 'Data added successfully.');
        return redirect('/admin/download');
       }    

     }

     public function edit(Request $request, $id){

     	$download_details = ResourceDownload::where('id',$id)->get()->toArray();
        //echo '<pre>';print_r($download_details);die();  
        return view('admin.resource_download.edit')->with('download_details',$download_details[0]);  
     }

     public function edit_download(Request $request, $id){

     	$download_details = ResourceDownload::where('id',$id)->get()->toArray();
        //echo '<pre>';print_r($download_details);die();  


        Validator::make($request->all(),[
            'title' => 'required',
            'subtitle' => 'required',
            'author' => 'required',
            'book' => 'mimes:pdf|max:61440',
            'note' => 'mimes:pdf|max:61440'
        ],[
            'title.required' => 'Please enter the title',
            'subtitle.required' => 'Please enter the subtitle',
            'author.required' => 'Please enter the name of author',
            'book.*.mimes' => 'Please upload correct file',
            'book.*.max' => 'Please upload file within 60 MB',
            'note.*.mimes' => 'Please upload correct file',
            'note.*.max' => 'Please upload file within 60 MB'    

        ])->validate();

        if ($request->hasFile('book')) {
            $file = $request->file('book');
            $fileName1 = time() . '_' . $file->getClientOriginalName();
            //original destination path
            $destinationPath = public_path() . '/upload/resource_download/books';
            $file->move($destinationPath, $fileName1);
        }

        else{
     	$fileName1 = $download_details[0]['book'];
        } 

        if ($request->hasFile('note')) {
            $file = $request->file('note');
            $fileName2 = time() . '_' . $file->getClientOriginalName();
            //original destination path
            $destinationPath = public_path() . '/upload/resource_download/notes';
            $file->move($destinationPath, $fileName2);
        }

        else{
     	$fileName2 = $download_details[0]['note'];
        } 

        $download = ResourceDownload::find($id);
        $download->title = $request->title;
        $download->subtitle = $request->subtitle;
        $download->author = $request->author;
        $download->book = $fileName1;
        $download->note = $fileName2;

        if ($download->save()) {
        $request->session()->flash("submit-status", 'Data updated successfully.');
        return redirect('/admin/download');
       }  

     }

     public function delete(Request $request, $id){
     	 $download = ResourceDownload::find($id);
     	 $download->status = '2';

     	if ($download->save()) {
        $request->session()->flash("submit-status", 'Data deleted successfully.');
        return redirect('/admin/download');
       } 

     }

  }
