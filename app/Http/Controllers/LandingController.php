<?php

namespace App\Http\Controllers;

use \App\EltaDetail;

class LandingController extends Controller
{
    public function index()
    {
        $elta_e = EltaDetail::where('elta_letter', 'e')->get()->toArray();
        $elta_l = EltaDetail::where('elta_letter', 'l')->get()->toArray();
        $elta_t = EltaDetail::where('elta_letter', 't')->get()->toArray();
        $elta_a = EltaDetail::where('elta_letter', 'a')->get()->toArray();
        return view('frontend.landing')->with('elta_e', $elta_e[0])->with('elta_l', $elta_l[0])->with('elta_t', $elta_t[0])->with('elta_a', $elta_a[0]);
    }

}
