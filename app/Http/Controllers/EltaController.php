<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use \App\EltaDetail;

class EltaController extends Controller
{
    public function index(Request $request)
    {
        $elta_list = EltaDetail::where('status', '1')->orderby('id', 'asc')->get()->toArray();
        return view('admin.elta.listings')->with('elta_list', $elta_list);
    }

    public function add(Request $request)
    {
        return view('admin.elta.add');
    }

    public function add_submit(Request $request)
    {
        Validator::make($request->all(), [
            'elta_letter' => 'required|unique:elta_details,elta_letter',
            'elta_symbol' => 'required',
            //'elta_word_details' => 'required',
            'elta_word' => 'required',
            'elta_parts_of_speech' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
        ], [
            'elta_letter.required' => 'Please select a letter',
            'elta_letter.unique' => 'Letter already exists',
            'elta_symbol.required' => 'Please enter symbol',
            //'elta_word_details.required' => 'Please enter word details',
            'elta_word.required' => 'Please enter a word',
            'elta_parts_of_speech.required' => 'Please enter the parts of speech',
            'description_1.required' => 'Please enter description',
            'description_2.required' => 'Please enter description',
        ])->validate();

        $add = new EltaDetail();
        $add->elta_letter = $request->elta_letter;
        $add->elta_word = $request->elta_word;
        $add->elta_symbol = $request->elta_symbol;
        $add->elta_parts_of_speech = $request->elta_parts_of_speech;
        //$add->elta_word_details = $request->elta_word_details;
        $add->elta_synonyms = $request->elta_synonyms;
        $add->description_1 = $request->description_1;
        $add->description_2 = $request->description_2;

        if ($add->save()) {
            $request->session()->flash("submit-status", "Record has been added successfully");
            return redirect('/admin/elta');
        }
    }

    public function edit_view(Request $request, $elta_id)
    {
        $elta_details = EltaDetail::find($request->elta_id)->toArray();
        return view('admin.elta.edit')->with('elta_details', $elta_details);
    }

    public function edit_submit(Request $request, $elta_id)
    {
        Validator::make($request->all(), [
            'elta_letter' => 'required',
            'elta_symbol' => 'required',
            //'elta_word_details' => 'required',
            'elta_word' => 'required',
            'elta_parts_of_speech' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
        ], [
            'elta_letter.required' => 'Please select a letter',
            'elta_symbol.required' => 'Please enter symbol',
            //'elta_word_details.required' => 'Please enter word details',
            'elta_word.required' => 'Please enter a word',
            'elta_parts_of_speech.required' => 'Please enter the parts of speech',
            'description_1.required' => 'Please enter description',
            'description_2.required' => 'Please enter description',
        ])->validate();

        $edit = EltaDetail::find($elta_id);
        $edit->elta_letter = $request->elta_letter;
        $edit->elta_word = $request->elta_word;
        $edit->elta_symbol = $request->elta_symbol;
        $edit->elta_parts_of_speech = $request->elta_parts_of_speech;
        //$edit->elta_word_details = $request->elta_word_details;
        $edit->elta_synonyms = $request->elta_synonyms;
        $edit->description_1 = $request->description_1;
        $edit->description_2 = $request->description_2;

        if ($edit->save()) {
            $request->session()->flash("submit-status", "Record has been updated successfully");
            return redirect('/admin/elta');
        }
    }

    public function delete(Request $request, $elta_id)
    {
        //$delete = EltaDetail::where('id', $elta_id)->delete();
        $delete = EltaDetail::find($elta_id);
        $delete->status = 2;

        if ($delete->save()) {
            $request->session()->flash("submit-status", "Record has been deleted successfully");
            return redirect('/admin/elta');
        }
    }
}
