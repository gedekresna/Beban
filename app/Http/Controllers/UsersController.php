<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
// use GuzzleHttp\Psr7\Request;
use App\Helepers\ClientResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
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
        $credentials =  $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        if(!Auth::attempt($credentials)){
            // $request->session()->regenerate();
            return ClientResponse::errorResponse(Response::HTTP_UNAUTHORIZED, 'Unauthorized access');
        }
        $user = Users::where('email', $credentials['email'])->firstOrFail();
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
        $user = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'role' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $user['password'] = Hash::make($user['password']);

        $token =  Users::create($user)->createToken('web-token')->plainTextToken;
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
}
