<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HasilAkhirController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $namakombinasi = $request->input('namaKombinasi');
        $minsupport = $request->input('minSupport');
        $minconfidence = $request->input('minConfidence');

        if($id)
        {
            $hasilakhir = hasil_akhir::find($id);

            if($hasilakhir)
            {
                return ResponseFormatter::success(
                    $data,
                    'Data Hasil Akhir Berhasil Diambil',
            );
            }
            else
            {
                return ResponseFormatter::error(
                    null,
                    'Data Tidak Ada',
                    404
                );
            }
        }

        $hasilakhir =hasil_akhir::query();

        if($namakombinasi)
        {
            $hasilakhir->where('namaKombinasi','like','%' . $namakombinasi . '%');
        }
        
        if($minsupport)
        {
            $hasilakhir->where('minSupport','like','%' . $minsupport . '%');
        }

        if($minconfidence)
        {
            $hasilakhir->where('minConfidence','like','%' . $minconfidence . '%');
        }

        return ResponseFormatter::success(
            $hasilakhir->paginate($limit),
            'Hasil Akhir List Berhasil Diambil'
        );
    }
}
