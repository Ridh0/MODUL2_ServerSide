<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProvinsiResource;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Provinsi::get();
        if (is_null($produk)) {
            $data = 'null';
            $message = 'Data Tidak Ditemukan';
        } else {
            $data = ProvinsiResource::collection($produk);
            $message = 'Data Ditemukan';
        }
        
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
            ], 401);
        }
    }

    public function store(Request $request)
    {
        $detail = Provinsi::create([
            'id' => $request->id,
            'nama' => $request->nama,
        ]);


        if ($detail) {
            return response()->json([
                'success' => true,
                'message' => 'Data Destinasi Berhasil Disimpan!',
                'data'=>$detail
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Destinasi Gagal Disimpan!',
            ], 401);
        }
    }
}
