<?php

namespace App\Http\Controllers;

use App\Models\DisasterTypes;
use App\Http\Requests\StoreDisasterTypesRequest;
use App\Http\Requests\UpdateDisasterTypesRequest;

class DisasterTypesController extends Controller
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
     * @param  \App\Http\Requests\StoreDisasterTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisasterTypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DisasterTypes  $disasterTypes
     * @return \Illuminate\Http\Response
     */
    public function show(DisasterTypes $disasterTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DisasterTypes  $disasterTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(DisasterTypes $disasterTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisasterTypesRequest  $request
     * @param  \App\Models\DisasterTypes  $disasterTypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDisasterTypesRequest $request, DisasterTypes $disasterTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DisasterTypes  $disasterTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(DisasterTypes $disasterTypes)
    {
        //
    }
}
