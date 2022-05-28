<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
// use GuzzleHttp\Psr7\Request;
use App\Helpers\ClientResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
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

    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $data = $validator->validated();
        if(!Auth::attempt($data)){
            return ClientResponse::errorResponse(Response::HTTP_UNAUTHORIZED, 'Unauthorized access');
        }
        $user = Users::where('email', $data['email'])->firstOrFail();
        $token = $user->createToken('web-token')->plainTextToken;
        return ClientResponse::successResponse(Response::HTTP_OK, 'Login Success', ['access_token' => $token, 'type' => 'Bearer']);
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
            return $validator->errors();
        }

        $data = $validator->validated();
        $data['password'] = Hash::make($data['password']);

        $token =  Users::create($data)->createToken('web-token')->plainTextToken;
        return ClientResponse::successResponse(Response::HTTP_OK, 'Registration Success', ['access_token' => $token, 'type' => 'Bearer']);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }

    public function logout(Request $request){
        auth('sanctum')->user()->tokens()->delete();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Logout Success');
    }
}
