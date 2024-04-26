<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|unique:users,user_name',
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::create([
            'user_name' => $request->user_name, 
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['message' => 'User registered successfully','token' => $token], 201);
    }

    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'user_name' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    $user = User::where('user_name', $request->user_name)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['message' => 'Login Successfull','token' => $token]);
}

public function logout(Request $request)
{
    $user = $request->user();
    

    return response()->json(['message' => 'Logged out successfully']);
}
}
