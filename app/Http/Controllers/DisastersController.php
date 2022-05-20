<?php

namespace App\Http\Controllers;

use App\Models\Disasters;
use App\Http\Requests\StoreDisastersRequest;
use App\Http\Requests\UpdateDisastersRequest;

class DisastersController extends Controller
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
     * @param  \App\Http\Requests\StoreDisastersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisastersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Http\Response
     */
    public function show(Disasters $disasters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Http\Response
     */
    public function edit(Disasters $disasters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisastersRequest  $request
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDisastersRequest $request, Disasters $disasters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disasters $disasters)
    {
        //
    }
}
