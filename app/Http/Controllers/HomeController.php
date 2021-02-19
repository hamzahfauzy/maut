<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Valuation;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kriteria = Criteria::count();
        $subkriteria = Subcriteria::count();
        $alternatif = Alternatif::count();
        $penilaian = Valuation::count()/$alternatif;
        return view('home',compact('kriteria','subkriteria','alternatif','penilaian'));
    }
}
