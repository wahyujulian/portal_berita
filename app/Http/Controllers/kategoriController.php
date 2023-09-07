<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $data = kategori::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'namaKategori' => 'required',
            'deskripsi' => 'required'
        ]);

        if($request){
            $check = kategori::where('namaKategori',$request->namaKategori)->first();
            if($check != null){
                return response()->json([
                    'status' => false,
                    'message' => 'Data Nama Kategori ' . $request->namaKategori . ' Sudah ada!'
                ]);
            }
            $data = kategori::create($request->all());
            if($data){
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil ditambah',
                    'data' => $data
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Data tidak berhasil ditambah'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Tolong masukkan data dengan benar'
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKategori' => 'required',
            'deskripsi' => 'required'
        ]);

        if($request){
            $check = kategori::where('namakategori',$request->namaKategori)->first();
            if($check != null){
                return response()->json([
                    'status' => false,
                    'message' => 'Data Nama Kategori ' . $request->namaKategori . ' Sudah ada!'
                ]);
            }
            $data = kategori::find($id);
            if($data){
                $data->update($request->only(['namaKategori','deskripsi']));
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diedit',
                    'data' => $data
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Mohon masukkan data dengan benar!'
        ]);
    }

    public function destroy($id)
    {
        $data = kategori::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Data tidak berhasil dihapus'
        ]);
    }
}
