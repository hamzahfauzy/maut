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
        $alternatif = Alternatif::findOrFail($_GET['alternatif']);
        $valuations = Valuation::where('alternatif_id',$alternatif->id)->paginate();

        return view('valuation.index', compact('valuations','alternatif'))
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
        $alternatif = Alternatif::findOrFail($alternatif);
        $valuation = Valuation::where('alternatif_id',$alternatif->id)->get();
        $criterias = Criteria::get();
        return view('valuation.create', compact('valuation','criterias','alternatif'));
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
            Valuation::create(['alternatif_id'=>$req['alternatif_id'],'criteria_id'=>$criteria_id,'subcriteria_id'=>$sub_id]);
        }

        // $valuation = Valuation::create($request->all());

        return redirect()->route('valuations.index',['alternatif'=>$req['alternatif_id']])
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
        $alternatif = Alternatif::findOrFail($id);
        $valuation = Valuation::where('alternatif_id',$alternatif->id)->get()->toArray();
        // return $valuation;
        $criterias = Criteria::get();
        return view('valuation.edit', compact('valuation','criterias','alternatif'));
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
            $valuation = Valuation::where('alternatif_id',$req['alternatif_id'])->where('criteria_id',$criteria_id)->firstOrFail();
            $valuation->update(['subcriteria_id'=>$sub_id]);
        }

        return redirect()->route('valuations.index',['alternatif'=>$req['alternatif_id']])
            ->with('success', 'Valuation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $valuation = Valuation::where('alternatif_id',$id)->delete();

        return redirect()->route('valuations.index',['alternatif'=>$id])
            ->with('success', 'Valuation deleted successfully');
    }

    public function results()
    {
        $alternatifs = Alternatif::whereHas('valuations')->with('valuations','valuations.criteria','valuations.subcriteria')->get();
        $criterias = Criteria::get();
        return view('valuation.results',compact('alternatifs','criterias'));
    }
}
