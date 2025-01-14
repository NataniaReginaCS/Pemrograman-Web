<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request) 
    {
        //validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
        ]);

        //create user
        $user =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //output
        return response()->json([
            'user' => $user,
            'message' => 'User registered successfully'
        ], 201);
    }

    public function login(Request $request)
    {
        //validasi
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //mencari user
        $user = User::where('email', $request->email)->first();

        //pemeriksaan apakah ada user
        if (!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        //create Personal Access Token
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        //output
        return response()->json([
            'detail'=> $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        //cek apakah ada usernya
        if(Auth::check()) {
            //hapus token
            $request->user()->currentAccessToken()->delete();
            //output
            return response()->json(['message' => 'Logged out successfully']);
        }

        return response()->json(['message'=> "Not logged in"], 401);
    }

    //Display
    public function index(){
        $allUser = User::all();
        return response()->json($allUser);
    }

    //Update
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, 
            'password' => 'nullable|string|min:8', 
        ], [
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
        ]);


        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email')) {
            $user->email = $request->email;
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password); 
        }

        $user->save();

        return response()->json([
            'message' => 'Berhasil mengupdate User',
            'user' => $user,
        ]);
    }

     // Delete
    public function destroy(Request $request)
    {
        $user = Auth::user();

        $user->delete();

        return response()->json(['message' => 'User berhasil dihapus.']);
    }
}
