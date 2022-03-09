<?php

namespace App\Http\Controllers;

use App\Models\simulasi;
use App\Http\Requests\StoresimulasiRequest;
use App\Http\Requests\UpdatesimulasiRequest;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('simulasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresimulasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresimulasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function show(simulasi $simulasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function edit(simulasi $simulasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesimulasiRequest  $request
     * @param  \App\Models\simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesimulasiRequest $request, simulasi $simulasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(simulasi $simulasi)
    {
        //
    }
}
