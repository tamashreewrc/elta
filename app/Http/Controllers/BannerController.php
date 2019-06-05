<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator;
use \App\Banner;

class BannerController extends Controller
{
    public function add()
    {
        return view('admin.banner.banner_add');
    }

    public function showAll()
    {
        $banners = \App\Banner::all();
        return view('admin.banner.banner', compact('banners'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'addBannerTitle' => 'required',
            'addBannerDescription' => 'required',
            'addBannerLink' => 'required',
            'addBannerImage' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ], [
            'addBannerTitle.required' => 'Please enter Banner Title',
            'addBannerDescription.required' => 'Please enter Banner Description',
            'addBannerLink.required' => 'Please enter Banner Link',
            'addBannerImage.required' => 'Please upload banner image',
            'addBannerImage.*.mimetypes' => 'Please upload correct file',
            'addBannerImage.*.max' => 'Please upload file within 6MB'
        ])->validate();

        if ($request->hasFile('addBannerImage')) {

            $file = $request->file('addBannerImage');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path() . '/upload/banners/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);

            $destinationPath = public_path() . '/upload/banners/original/';
            $file->move($destinationPath, $fileName);
        }

        $banner = new Banner();

        $banner->banner_title = $request->addBannerTitle;
        $banner->banner_description = $request->addBannerDescription;
        $banner->banner_link = $request->addBannerLink;
        $banner->banner_image = $fileName;

        if ($banner->save()) {
            $request->session()->flash("submit-status", "Banner added successfully.");
            return redirect('/admin/banner');
        }

    }

    public function edit($id)
    {
        $banner = \App\Banner::find($id);
        return view('admin.banner.banner_edit', compact('banner', 'id'));
    }

    public function update(Request $request, $id)
    {

        Validator::make($request->all(), [
            'editBannerTitle' => 'required',
            'editBannerDescription' => 'required',
            'editBannerLink' => 'required',
            'editBannerImage' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ], [
            'editBannerTitle.required' => 'Please enter Banner Title',
            'editBannerDescription.required' => 'Please enter Banner Description',
            'editBannerLink.required' => 'Please enter Banner Link',
            'editBannerImage.*.mimetypes' => 'Please upload correct file',
            'editBannerImage.*.max' => 'Please upload file within 6MB'
        ])->validate();

        $banner = Banner::find($id);

        if ($request->hasFile('editBannerImage')) {
            $file = $request->file('editBannerImage');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path() . '/upload/banners/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $fileName);

            $destinationPath = public_path() . '/upload/banners/original/';
            $file->move($destinationPath, $fileName);

        } else {
            $fileName = $banner->banner_image;
        }

        $banner->banner_title = $request->editBannerTitle;
        $banner->banner_description = $request->editBannerDescription;
        $banner->banner_link = $request->editBannerLink;
        $banner->banner_image = $fileName;

        if ($banner->save()) {
            $request->session()->flash("submit-status", "Banner edited successfully.");
            return redirect('/admin/banner');
        }

    }

    public function delete(Request $request, $id)
    {

        $banner = \App\Banner::find($id);

        // $originalImgLocation = public_path().'/upload/banners/original/';

        // $resizeImgLocation = public_path().'/upload/banners/resize/';

        // $originalImgLocation = public_path().'/upload/banners/original/';

        // $resizeImgLocation = public_path().'/upload/banners/resize/';

        if ($banner->delete()) {

            // unlink($originalImgLocation.$banner->banner_image);
            // unlink($resizeImgLocation.$banner->banner_image);

            $request->session()->flash("submit-status", "Banner deleted successfully.");
            return redirect('/admin/banner');
        }

    }

}
