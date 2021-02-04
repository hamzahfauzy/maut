<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

/**
 * Class AlternatifController
 * @package App\Http\Controllers
 */
class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatifs = Alternatif::paginate();

        return view('alternatif.index', compact('alternatifs'))
            ->with('i', (request()->input('page', 1) - 1) * $alternatifs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alternatif = new Alternatif();
        return view('alternatif.create', compact('alternatif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Alternatif::$rules);

        $alternatif = Alternatif::create($request->all());

        return redirect()->route('alternatifs.index')
            ->with('success', 'Alternatif created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alternatif = Alternatif::find($id);

        return view('alternatif.show', compact('alternatif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);

        return view('alternatif.edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Alternatif $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        request()->validate(Alternatif::$rules);

        $alternatif->update($request->all());

        return redirect()->route('alternatifs.index')
            ->with('success', 'Alternatif updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alternatif = Alternatif::find($id)->delete();

        return redirect()->route('alternatifs.index')
            ->with('success', 'Alternatif deleted successfully');
    }
}
