<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

/**
 * Class LogController
 * @package App\Http\Controllers
 */
class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = Log::paginate();

        return view('log.index', compact('logs'))
            ->with('i', (request()->input('page', 1) - 1) * $logs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $log = new Log();
        return view('log.create', compact('log'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Log::$rules);

        $log = Log::create($request->all());

        return redirect()->route('logs.index')
            ->with('success', 'Log created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = Log::find($id);

        return view('log.show', compact('log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log = Log::find($id);

        return view('log.edit', compact('log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Log $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        request()->validate(Log::$rules);

        $log->update($request->all());

        return redirect()->route('logs.index')
            ->with('success', 'Log updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $log = Log::find($id)->delete();

        return redirect()->route('logs.index')
            ->with('success', 'Log deleted successfully');
    }
}
