<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $tanggalawal = $request->format_date($tanggal[0]);
        $tanggalakhir = $request->format_date($tanggal[1]);
        $minsupport = $request->input('min_support');
        $minconfidence = $request->input('min_confidence');

        if($id)
        {
            $proses = Proses::find($id);

            if($proses)
            {
                return ResponseFormatter::success(
                    $proses,
                    'Data Berhasil Diambil',
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

        $proses = Proses::query();

        if($tanggalawal)
        {
            $proses->where('tanggal_awal','like','%' . $tanggalawal . '%');
        }

        if($tanggalakhir)
        {
            $proses->where('tanggal_akhir','like','%' . $tanggalakhir . '%');
        }
        
        if($minsupport)
        {
            $proses->where('min_support','like','%' . $minsupport . '%');
        }

        if($minconfidence)
        {
            $proses->where('min_confidence','like','%' . $minconfidence . '%');
        }

        return ResponseFormatter::success(
            $proses->paginate($limit),
            'Proses List Berhasil Diambil'
        );
    }
}
