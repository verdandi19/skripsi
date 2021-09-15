<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfidenceController extends Controller
{

    public function all(Request $request)
    {
    $id = $request->input('id');
    $limit = $request->input('limit');
    $kombinasiitem = $request->input('kombinasiItem');
    $jumlahitem = $request->input('jumlahItem');
    $persen = $request->input('persen');
    $hasil = $request->input('hasil');
    $minconfidence = $request->input('minConfidence');

    if($id)
        {
            $confidence = confidence::find($id);

            if($confidence)
            {
                return ResponseFormatter::success(
                    $data,
                    'Data Confidence Berhasil Diambil',
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

        $confidence = confidence::query();

        if($kombinasiitem)
        {
            $confidence->where('kombinasiItem','like','%' . $kombinasiitem . '%');
        }
        
        if($jumlahitem)
        {
            $confidence->where('jumlahItem','like','%' . $jumlahitem . '%');
        }

        if($persen)
        {
            $confidence->where('persen','like','%' . $persen . '%');
        }

        if($hasil)
        {
            $confidence->where('hasil','like','%' . $hasil . '%');
        }

        if($minconfidence)
        {
            $confidence->where('minConfidence','like','%' . $minconfidence . '%');
        }

        return ResponseFormatter::success(
            $confidence->paginate($limit),
            'Confidence List Berhasil Diambil'
        );
    }
}
