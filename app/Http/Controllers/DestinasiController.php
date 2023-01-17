<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Resources\DestinasiResource;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Destinasi::get();
        if (is_null($produk)) {
            $data = 'null';
            $message = 'Data Tidak Ditemukan';
        } else {
            $data = DestinasiResource::collection($produk);
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
        $detail = Destinasi::create([
            'nama' => $request->nama,
            'provinsi_id' => $request->provinsi_id,
            'deskripsi' => $request->deskripsi,
            'url_foto' => $request->url_foto,
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
