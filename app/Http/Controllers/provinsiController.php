<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use Illuminate\Http\Request;

class provinsiController extends Controller
{
    public function index()
    {
        $result = provinsi::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $result
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'provinsi' => 'required'
        ]);


        if($request){
            $check = provinsi::where('provinsi', $request->provinsi)->first();
            if($check != null){
                return response()->json([
                    'status' => false,
                    'message' => 'Data provinsi ' . $request->provinsi . ' Sudah terdaftar'
                ]);
            }

            $result = provinsi::create($request->all());
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'provinsi' => 'required'
        ]);

        if(!$request){
            return response()->json([
                'status' => false,
                'message' => 'Tolong masukkan data dengan benar'
            ]);
        }

        $check = provinsi::where('provinsi', $request->provinsi)->first();
        if($check != null){
            return response()->json([
                'status' => false,
                'message' => 'Data provinsi ' . $request->provinsi . ' Sudah terdaftar'
            ]);
        }

        $data = provinsi::find($id);
        if(!$data){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        $data->update($request->only(['provinsi']));
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diedit',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data = provinsi::find($id);
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
