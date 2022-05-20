<?php

namespace App\Http\Controllers;

use App\Models\ManyDisasters;
use App\Http\Requests\StoreManyDisastersRequest;
use App\Http\Requests\UpdateManyDisastersRequest;

class ManyDisastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreManyDisastersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManyDisastersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManyDisasters  $manyDisasters
     * @return \Illuminate\Http\Response
     */
    public function show(ManyDisasters $manyDisasters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManyDisasters  $manyDisasters
     * @return \Illuminate\Http\Response
     */
    public function edit(ManyDisasters $manyDisasters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManyDisastersRequest  $request
     * @param  \App\Models\ManyDisasters  $manyDisasters
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManyDisastersRequest $request, ManyDisasters $manyDisasters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManyDisasters  $manyDisasters
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManyDisasters $manyDisasters)
    {
        //
    }
}
