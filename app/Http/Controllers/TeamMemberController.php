<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Validator;
use \App\TeamMember;

class TeamMemberController extends Controller
{
    public function index(Request $request)
    {
        $team_members = TeamMember::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('admin.team_members.listings')->with('team_members', $team_members);
    }

    public function add(Request $request)
    {
        return view('admin.team_members.add');
    }

    public function add_submit(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:team_members,name',
            'email' => 'required|email',
            'description' => 'required',
            'image' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ], [
            'name.required' => 'Please enter team member name',
            'name.unique' => 'Team member name already exists',
            'email.required' => 'Please enter team member email address',
            'email.email' => 'Please enter a valid email address',
            'description.required' => 'Please enter team member description',
            'image.required' => 'Please upload team member image',
            'image.*.mimetypes' => 'Please upload correct file',
            'image.*.max' => 'Please upload file within 6MB'
        ])->validate();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/team_members/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/team_members/original/';
            $file->move($destinationPath, $fileName1);
        }

        $add = new TeamMember();
        $add->name = $request->name;
        $add->email = $request->email;
        $add->description = $request->description;
        $add->image = $fileName1;

        if ($add->save()) {
            $request->session()->flash("submit-status", "Team Member has been added successfully");
            return redirect('/admin/team_members');
        }
    }

    public function edit_view(Request $request, $team_member_id)
    {
        $team_member_details = TeamMember::find($request->team_member_id)->toArray();
        return view('admin.team_members.edit')->with('team_member_details', $team_member_details);
    }

    public function edit_submit(Request $request, $team_member_id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:6144'
        ], [
            'name.required' => 'Please enter team member name',
            'email.required' => 'Please enter team member email address',
            'email.email' => 'Please enter a valid email address',
            'description.required' => 'Please enter team member description',
            'image.*.mimetypes' => 'Please upload correct file',
            'image.*.max' => 'Please upload file within 6MB'
        ])->validate();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName1 = time() . '_' . $file->getClientOriginalName();

            //thumb destination path
            $destinationPath_2 = public_path() . '/upload/team_members/resize';
            $img = Image::make($file->getRealPath());
            $img->resize(360, 640, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath_2 . '/' . $fileName1);
            //original destination path
            $destinationPath = public_path() . '/upload/team_members/original/';
            $file->move($destinationPath, $fileName1);
        } else {
            $fileName1 = $request->exit_team_member_image;
        }

        $edit = TeamMember::find($team_member_id);
        $edit->name = $request->name;
        $edit->email = $request->email;
        $edit->description = $request->description;
        $edit->image = $fileName1;

        if ($edit->save()) {
            $request->session()->flash("submit-status", "Team Member has been updated successfully");
            return redirect('/admin/team_members');
        }
    }

    public function delete(Request $request, $team_member_id)
    {
        $delete = TeamMember::find($team_member_id);
        $delete->status = 2;

        if ($delete->save()) {
            $request->session()->flash("submit-status", "Team Member has been deleted successfully");
            return redirect('/admin/team_members');
        }
    }
}
