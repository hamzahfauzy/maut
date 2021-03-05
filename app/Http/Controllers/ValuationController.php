<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Valuation;
use App\Models\Alternatif;
use App\Models\Subcriteria;
use Illuminate\Http\Request;

/**
 * Class ValuationController
 * @package App\Http\Controllers
 */
class ValuationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = isset($_GET['tahun'])?$_GET['tahun']:date('Y');
        $alternatif = Alternatif::findOrFail($_GET['alternatif']);
        $valuations = Valuation::where('alternatif_id',$alternatif->id)->where('tahun',$tahun)->paginate();

        return view('valuation.index', compact('valuations','alternatif','tahun'))
            ->with('i', (request()->input('page', 1) - 1) * $valuations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alternatif = $_GET['alternatif'];
        $tahun = $_GET['tahun'];
        $alternatif = Alternatif::findOrFail($alternatif);
        $valuation = Valuation::where('alternatif_id',$alternatif->id)->where('tahun',$tahun)->get();
        $criterias = Criteria::get();
        return view('valuation.create', compact('valuation','criterias','alternatif','tahun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = request()->validate(Valuation::$rules);
        foreach($req['subcriteria_id'] as $criteria_id => $sub_id)
        {
            $sub = Subcriteria::findOrFail($sub_id);
            Valuation::create(['alternatif_id'=>$req['alternatif_id'],'criteria_id'=>$criteria_id,'subcriteria_id'=>$sub_id,'tahun'=>$request->tahun]);
        }

        // $valuation = Valuation::create($request->all());

        return redirect()->route('valuations.index',['alternatif'=>$req['alternatif_id'],'tahun'=>$request->tahun])
            ->with('success', 'Valuation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valuation = Valuation::find($id);

        return view('valuation.show', compact('valuation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tahun = $_GET['tahun'];
        $alternatif = Alternatif::findOrFail($id);
        $valuation = Valuation::where('alternatif_id',$alternatif->id)->where('tahun',$tahun)->get()->toArray();
        // return $valuation;
        $criterias = Criteria::get();
        return view('valuation.edit', compact('valuation','criterias','alternatif','tahun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Valuation $valuation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $valuation)
    {
        $req = request()->validate(Valuation::$rules);
        foreach($req['subcriteria_id'] as $criteria_id => $sub_id)
        {
            $valuation = Valuation::where('alternatif_id',$req['alternatif_id'])->where('criteria_id',$criteria_id)->where('tahun',$request->tahun);
            if($valuation->exists())
                $valuation->first()->update(['subcriteria_id'=>$sub_id]);
            else
                Valuation::create(['alternatif_id'=>$req['alternatif_id'],'criteria_id'=>$criteria_id,'subcriteria_id'=>$sub_id,'tahun'=>$request->tahun]);
        }

        return redirect()->route('valuations.index',['alternatif'=>$req['alternatif_id'],'tahun'=>$request->tahun])
            ->with('success', 'Valuation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $valuation = Valuation::where('alternatif_id',$id)->where('tahun',$_GET['tahun'])->delete();

        return redirect()->route('valuations.index',['alternatif'=>$id,'tahun'=>$_GET['tahun']])
            ->with('success', 'Valuation deleted successfully');
    }

    public function results()
    {
        $tahun = isset($_GET['tahun'])?$_GET['tahun']:date('Y');
        $alternatifs = Alternatif::whereHas('valuations',function($q)use($tahun){
            $q->where('tahun',$tahun);
        })->with('valuations','valuations.criteria','valuations.subcriteria')->get();
        $criterias = Criteria::get();
        return view('valuation.results',compact('alternatifs','criterias','tahun'));
    }
}
