<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Itemset1Controller extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $atribut = $request->input('atribut');
        $jumlahitem = $request->input('jumlahItem');
        $jumlahtransaksi = $request->input('jumlahTransaksi');
        $persen = $request->input('persen');
        $status = $request->input('status');
        $minsupport = $request->input('minSupport');


        if($id)
        {
            $itemset1 = itemset1::find($id);

            if($itemset1)
            {
                return ResponseFormatter::success(
                    $itemset1,
                    'Data Itemset 1 Berhasil Diambil',
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

        $itemset1 = itemset1::query();

        if($atribut)
        {
            $itemset1->where('atribut','like','%' . $atribut . '%');
        }

        if($jumlahitem)
        {
            $itemset1->where('jumlahItem','like','%' . $jumlahitem . '%');
        }

        if($jumlahtransaksi)
        {
            $itemset1->where('jumlahTransaksi','like','%' . $jumlahtransaksi . '%');
        }

        if($persen)
        {
            $itemset1->where('persen','like','%' . $persen . '%');
        }

        if($status)
        {
            $itemset1->where('status','like','%' . $status . '%');
        }

        if($minsupport)
        {
            $itemset1->where('minSupport','like','%' . $minsupport . '%');
        }

        return ResponseFormatter::success(
            $itemset1->paginate($limit),
            'Itemset 1 List Berhasil Diambil'
        );

    }
}
