<?php

namespace App\Http\Controllers;

use App\Models\DisasterTypes;
use Illuminate\Http\Request;
use App\Helpers\ClientResponse;
use App\Http\Requests\StoreDisasterTypesRequest;
use App\Http\Requests\UpdateDisasterTypesRequest;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(Request $request)
    {
        $data = $request->only(['name']);
        // if($request->user()->cannot('create',Disasters::class)){
        //     return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to create resource');
        // }
        $disasterType = DisasterTypes::create([
            'name' => $data['name']
        ]);

        return ClientResponse::successResponse(Response::HTTP_OK, 'Success create disaster type', $disasterType);
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
