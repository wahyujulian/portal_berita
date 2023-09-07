<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use Illuminate\Http\Request;

class kecamatanController extends Controller
{
    public function index()
    {
        $result = kecamatan::all();
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
            'kecamatan' => 'required'
        ]);


        if($request){
            $check = kecamatan::where('kecamatan', $request->kecamatan)->first();
            if($check != null){
                return response()->json([
                    'status' => false,
                    'message' => 'Data kecamatan ' . $request->kecamatan . ' Sudah terdaftar'
                ]);
            }

            $result = kecamatan::create($request->all());
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
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(kecamatan $kecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kecamatan' => 'required'
        ]);

        if(!$request){
            return response()->json([
                'status' => false,
                'message' => 'Tolong masukkan data dengan benar'
            ]);
        }

        $check = kecamatan::where('kecamatan', $request->kecamatan)->first();
        if($check != null){
            return response()->json([
                'status' => false,
                'message' => 'Data kecamatan ' . $request->kecamatan . ' Sudah terdaftar'
            ]);
        }

        $data = kecamatan::find($id);
        if(!$data){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        $data->update($request->only(['kecamatan']));
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diedit',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kecamatan::find($id);
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
