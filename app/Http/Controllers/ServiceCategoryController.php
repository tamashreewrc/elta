<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator;
use \App\ServiceCategory;

class ServiceCategoryController extends Controller
{
    public function index(Request $request)
    {
        $service_categories = ServiceCategory::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('admin.service_category.listings')->with('service_categories', $service_categories);
    }

    public function add(Request $request)
    {
        $parent_categories = ServiceCategory::where('parent_category_id', '0')->where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('admin.service_category.add')->with('parent_categories', $parent_categories);
    }

    public function add_submit(Request $request)
    {
        Validator::make($request->all(), [
            'service_category_name' => 'required|unique:service_categories,service_category_name',
            'service_category_description' => 'required',
            'parent_category_id' => 'required',
            'service_category_icon' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ], [
            'service_category_name.required' => 'Please enter service category name',
            'service_category_name.unique' => 'Service category name already exists',
            'service_category_description.required' => 'Please enter service category description',
            'parent_category_id.required' => 'Please select a parent category',
            'service_category_icon.required' => 'Please upload service category icon',
            'service_category_icon.*.mimetypes' => 'Please upload correct file',
            'service_category_icon.*.max' => 'Please upload file within 6MB'
        ])->validate();

        if ($request->hasFile('service_category_icon')) {
            $file = $request->file('service_category_icon');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/service_category_icon/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/service_category_icon/original/';
            $file->move($destinationPath, $fileName1);
        }

        $add = new ServiceCategory();
        $add->service_category_name = $request->service_category_name;
        $add->service_category_description = $request->service_category_description;
        $add->parent_category_id = $request->parent_category_id;
        $add->featured_service_category = ($request->featured_service_category) ? 1 : 0;
        $add->service_category_icon = $fileName1;

        if ($add->save()) {
            $request->session()->flash("submit-status", "Service Category has been added successfully");
            return redirect('/admin/service_categories');
        }
    }

    public function edit_view(Request $request, $service_category_id)
    {
        $service_category_details = ServiceCategory::find($request->service_category_id)->toArray();
        $parent_categories = ServiceCategory::where('parent_category_id', '0')->where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('admin.service_category.edit')->with('service_category_details', $service_category_details)->with('parent_categories', $parent_categories);
    }

    public function edit_submit(Request $request, $service_category_id)
    {
        Validator::make($request->all(), [
            'service_category_name' => 'required',
            'service_category_description' => 'required',
            'parent_category_id' => 'required',
            'service_category_icon' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ], [
            'service_category_name.required' => 'Please enter service category name',
            'service_category_name.unique' => 'Service category name already exists',
            'service_category_description.required' => 'Please enter service category description',
            'parent_category_id.required' => 'Please select a parent category',
            'service_category_icon.*.mimetypes' => 'Please upload correct file',
            'service_category_icon.*.max' => 'Please upload file within 6MB'
        ])->validate();

        if ($request->hasFile('service_category_icon')) {
            $file = $request->file('service_category_icon');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/service_category_icon/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/service_category_icon/original/';
            $file->move($destinationPath, $fileName1);
        } else {
            $fileName1 = $request->exit_service_category_icon;
        }

        $edit = ServiceCategory::find($service_category_id);
        $edit->service_category_name = $request->service_category_name;
        $edit->service_category_description = $request->service_category_description;
        $edit->parent_category_id = $request->parent_category_id;
        $edit->featured_service_category = ($request->featured_service_category) ? 1 : 0;
        $edit->service_category_icon = $fileName1;

        if ($edit->save()) {
            $request->session()->flash("submit-status", "Service Category has been updated successfully");
            return redirect('/admin/service_categories');
        }
    }

    public function delete(Request $request, $service_category_id)
    {
        //$delete = ServiceCategory::where('id', $service_category_id)->delete();
        $delete = ServiceCategory::find($service_category_id);
        $delete->status = 2;

        if ($delete->save()) {
            $request->session()->flash("submit-status", "Service Category has been deleted successfully");
            return redirect('/admin/service_categories');
        }
    }
}
