<?php

namespace App\Http\Controllers;

use App\Models\kabupaten;
use Illuminate\Http\Request;

class kabupatenController extends Controller
{
    public function index()
    {
        $result = kabupaten::all();
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
            'kabupaten' => 'required',
            'provinsi_id' => 'required'
        ]);

        if($request){
            $check = kabupaten::where('kabupaten', $request->kabupaten)->first();
            if($check != null){
                return response()->json([
                    'status' => false,
                    'message' => 'Data kabupaten ' . $request->kabupaten . ' Sudah terdaftar'
                ]);
            }

            $result = kabupaten::create($request->only(['kabupaten','provinsi_id']));
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
     * @param  \App\Models\kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit(kabupaten $kabupaten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kabupaten' => 'required'
        ]);

        if(!$request){
            return response()->json([
                'status' => false,
                'message' => 'Tolong masukkan data dengan benar'
            ]);
        }

        $check = kabupaten::where('kabupaten', $request->kabupaten)->first();
        if($check != null){
            return response()->json([
                'status' => false,
                'message' => 'Data kabupaten ' . $request->kabupaten . ' Sudah terdaftar'
            ]);
        }

        $data = kabupaten::find($id);
        if(!$data){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        $data->update($request->only(['kabupaten']));
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diedit',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kabupaten::find($id);
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
