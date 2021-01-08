<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;

/**
 * Class VillageController
 * @package App\Http\Controllers
 */
class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages = Village::paginate();

        return view('village.index', compact('villages'))
            ->with('i', (request()->input('page', 1) - 1) * $villages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $village = new Village();
        return view('village.create', compact('village'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Village::$rules);

        $village = Village::create($request->all());

        return redirect()->route('villages.index')
            ->with('success', 'Village created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $village = Village::find($id);

        return view('village.show', compact('village'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $village = Village::find($id);

        return view('village.edit', compact('village'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Village $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        request()->validate(Village::$rules);

        $village->update($request->all());

        return redirect()->route('villages.index')
            ->with('success', 'Village updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $village = Village::find($id)->delete();

        return redirect()->route('villages.index')
            ->with('success', 'Village deleted successfully');
    }
}
