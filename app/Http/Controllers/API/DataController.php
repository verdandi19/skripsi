<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $tanggal = $request->date('tanggal');
        $nama_produk = $request->input('nama_produk');
        $expired = $request->input('expired');
        $harga = $request->input('harga');
        $qty = $request->input('qty');


        if($id)
        {
            $data = Data::find($id);

            if($data)
            {
                return ResponseFormatter::success(
                    $data,
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

        $data = Data::query();

        if($tanggal)
        {
            $data->where('tanggal','like','%' . $tanggal . '%');
        }
        
        if($name)
        {
            $data->where('name','like','%' . $name . '%');
        }

        if($expired)
        {
            $data->where('expired','like','%' . $expired . '%');
        }

        if($harga)
        {
            $data->where('harga','like','%' . $expired . '%');
        }

        if($qty)
        {
            $data->where('qty','like','%' . $qty . '%');
        }

        return ResponseFormatter::success(
            $data->paginate($limit),
            'Data List Berhasil Diambil'
        );
    }
}

