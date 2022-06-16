<?php

namespace App\Http\Controllers;

use App\Models\DisasterTypes;
use Illuminate\Http\Request;
use App\Helpers\ClientResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DisasterTypesController extends Controller
{
    public function index()
    {
        $disasterType = DisasterTypes::withCount('disasters')->get();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get list disaster types', $disasterType);
    }

    public function store(Request $request)
    {
        if($request->user()->cannot('create',DisasterTypes::class)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to create resource');
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if($validator->fails()){
            return ClientResponse::errorValidatonResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }

        $data = $validator->validated();
        $disasterType = DisasterTypes::create([
            'name' => $data['name']
        ]);

        return ClientResponse::successResponse(Response::HTTP_OK, 'Success create disaster type', $disasterType);
    }

    public function show($id)
    {
        $disasterType = DisasterTypes::findOrFail($id);
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get disaster type', $disasterType);
    }

    public function update(Request $request, $id)
    {
        if($request->user()->cannot('update',DisasterTypes::class)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to update resource');
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if($validator->fails()){
            return ClientResponse::errorValidatonResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }

        $data = $validator->validated();
        $disasterType = DisasterTypes::findOrFail($id);
        $disasterType->update([
            'name' => $data['name']
        ]);
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success update disaster type', $disasterType);
    }

    public function destroy(Request $request, $id)
    {
        if($request->user()->cannot('delete',DisasterTypes::class)){
            return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to delete resource');
        }
        $disasterType = DisasterTypes::findOrFail($id);
        $disasterType->disasters()->detach();
        $disasterType->delete();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success delete disaster type');
    }
}
