<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator;
use \App\HomeDetail;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $all_details = HomeDetail::all()->toArray();

        if (empty($all_details)) {
            return view('admin.cms.home')->with('home');
        } 
        else {
            //echo '<pre>';print_r($all_details);die();
            return view('admin.cms.home')->with('home', $all_details[0]);
        }

    }

    public function save_home(Request $request)
    {
        $home_data = HomeDetail::all()->toArray();

        //echo '<pre>';print_r( $home_data);die();

        if (empty($home_data)) {
            Validator::make($request->all(), [
                'box_one_title' => 'required',
                'box_one_desc' => 'required',
                'box_one_icon' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'box_two_title' => 'required',
                'box_two_desc' => 'required',
                'box_two_icon' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'middle_section_title' => 'required',
                'box_three_title' => 'required',
                'box_three_desc' => 'required',
                'box_three_icon' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'video_title' => 'required',
                'video_text' => 'required',
                'video_link' => 'required',
                'middle_section_image' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'middle_section_content' => 'required',
                'company_desc' => 'required',
                'company_image' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144'
            ], [
                'box_one_title.required' => 'Please enter title for box one',
                'box_one_desc.required' => 'Please give description for box one',
                'box_one_icon.required' => 'Please upload box one icon',
                'box_one_icon.*.mimetypes' => 'Please upload correct file',
                'box_one_icon.*.max' => 'Please upload file within 6MB', 
                'box_two_title.required' => 'Please enter title for box two',
                'box_two_desc.required' => 'Please give description for box two',
                'box_two_icon.required' => 'Please upload box two icon',
                'box_two_icon.*.mimetypes' => 'Please upload correct file',
                'box_two_icon.*.max' => 'Please upload file within 6MB', 
                'middle_section_title.required' => 'Please enter title for middle section',
                'box_three_title.required' => 'Please enter title for box three',
                'box_three_desc.required' => 'Please give description for box three',
                'box_three_icon.required' => 'Please upload box three icon',
                'box_three_icon.*.mimetypes' => 'Please upload correct file',
                'box_three_icon.*.max' => 'Please upload file within 6MB', 
                'video_title.required' => 'Please enter title for video',
                'video_text.required' => 'Please enter text for video',
                'video_link.required' => 'Please enter link for video',
                'middle_section_image.required' => 'Please upload image for middle section',
                'middle_section_image.*.mimetypes' => 'Please upload correct file',
                'middle_section_image.*.max' => 'Please upload file within 6MB', 
                'middle_section_content.required' => 'Please give description for middle section',
                'company_desc.required' => 'Please give description for company',
                'company_image.required' => 'Please upload image for company',
                'company_image.*.mimetypes' => 'Please upload correct file',
                'company_image.*.max' => 'Please upload file within 6MB'

            ])->validate();

            if ($request->hasFile('box_one_icon')) {
                $file = $request->file('box_one_icon');
                $fileName1 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName1);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName1);
            }

            if ($request->hasFile('box_two_icon')) {
                $file = $request->file('box_two_icon');
                $fileName2 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName2);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName2);
            }

            if ($request->hasFile('box_three_icon')) {
                $file = $request->file('box_three_icon');
                $fileName3 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName3);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName3);
            }

            if ($request->hasFile('middle_section_image')) {
                $file = $request->file('middle_section_image');
                $fileName4 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(555, 390, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName4);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName4);
            }

            if ($request->hasFile('company_image')) {
                $file = $request->file('company_image');
                $fileName5 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(458, 639, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName5);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName5);
            }

            $home_details = new HomeDetail();
            $home_details->box_one_title = $request->box_one_title;
            $home_details->box_one_desc = $request->box_one_desc;
            $home_details->box_one_icon = $fileName1;
            $home_details->box_two_title = $request->box_two_title;
            $home_details->box_two_desc = $request->box_two_desc;
            $home_details->box_two_icon = $fileName2;
            $home_details->middle_section_title = $request->middle_section_title;
            $home_details->box_three_title = $request->box_three_title;
            $home_details->box_three_desc = $request->box_three_desc;
            $home_details->box_three_icon = $fileName3;
            $home_details->video_title = $request->video_title;
            $home_details->video_text = $request->video_text;
            $home_details->video_link = $request->video_link;
            $home_details->middle_section_image = $fileName4;
            $home_details->middle_section_content = $request->middle_section_content;
            $home_details->company_desc = $request->company_desc;
            $home_details->company_image = $fileName5;

            if ($home_details->save()) {
                $request->session()->flash("submit-status", 'Data added successfully.');
                return redirect('/admin/cms/home');
            }

        } else {

            Validator::make($request->all(), [
                'box_one_title' => 'required',
                'box_one_desc' => 'required',
                'box_two_title' => 'required',
                'box_two_desc' => 'required',
                'middle_section_title' => 'required',
                'box_three_title' => 'required',
                'box_three_desc' => 'required',
                'video_title' => 'required',
                'video_text' => 'required',
                'video_link' => 'required',
                'middle_section_content' => 'required',
                'company_desc' => 'required',
                'box_one_icon' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'box_two_icon' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'box_three_icon' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'middle_section_image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144',
                'company_image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'

            ], [
                'box_one_title.required' => 'Please enter title for box one',
                'box_one_desc.required' => 'Please give description for box one',
                'box_two_title.required' => 'Please enter title for box two',
                'box_two_desc.required' => 'Please give description for box two',
                'middle_section_title.required' => 'Please enter title for middle section',
                'box_three_title.required' => 'Please enter title for box three',
                'box_three_desc.required' => 'Please give description for box three',
                'video_title.required' => 'Please enter title for video',
                'video_text.required' => 'Please enter text for video',
                'video_link.required' => 'Please enter link for video',
                'middle_section_content.required' => 'Please give description for middle section',
                'company_desc.required' => 'Please give description for company',
                'box_one_icon.*.mimetypes' => 'Please upload correct file',
                'box_one_icon.*.max' => 'Please upload file within 6MB',
                'box_two_icon.*.mimetypes' => 'Please upload correct file',
                'box_two_icon.*.max' => 'Please upload file within 6MB', 
                'box_three_icon.*.mimetypes' => 'Please upload correct file',
                'box_three_icon.*.max' => 'Please upload file within 6MB', 
                'middle_section_image.*.mimetypes' => 'Please upload correct file',
                'middle_section_image.*.max' => 'Please upload file within 6MB', 
                'company_image.*.mimetypes' => 'Please upload correct file',
                'company_image.*.max' => 'Please upload file within 6MB'


            ])->validate();

            if ($request->hasFile('box_one_icon')) {
                $file = $request->file('box_one_icon');
                $fileName1 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName1);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName1);
            } else {
                $fileName1 = $home_data[0]['box_one_icon'];
            }

            if ($request->hasFile('box_two_icon')) {
                $file = $request->file('box_two_icon');
                $fileName2 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName2);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName2);
            } else {
                $fileName2 = $home_data[0]['box_two_icon'];
            }

            if ($request->hasFile('box_three_icon')) {
                $file = $request->file('box_three_icon');
                $fileName3 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName3);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName3);
            } else {
                $fileName3 = $home_data[0]['box_three_icon'];
            }

            if ($request->hasFile('middle_section_image')) {
                $file = $request->file('middle_section_image');
                $fileName4 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName4);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName4);
            } else {
                $fileName4 = $home_data[0]['middle_section_image'];
            }

            if ($request->hasFile('company_image')) {
                $file = $request->file('company_image');
                $fileName5 = time() . '_' . $file->getClientOriginalName();

                //thumb destination path
                $destinationPath_2 = public_path() . '/upload/cms/home/resize';
                $img = Image::make($file->getRealPath());
                $img->resize(360, 640, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath_2 . '/' . $fileName5);
                //original destination path
                $destinationPath = public_path() . '/upload/cms/home/original/';
                $file->move($destinationPath, $fileName5);
            } else {
                $fileName5 = $home_data[0]['company_image'];
            }

            $id = $home_data[0]['id'];
            $home_details = HomeDetail::find($id);

            $home_details->box_one_title = $request->box_one_title;
            $home_details->box_one_desc = $request->box_one_desc;
            $home_details->box_one_icon = $fileName1;
            $home_details->box_two_title = $request->box_two_title;
            $home_details->box_two_desc = $request->box_two_desc;
            $home_details->box_two_icon = $fileName2;
            $home_details->middle_section_title = $request->middle_section_title;
            $home_details->box_three_title = $request->box_three_title;
            $home_details->box_three_desc = $request->box_three_desc;
            $home_details->box_three_icon = $fileName3;
            $home_details->video_title = $request->video_title;
            $home_details->video_text = $request->video_text;
            $home_details->video_link = $request->video_link;
            $home_details->middle_section_image = $fileName4;
            $home_details->middle_section_content = $request->middle_section_content;
            $home_details->company_desc = $request->company_desc;
            $home_details->company_image = $fileName5;

            if ($home_details->save()) {
                $request->session()->flash("submit-status", 'Data updated successfully.');
                return redirect('/admin/cms/home');
            }
        }
    }
}
