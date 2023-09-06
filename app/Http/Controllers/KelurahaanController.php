<?php

namespace App\Http\Controllers;

use App\Models\kelurahaan;
use Illuminate\Http\Request;

class KelurahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = kelurahan::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $result
        ]);
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
    public function store(Request $request)
    {
        $request->validate([
            'kelurahan' => 'required'
        ]);


        if($request){
            $check = kelurahan::where('kelurahan', $request->kelurahan)->first();
            if($check != null){
                return response()->json([
                    'status' => false,
                    'message' => 'Data kelurahan ' . $request->kelurahan . ' Sudah terdaftar'
                ]);
            }

            $result = kelurahan::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditambah',
                'data' => $result
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Data gagal ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kelurahaan  $kelurahaan
     * @return \Illuminate\Http\Response
     */
    public function show(kelurahaan $kelurahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kelurahaan  $kelurahaan
     * @return \Illuminate\Http\Response
     */
    public function edit(kelurahaan $kelurahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelurahaan  $kelurahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelurahan' => 'required'
        ]);

        if(!$request){
            return response()->json([
                'status' => false,
                'message' => 'Tolong masukkan data dengan benar'
            ]);
        }

        $check = kelurahaan::where('kelurahan', $request->kelurahan)->first();
        if($check != null){
            return response()->json([
                'status' => false,
                'message' => 'Data kelurahan ' . $request->kelurahan . ' Sudah terdaftar'
            ]);
        }

        $data = kelurahaan::find($id);
        if(!$data){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        $data->update($request->only(['kelurahan']));
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diedit',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelurahaan  $kelurahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kelurahaan::find($id);
        if(!$data){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        $data->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
