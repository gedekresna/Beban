<?php

namespace App\Http\Controllers;

use App\Models\Disasters;
use Illuminate\Http\Request;
use App\Helpers\ClientResponse;
use Illuminate\Support\Facades\Validator;
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
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get list disasters location', $disasters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDisastersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'address' => 'required|string',
            'description' => 'required|string',
            'postal_code' => 'required|numeric',
            'latitude' => 'required|string|numeric',
            'longitude' => 'required|string|numeric',
            'disaster_types' => 'required|array',
            'disaster_types.*' => 'exists:disaster_types,id'
        ]);

        if($validator->fails()){
            return ClientResponse::errorValidatonResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }
        $data = $validator->validated();
        $disasters = Disasters::create([
            'user_id' => auth()->id(),
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'address' => $data['address'],
            'postal_code' => $data['postal_code'],
            'description' => $data['description']
        ]);
        $disasters->types()->attach($data['disaster_types']);
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success create disaster location', $disasters);

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
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get disaster location', $disasters);
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
        $validator = Validator::make($request->all(),[
            'address' => 'required|string',
            'description' => 'required|string',
            'postal_code' => 'required|numeric',
            'latitude' => 'required|string|numeric',
            'longitude' => 'required|string|numeric',
            'disaster_types' => 'required|array',
            'disaster_types.*' => 'exists:disaster_types,id'
        ]);

        if($validator->fails()){
            return ClientResponse::errorValidatonResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }
        $data = $validator->validated();
        $disasters = Disasters::findOrFail($id);
        if($request->user()->cannot('update', $disasters)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to update this resource');
        }
        $disasters->update($data);
        $disasters->types()->sync($data['disaster_types']);
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success update disaster location', $disasters);
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
        $disasters->types()->detach();
        $disasters->delete();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success delete location', $disasters);
    }
}
