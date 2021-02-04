<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

/**
 * Class CriteriaController
 * @package App\Http\Controllers
 */
class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = Criteria::paginate();

        return view('criteria.index', compact('criterias'))
            ->with('i', (request()->input('page', 1) - 1) * $criterias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criteria = new Criteria();
        return view('criteria.create', compact('criteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Criteria::$rules);

        $criteria = Criteria::create($request->all());

        return redirect()->route('criterias.index')
            ->with('success', 'Criteria created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $criteria = Criteria::find($id);

        return view('criteria.show', compact('criteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criteria = Criteria::find($id);

        return view('criteria.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Criteria $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criteria $criteria)
    {
        request()->validate(Criteria::$rules);

        $criteria->update($request->all());

        return redirect()->route('criterias.index')
            ->with('success', 'Criteria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $criteria = Criteria::find($id)->delete();

        return redirect()->route('criterias.index')
            ->with('success', 'Criteria deleted successfully');
    }
}
