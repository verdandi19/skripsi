<?php


namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Transaction;

class PerhitunganController extends Controller
{

    public function index()
    {
        $barang = Barang::all();
        $data = [];
        foreach ($barang as $v) {
            array_push($data, $v->id);
        }

        $result = [];
        foreach ($data as $key => $v) {
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

    public function mapping()
    {
        try {
            $transaction = Transaction::with(['cart'])->get();
            $item = Barang::all();

            $data = [];
            $count_transaction = count($transaction);
            foreach ($transaction as $key => $value) {
                $itemExists = null;
                $tmpRes = [];
                $tmpRes['transaction'] = ($key + 1);
                foreach ($item as $i) {
                    $foundKey = array_search($i->id, array_column($value->cart->toArray(), 'barang_id'));
                    $isAvailable = false;
                    if (false !== $foundKey) {
                        $isAvailable = true;
                    }
                    $tmpRes[$i->code] = $isAvailable;
                }
                array_push($data, $tmpRes);
            }

            $code_summary = null;
            $support_1 = null;
            foreach ($item as $i) {
                $code = $i->code;
                $count = 0;
                foreach ($data as $v) {
                    if (array_key_exists($code, $v)) {
                        if ($v[$code]) {
                            $count += 1;
                        }
                    }
                }
                $code_summary[$code] = $count;

                $support_result = round(($count * 100) / $count_transaction, 2, PHP_ROUND_HALF_UP);
                $support_1[$code] = $support_result;
            }

            $result = [
                'data' => $data,
                'summary' => $code_summary,
                'support_1' => $support_1
            ];
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }
}
