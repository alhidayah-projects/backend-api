<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /** register */
    public function register(Request $request)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not create user'
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter'
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ], 201);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    
    }

    //login
    public function login(Request $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 200);
    }

    // logout
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'logout success'
        ], 200);
    }

    // update user with password and without password
    public function updateProfile(Request $request, $id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not update user'
            ], 403);
        }
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ],200);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'role' => 'required',
            'email' => 'required|string|max:255|unique:users,email,' . $id
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return response()->json([
            'success' => true,
            'message' => 'User data successfully updated',
            'data' => $user
        ], 200);
    }

    // get all user
    public function getAllUser()
    {
        
        $user = User::all();
        $user = User::paginate(10);
        return response()->json([
            'success' => true,
            'message' => 'All Data User',
            'data' => $user
        ], 200);
    }

    // delete user only admin
    public function destroy($id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete user'
            ], 403);
        }
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ],200);
        }
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'User data successfully deleted',
        ], 200);
    }
}