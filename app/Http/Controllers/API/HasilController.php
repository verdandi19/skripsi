<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $tanggalawal = $request->input('tanggal_awal');
        $tanggalakhir = $request->input('tanggal_akhir');
        $minsupport = $request->input('min_support');
        $minconfidence = $request->input('min_confidence');

        if($id)
        {
            $hasil = Hasil::find($id);

            if($hasil)
            {
                return ResponseFormatter::success(
                    $hasil,
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

        $hasil = Hasil::query();

        if($tanggalawal)
        {
            $hasil->where('tanggal_awal','like','%' . $tanggalawal . '%');
        }

        if($tanggalakhir)
        {
            $hasil->where('tanggal_akhir','like','%' . $tanggalakhir . '%');
        }

        if($minsupport)
        {
            $hasil->where('min_support','like','%' . $minsupport . '%');
        }

        if($minconfidence)
        {
            $hasil->where('min_confidence','like','%' . $minconfidence . '%');
        }
    }
}
