<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Subcriteria;
use Illuminate\Http\Request;

/**
 * Class SubcriteriaController
 * @package App\Http\Controllers
 */
class SubcriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criteria = isset($_GET['criteria']) ? $_GET['criteria'] : 0;
        $criterias = Criteria::get();
        $subcriterias = Subcriteria::where('criteria_id',$criteria)->paginate();

        return view('subcriteria.index', compact('subcriterias','criterias','criteria'))
            ->with('i', (request()->input('page', 1) - 1) * $subcriterias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcriteria = new Subcriteria();
        $subcriteria->criteria_id = $_GET['criteria'];
        return view('subcriteria.create', compact('subcriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Subcriteria::$rules);

        $subcriteria = Subcriteria::create($request->all());

        return redirect()->route('subcriterias.index',['criteria'=>$subcriteria->criteria_id])
            ->with('success', 'Subcriteria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcriteria = Subcriteria::find($id);

        return view('subcriteria.show', compact('subcriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcriteria = Subcriteria::find($id);

        return view('subcriteria.edit', compact('subcriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Subcriteria $subcriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcriteria $subcriteria)
    {
        request()->validate(Subcriteria::$rules);

        $subcriteria->update($request->all());

        return redirect()->route('subcriterias.index',['criteria'=>$subcriteria->criteria_id])
            ->with('success', 'Subcriteria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subcriteria = Subcriteria::find($id);
        $data = ['criteria'=>$subcriteria->criteria_id];
        $subcriteria->delete();

        return redirect()->route('subcriterias.index',$data)
            ->with('success', 'Subcriteria deleted successfully');
    }
}
