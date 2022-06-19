<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Helpers\ClientResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return ClientResponse::errorValidatonResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }
        $data = $validator->validated();
        if(!Auth::attempt($data)){
            return ClientResponse::errorResponse(Response::HTTP_UNAUTHORIZED, 'Unauthorized access');
        }
        $user = Users::where('email', $data['email'])->firstOrFail();
        $token = $user->createToken('web-token')->plainTextToken;
        return ClientResponse::successResponse(Response::HTTP_OK, 'Login Success', ['access_token' => $token, 'type' => 'Bearer', 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        if($validator->fails()){
            return ClientResponse::errorValidatonResponse(Response::HTTP_BAD_REQUEST, $validator->errors());
        }

        $data = $validator->validated();
        $data['password'] = Hash::make($data['password']);
        $user = Users::create($data);
        $token =  $user->createToken('web-token')->plainTextToken;
        return ClientResponse::successResponse(Response::HTTP_OK, 'Registration Success', ['access_token' => $token, 'type' => 'Bearer', 'user' => $user]);

    }

    public function show(){
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success show user', auth()->user());
    }

    public function logout(Request $request){
        auth('sanctum')->user()->tokens()->delete();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Logout Success');
    }
}
