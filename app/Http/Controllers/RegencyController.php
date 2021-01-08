<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use Illuminate\Http\Request;

/**
 * Class RegencyController
 * @package App\Http\Controllers
 */
class RegencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regencies = Regency::paginate();

        return view('regency.index', compact('regencies'))
            ->with('i', (request()->input('page', 1) - 1) * $regencies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regency = new Regency();
        return view('regency.create', compact('regency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Regency::$rules);

        $regency = Regency::create($request->all());

        return redirect()->route('regencies.index')
            ->with('success', 'Regency created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regency = Regency::find($id);

        return view('regency.show', compact('regency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regency = Regency::find($id);

        return view('regency.edit', compact('regency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Regency $regency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regency $regency)
    {
        request()->validate(Regency::$rules);

        $regency->update($request->all());

        return redirect()->route('regencies.index')
            ->with('success', 'Regency updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $regency = Regency::find($id)->delete();

        return redirect()->route('regencies.index')
            ->with('success', 'Regency deleted successfully');
    }
}
