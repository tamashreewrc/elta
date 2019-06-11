<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator;
use \App\GalleryType;

class GalleryController extends Controller
{
	public function gallery_type_list(Request $request)
	{
		$gallery_types = GalleryType::orderby('id', 'asc')->get()->toArray();
		return view('admin.gallery.gallery_type_listings')->with('gallery_types', $gallery_types);
        //return view('admin.gallery.gallery_type_listings');
	}

	public function gallery_type_add(Request $request)
	{
		return view('admin.gallery.gallery_type_add');
	}

	public function gallery_type_add_submit(Request $request)
	{
		Validator::make($request->all(), [
			'gallery_type_name' => 'required|unique:gallery_types,name',
			'gallery_type_description' => 'required',
			'gallery_type_icon' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144'
		], [
			'gallery_type_name.required' => 'Please enter gallery type name',
			'gallery_type_name.unique' => 'Gallery type name already exists',
			'gallery_type_description.required' => 'Please enter gallery type description',
			'gallery_type_icon.required' => 'Please upload gallery type icon',
			'gallery_type_icon.*.mimetypes' => 'Please upload correct file',
			'gallery_type_icon.*.max' => 'Please upload file within 6MB'
		])->validate();

		if ($request->hasFile('gallery_type_icon')) {
			$file = $request->file('gallery_type_icon');
			$fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
			$destinationPath_2 = public_path() . '/upload/gallery_type_icon/resize';
			$img = Image::make($file->getRealPath());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
			$destinationPath = public_path() . '/upload/gallery_type_icon/original/';
			$file->move($destinationPath, $fileName1);
		}

		$add = new GalleryType();
		$add->name = $request->gallery_type_name;
		$add->description = $request->gallery_type_description;
		$add->icon = $fileName1;

		if ($add->save()) {
			$request->session()->flash("submit-status", "Gallery Type has been added successfully");
			return redirect('/admin/gallery_type');
		}
	}

	public function gallery_type_edit_view(Request $request, $gallery_type_id)
	{
		$gallery_type_details = GalleryType::find($request->gallery_type_id)->toArray();
		return view('admin.gallery.gallery_type_edit')->with('gallery_type_details', $gallery_type_details);
	}

	public function gallery_type_edit_submit(Request $request, $gallery_type_id)
	{
		Validator::make($request->all(), [
			'gallery_type_name' => 'required',
			'gallery_type_description' => 'required',
			'gallery_type_icon' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'
		], [
			'gallery_type_name.required' => 'Please enter gallery type name',
			'gallery_type_name.unique' => 'Gallery type name already exists',
			'gallery_type_description.required' => 'Please enter gallery type description',
			'gallery_type_icon.*.mimetypes' => 'Please upload correct file',
			'gallery_type_icon.*.max' => 'Please upload file within 6MB'
		])->validate();

		if ($request->hasFile('gallery_type_icon')) {
			$file = $request->file('gallery_type_icon');
			$fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
			$destinationPath_2 = public_path() . '/upload/gallery_type_icon/resize';
			$img = Image::make($file->getRealPath());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
			$destinationPath = public_path() . '/upload/gallery_type_icon/original/';
			$file->move($destinationPath, $fileName1);
		} else {
			$fileName1 = $request->exit_gallery_type_icon;
		}

		$edit = GalleryType::find($gallery_type_id);
		$edit->name = $request->gallery_type_name;
		$edit->description = $request->gallery_type_description;
		$edit->icon = $fileName1;

		if ($edit->save()) {
			$request->session()->flash("submit-status", "Gallery Type has been updated successfully");
			return redirect('/admin/gallery_type');
		}
	}

	public function gallery_type_delete(Request $request, $gallery_type_id)
	{
		$delete = GalleryType::where('id', $gallery_type_id)->delete();
		$request->session()->flash("submit-status", "Gallery Type has been deleted successfully");
		return redirect('/admin/gallery_type');
	}
}
