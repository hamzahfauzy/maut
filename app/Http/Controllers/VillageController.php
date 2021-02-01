<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\Province;
use Illuminate\Http\Request;

/**
 * Class VillageController
 * @package App\Http\Controllers
 */
class VillageController extends Controller
{

    function __construct()
    {
        $this->province = new Province;
        $this->province_map = [];
        $provinces = $this->province->get();
        foreach($provinces as $province)
            $this->province_map[$province->id] = $province->name;
        $this->provinces = $this->province->with('regencies','regencies')->get();
    }
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
        $provinces = $this->province_map;
        $regencies = $this->provinces;
        return view('village.create', compact('village','provinces','regencies'));
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
        $provinces = $this->province_map;
        $regencies = $this->provinces;
        return view('village.edit', compact('village','provinces','regencies'));
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
