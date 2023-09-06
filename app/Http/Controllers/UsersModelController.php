<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersModelController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        // dd($user);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Data yang dimasukkan salah'
            ]);
        }
        $token = $user->createToken($request->username)->plainTextToken;
        if(!$token){
            return response()->json([
                'status' => false,
                'message' => 'Tidak berhasil membuat token'
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Anda berhasil Log In',
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $result = $request->user()->currentAccessToken()->delete();
        if(!$result){
            return response()->json([
                'status' => false,
                'message' => 'Anda Belum Melakukan Log In'
            ],400);
        }
        return response()->json([
            'status' => true,
            'message' => 'Anda Berhasil Melakukan Log Out'
        ],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(!$request){
            return response()->json([
                'message' => 'Tolong masukkan data dengan benar!'
            ]);
        }

        $check = User::where('username', $request->username)->where('email', $request->email)->first();

        if($check != null){
            return response()->json([
                'status' => false,
                'message' => 'Data anda sudah terdaftar',
            ]);
        }

        $result = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request['password'])
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Anda berhasil register',
        ]);
    }

    // public function get()
    // {
    //     $result = User::all();
    //     dd($result);
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usersModel  $usersModel
     * @return \Illuminate\Http\Response
     */
 
}
