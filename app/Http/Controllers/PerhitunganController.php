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

    private function nextItems($data = [])
    {
        return array_pop($data);
    }

    private function getItemExist($data = [])
    {
        $trans = Transaction::with(['cart']);
        foreach ($data as $i) {
            $trans->whereHas('cart', function ($query) use ($i) {
                $query->where('barang_id', $i);
            });
        }
        $data = $trans->get();
        return $data->toArray();
    }

    public function mapping2()
    {
        try {
            $barang = Barang::all();
            $transaction = Transaction::all();
            $countTransaction = count($transaction);
            $maxLoop = count($barang);
            $isEscape = true;
            $minSupport = 30;
            $itemAvailable = [];
            foreach ($barang as $value) {
                array_push($itemAvailable, $value->id);
            }

            $results = [];
            for ($i = 0; $i < $maxLoop; $i++) {
                $itemSetIndex = $i + 1;
                $item_combination = $this->allSubsets($itemAvailable, $itemSetIndex);
                $itemSetResults = [];
                $nextItem = [];
                foreach ($item_combination as $item_set) {
                    $tmpResults = [];

                    $item_title = '';
                    $tmpItemSet = Barang::find($item_set);
                    foreach ($tmpItemSet as $item) {
                        $item_title .= $item->nama . ', ';
                    }
                    $tmpResults['title'] = $item_title;
                    $tmpCount = count($this->getItemExist($item_set));
                    $tmpResults['count'] = $tmpCount;
                    $support = round(($tmpCount * 100) / $countTransaction, 1, PHP_ROUND_HALF_UP);
                    if($support >= $minSupport) {
                        foreach ($item_set as $single_item) {
                            if(!in_array($single_item, $nextItem)) {
                                array_push($nextItem, $single_item);
                            }
                        }
                    }
                    $tmpResults['support'] = $support;
                    array_push($itemSetResults, $tmpResults);
                }
                array_push($results, $itemSetResults);
                if(count($nextItem) < ($itemSetIndex + 1)) {
                    $isEscape = false;
                }

                $itemAvailable = $nextItem;
                if (!$isEscape) {
                    break;
                }
            }
            return response()->json([
                'data' => $results,
                'transaction' => $countTransaction
            ], 200);
        }catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage()
            ], 500);
        }


    }

    public function mapping()
    {
        try {
            $transaction = Transaction::with(['cart'])->get();
            $item = Barang::all();
//            $items = [1, 2, 4];
//            $trans = Transaction::with(['cart']);
//
//            foreach ($items as $i) {
//                $trans->whereHas('cart', function ($query) use ($i) {
//                    $query->where('barang_id', $i);
//                });
//            }
//            $res = $trans->get();
            $startingItem = [1, 2, 3, 4];
            $after = array_pop($startingItem);
            dd($after);
//            foreach ($item as $key => $i) {
//                $nextItems = $this->nextItems($startingItem);
//                dump($nextItems);
////                if($key > count($nextItems)){
////                    break;
////                }
////                $startingItem = $nextItems;
////                dump($startingItem);
//            }
            die();
            return $res->toArray();
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
                array_push($idItems, $i->id);
            }
            $combination_chance = [];
            $anu = 0;
            foreach ($idItems as $key => $v) {
                if ($key === 2) {
                    break;
                }
                $anu = $key;
                $tmpChance = $this->allSubsets($idItems, ($key + 1));
                array_push($combination_chance, $tmpChance);
                $support = [];
                foreach ($tmpChance as $tmp) {
                    $array_item = Barang::find($tmp);
                    $qty = 0;
                    foreach ($array_item as $ai) {
                        $code = $ai->code;
                        $qty += $code_summary[$code];
                    }
                    $tmpSupport = round(($qty * 100) / $count_transaction, 2, PHP_ROUND_HALF_UP);
//                    $tmpSupport = round($qty, 2, PHP_ROUND_HALF_UP);
                    array_push($support, $tmpSupport);
                }
//                dump($support);
            }
//            die();

            $item_set = [];
            foreach ($combination_chance as $combination) {
                foreach ($combination as $c) {
                    $array_item = Barang::find($c);
                    $combination_name = '';
                    $qty_summary = 0;
                    foreach ($array_item as $key => $ai) {
                        $code = $ai->code;
                        $qty = $code_summary[$code];
                        $qty_summary += $qty;
                        $combination_name .= $ai->nama . '(' . $qty . '),';
                    }

                    array_push($item_set, $combination_name);
                }
            }
            $result = [
//                'data' => $data,
                'summary' => $code_summary,
//                'support_1' => $support_1,
                'combination_chance' => $combination_chance,
                'count' => count($combination_chance),
                'item' => $item_set,
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

    function combinations(array $myArray, $choose)
    {
        global $result, $combination;
        dd($result);
        $n = count($myArray);
        function inner($start, $choose_, $arr, $n)
        {
            global $result, $combination;

            if ($choose_ == 0) array_push($result, $combination);
            else for ($i = $start; $i <= $n - $choose_; ++$i) {
                array_push($combination, $arr[$i]);
                inner($i + 1, $choose_ - 1, $arr, $n);
                array_pop($combination);
            }

        }

        inner(0, $choose, $myArray, $n);
        return $result;
    }


    function allSubsets($set, $size)
    {
        $subsets = [];
        if ($size == 1) {
            return array_map(function ($v) {
                return [$v];
            }, $set);
        }
        foreach ($this->allSubsets($set, $size - 1) as $subset) {
            foreach ($set as $element) {
                if (!in_array($element, $subset)) {
                    $newSet = array_merge($subset, [$element]);
                    sort($newSet);
                    if (!in_array($newSet, $subsets)) {
                        $subsets[] = array_merge($subset, [$element]);
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
