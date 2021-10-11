<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{

	// for user registration api
    public function register(Request $request){
		$validatedData = $request->validate([
						   'name' => 'required|string|max:255',
						   'phone'=>'required|integer',
		                   'email' => 'required|string|email|max:255|unique:users',
		                   'password' => 'required|string|min:8',
		]);

		      $user = User::create([
		              	   'name' => $validatedData['name'],
		              	   'phone' => $validatedData['phone'],
		                   'email' => $validatedData['email'],
		                   'password' => Hash::make($validatedData['password']),
		       ]);

		$token = $user->createToken('auth_token')->plainTextToken;

		return response()->json([
		              		'access_token' => $token,
		                   'token_type' => 'Bearer',
							]);
	}//end method



	public function login(Request $request){

		if (!Auth::attempt($request->only('email', 'password'))) {
		return response()->json([
		'message' => 'Login not success'
		           ], 401);
		       }

		$user = User::where('email', $request['email'])->firstOrFail();

		$token = $user->createToken('auth_token')->plainTextToken;

		return response()->json([
		           'access_token' => $token,
		           'user_info'=>$user,
		           'token_type' => 'Bearer',
		]);


}// end login









}
