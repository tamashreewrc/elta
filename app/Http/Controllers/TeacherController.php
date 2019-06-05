<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use \App\Teacher;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $fetch_all_teacher = Teacher::orderBy('id', 'desc')->get()->toArray();
        return view('admin.teachers.listings')->with('fetch_all_teacher', $fetch_all_teacher);
    }

    public function add_teacher(Request $request)
    {
        if ($request->hasFile('teachers_image')) {
            $file = $request->file('teachers_image');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/teachers_image/resize/';
            $img = Image::make($file->getRealPath());
            $img->resize(320, 320, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/teachers_image/original/';
            $file->move($destinationPath, $fileName1);
        }

        $add = new Teacher();
        $add->name = $request->teachers_name;
        $add->designation = $request->teachers_designation;
        $add->image = $fileName1;

        if ($add->save()) {
            echo 1;
            exit;
        }
    }

    public function fetch_details(Request $request)
    {
        $id = $request->row_id;
        $fetch_details = Teacher::find($id)->toArray();

        return $fetch_details;
    }

    public function delete_teacher(Request $request, $id)
    {
        $delete = Teacher::where('id', $id)->delete();

        if ($delete) {
            $request->session()->flash("submit-status", "Teacher deleted successfully.");
            return redirect('/admin/teachers');
        }
    }

    public function edit_teacher(Request $request, $id)
    {
        if ($request->hasFile('teachers_image_id')) {
            $file = $request->file('teachers_image_id');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/teachers_image/resize/';
            $img = Image::make($file->getRealPath());
            $img->resize(320, 320, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/teachers_image/original/';
            $file->move($destinationPath, $fileName1);
        } else {
            $fileName1 = $request->exist_teacher_image;
        }

        $add = Teacher::find($id);
        $add->name = $request->teachers_name_edit;
        $add->designation = $request->teachers_designation_edit;
        $add->image = $fileName1;

        if ($add->save()) {
            echo 1;
            exit;
        }
    }
}
