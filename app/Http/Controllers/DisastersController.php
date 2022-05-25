<?php

namespace App\Http\Controllers;

use App\Models\Disasters;
use Illuminate\Http\Request;
use App\Helpers\ClientResponse;
use App\Http\Requests\StoreDisastersRequest;
use App\Http\Requests\UpdateDisastersRequest;
use Symfony\Component\HttpFoundation\Response;

class DisastersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disasters = Disasters::where('user_id', auth()->id())->get();;
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get locations', $disasters);
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
        $data = $request->only(['description', 'postal_code', 'city', 'latitude', 'longitude', 'user_id']);
        if($request->user()->cannot('create',Disasters::class)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to create resource');
        }
        $disasters = Disasters::create([
            'description' => $data['description'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'user_id' => auth()->id()
        ]);
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success create location', $disasters);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $disasters = Disasters::findOrFail($id);
        if($request->user()->cannot('view', $disasters)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to see this resource');
        }
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get location', $disasters);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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
    public function update(Request $request, $id)
    {
        $data = $request->only(['description', 'city', 'postal_code', 'latitude', 'longitude']);
        $disasters = Disasters::findOrFail($id);
        if($request->user()->cannot('update', $disasters)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to update this resource');
        }
        $disasters->update($data);
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success update location', $disasters);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $disasters = Disasters::findOrFail($id);
        if($request->user()->cannot('delete', $disasters)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to delete this resource');
        }
        $disasters->delete();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success delete location', $disasters);
    }
}
