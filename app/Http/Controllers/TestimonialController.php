<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator;
use \App\Testimonial;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $all_testimonials = Testimonial::where('status', '1')->orderby('id', 'desc')->get()->toArray();
        //echo '<pre>';print_r($all_testimonials);die();
        return view('admin.testimonial.listings')->with('all_testimonials', $all_testimonials);
    }

    public function add(Request $request)
    {
        return view('admin.testimonial.add');
    }

    public function save_testimonial(Request $request)
    {

        Validator::make($request->all(), [
            'testimonial_description' => 'required',
            'author' => 'required',
            'designation' => 'required',
            'company' => 'required',
            'author_image' => 'required',
        ], [
            'testimonial_description.required' => 'Please enter the description',
            'author.required' => 'Please enter name of the author',
            'designation.required' => 'Please enter the designation',
            'company.required' => 'Please enter name of the company',
            'author_image.required' => 'Please upload image of the author',
        ])->validate();

        if ($request->hasFile('author_image')) {
            $file = $request->file('author_image');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/testimonial/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/testimonial/original/';
            $file->move($destinationPath, $fileName1);
        }

        $testimonial = new Testimonial();
        $testimonial->description = $request->testimonial_description;
        $testimonial->author_name = $request->author;
        $testimonial->designation = $request->designation;
        $testimonial->company_name = $request->company;
        $testimonial->author_image = $fileName1;
        $testimonial->status = '1';

        if ($testimonial->save()) {
            $request->session()->flash("submit-status", 'Data added successfully.');
            return redirect('/admin/testimonial');
        }
    }

    public function edit(Request $request, $id)
    {

        $testimonial_details = Testimonial::where('id', $id)->get()->toArray();

        //echo '<pre>';print_r($testimonial_details);die();
        return view('admin.testimonial.edit')->with('testimonial_details', $testimonial_details[0]);
    }

    public function edit_submit(Request $request, $id)
    {

        $testimonial_details = Testimonial::where('id', $id)->get()->toArray();

        //echo '<pre>';print_r($testimonial_details);die();

        Validator::make($request->all(), [
            'testimonial_description' => 'required',
            'author' => 'required',
            'designation' => 'required',
            'company' => 'required',
        ], [
            'testimonial_description.required' => 'Please enter the description',
            'author.required' => 'Please enter name of the author',
            'designation.required' => 'Please enter the designation',
            'company.required' => 'Please enter name of the company',
        ])->validate();

        if ($request->hasFile('author_image')) {
            $file = $request->file('author_image');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/testimonial/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/testimonial/original/';
            $file->move($destinationPath, $fileName1);
        } else {
            $fileName1 = $testimonial_details[0]['author_image'];
        }

        $testimonial = Testimonial::find($id);
        $testimonial->description = $request->testimonial_description;
        $testimonial->author_name = $request->author;
        $testimonial->designation = $request->designation;
        $testimonial->company_name = $request->company;
        $testimonial->author_image = $fileName1;

        if ($testimonial->save()) {
            $request->session()->flash("submit-status", 'Data updated successfully.');
            return redirect('/admin/testimonial');
        }

    }

    public function delete(Request $request, $id)
    {

        $testimonial = Testimonial::find($id);
        $testimonial->status = '2';

        if ($testimonial->save()) {
            $request->session()->flash("submit-status", 'Data deleted successfully.');
            return redirect('/admin/testimonial');
        }

    }

}
