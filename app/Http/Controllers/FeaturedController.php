<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use \App\Featured;

class FeaturedController extends Controller
{
    public function index() {
        $fetch_all = Featured::where('status',1)->orderBy('id','desc')->get()->toArray();
        return view('admin.featured.listings')->with('fetch_all',$fetch_all);
    }

    public function add (Request $request) {
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName1 = time().'_'.$file->getClientOriginalName();
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/featured_image/resize/';
            $img = Image::make($file->getRealPath());
            $img->resize(320, 320, function ($constraint) {
				$constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName1);
            //original destination path
            $destinationPath = public_path().'/upload/featured_image/original/';
            $file->move($destinationPath, $fileName1);
        }

        $add = new Featured();
        $add->title = $request->featured_title;
        $add->img = $fileName1;
        $add->status = 1;

        if($add->save()){
            echo 1;
            exit;
        }
    }

    public function delete (Request $request, $id) {
        $delete = Featured::find($id);
        $delete->status = 2;

        if($delete->save()){
            $request->session()->flash("submit-status", "Deleted successfully.");
            return redirect('/admin/features');
        }
    }

    public function fetch_individuals (Request $request) {
        $fetch_details = Featured::find($request->row_id)->toArray();
        return $fetch_details;
    }

    public function edit (Request $request, $id) {
        if ($request->hasFile('featured_image_id')) {
            $file = $request->file('featured_image_id');
            $fileName1 = time().'_'.$file->getClientOriginalName();
        
            //thumb destination path
            $destinationPath_2 = public_path().'/upload/featured_image/resize/';
            $img = Image::make($file->getRealPath());
            $img->resize(320, 320, function ($constraint) {
				$constraint->aspectRatio();
            })->save($destinationPath_2.'/'.$fileName1);
            //original destination path
            $destinationPath = public_path().'/upload/featured_image/original/';
            $file->move($destinationPath, $fileName1);
        }else{
            $fileName1 = $request->exist_featured_image;
        }

        $add = Featured::find($id);
        $add->title = $request->featured_title_edit;
        $add->img = $fileName1;

        if($add->save()){
            echo 1;
            exit;
        }
    }
}
