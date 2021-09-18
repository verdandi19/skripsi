<?php


namespace App\Http\Controllers;


use App\Models\Barang;

class PerhitunganController extends Controller
{

    public function index()
    {
        $barang = Barang::all();
        $data = [];
        foreach ($barang as $v){
            array_push($data, $v->id);
        }

        $result = [];
        foreach ($data as $key => $v){
//            foreach ($data as $v2){
//                if($v === $v2){
//                    continue;
//                }
//                array_push($result, [$v, $v2]);
//            }
//            $v2 = $data[$key];
//            if($v === $v2){
//                array_push($result, [$v, $v2]);
//            }
            dump($data);
            array_shift($data);
        }
        die();
        return response()->json([
            'result' => $result,
            'data' => $data,
            'barang' => $barang
        ], 200);
    }
}
