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
        $disasterType = DisasterTypes::all();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get list disaster types', $disasterType);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if($validator->fails()){
            return ClientResponse::errorValidatonResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }

        $data = $validator->validated();
        // if($request->user()->cannot('create',Disasters::class)){
        //     return ClientResponse::errorResponse(Response::HTTP_FORBIDDEN, 'You are not allowed to create resource');
        // }
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

    public function destroy($id)
    {
        $disasterType = DisasterTypes::findOrFail($id);
        $disasterType->delete();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success delete disaster type');
    }
}
