<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HasilItemset1Controller extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $namaitem = $request->input('namaItem');
        $hasil = $request->input('hasil');
        

        if($id)
        {
            $hasilitemset1 = hasil_itemset1::find($id);

            if($hasilitemset1)
            {
                return ResponseFormatter::success(
                    $hasilitemset1,
                    'Data Hasil Itemset Berhasil DIambil',
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

        $hasilitemset1 = hasil_itemset1::query();

        if($namaitem)
        {
            $hasilitemset1->where('namaItem','like','%' . $namaitem . '%');
        }

        if($hasil)
        {
            $hasilitemset1->where('hasil','like','%' . $hasil . '%');
        }

        return ResponeFormatter::success(
            $hasilitemset1->paginate($limit),
            'Hasil Itemset Berhasil Diambil'
        );
    }
}
