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

//        $result = [];
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

            $idItems = [];
            foreach ($item as $i) {
                array_push($idItems, $i->code);
            }

            $combination_chance = $this->allSubsets($idItems, 3);
            $result = [
                'data' => $data,
                'summary' => $code_summary,
                'support_1' => $support_1,
                'combination_chance' => $combination_chance,
            ];
            return response()->json($result, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }

    public function allItem()
    {
        $items = Barang::all();
        $results = [];
        foreach ($items as $item) {
            array_push($results, $item->id);
        }
        return response()->json(['data' => $results], 200);
    }

    private function recursive($elements = [])
    {
        if (count($elements) === 0) {
            return [[]];
        }
        $firstEl = $elements[0];

        $rest = array_slice($elements, 1);
        dump($rest);
        $combsWithoutFirst = $this->recursive($rest);
        dump($combsWithoutFirst);
        die();
        $combsWithFirst = [];
        foreach ($combsWithoutFirst as $item) {
            $temp = array_push($item, $firstEl);
            array_push($combsWithFirst, $temp);
        }
        return [$combsWithoutFirst, $combsWithFirst];
    }

    function combinations(array $myArray, $choose) {
        global $result, $combination;
        dd($result);
        $n = count($myArray);
        function inner ($start, $choose_, $arr, $n) {
            global $result, $combination;

            if ($choose_ == 0) array_push($result,$combination);
            else for ($i = $start; $i <= $n - $choose_; ++$i) {
                array_push($combination, $arr[$i]);
                inner($i + 1, $choose_ - 1, $arr, $n);
                array_pop($combination);
            }

        }
        inner(0, $choose, $myArray, $n);
        return $result;
    }


    function allSubsets($set, $size) {
        $subsets = [];
        if ($size == 1) {
            return array_map(function ($v) { return [$v]; },$set);
        }
        foreach ($this->allSubsets($set,$size-1) as $subset) {
            foreach ($set as $element) {
                if (!in_array($element,$subset)) {
                    $newSet = array_merge($subset,[$element]);
                    sort($newSet);
                    if (!in_array($newSet,$subsets)) {
                        $subsets[] = array_merge($subset,[$element]);
                    }
                }
            }
        }
        return $subsets;

    }
    public function testToMap()
    {
        $items = Barang::all();
        $results = [];
        foreach ($items as $item) {
            array_push($results, $item->id);
        }
        $arr = $this->allSubsets($results, 3);
        return $arr;
    }
}
