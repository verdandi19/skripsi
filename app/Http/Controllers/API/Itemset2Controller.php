<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Itemset2Controller extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $kombinasiitem = $request->input('kombinasiItem');
        $jumlahitem = $request->input('jumlahItem');
        $jumlahtransaksi = $request->input('jumlahTransaksi');
        $persen = $request->input('persen');
        $hasil = $request->input('hasil');
        $minsupport = $request->input('minSupport');

        if($id)
        {
            $itemset2 = itemset2::find($id);

            if($itemset2)
            {
                return ResponseFormatter::success(
                    $itemset2,
                    'Data Itemset 2 Berhasil Diambil',
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

        $itemset2 = itemset1::query();

        if($kombinasiitem)
        {
            $itemset2->where('kombinasiItem','like','%' . $kombinasiitem . '%');
        }

        if($jumlahitem)
        {
            $itemset2->where('jumlahItem','like','%' . $jumlahitem . '%');
        }

        if($jumlahtransaksi)
        {
            $itemset2->where('jumlahTransaksi','like','%' . $jumlahtransaksi . '%');
        }

        if($persen)
        {
            $itemset2->where('persen','like','%' . $persen . '%');
        }

        if($status)
        {
            $itemset2->where('status','like','%' . $status . '%');
        }

        if($minsupport)
        {
            $itemset2->where('minSupport','like','%' . $minsupport . '%');
        }

        return ResponseFormatter::success(
            $itemset2->paginate($limit),
            'Itemset 2 List Berhasil Diambil'
        );

    }
}
