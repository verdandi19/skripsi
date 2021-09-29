<?php


namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaction::all();

        return view('Transaksi.index', [
            'data' => $data
        ]);
    }


    public function detail($id)
    {
        $data = Transaction::with(['cart.barang'])->findOrFail($id);
        return view('Transaksi.detail', [
            'item' => $data
        ]);
    }

    public function create()
    {
        $barang = Barang::all();
        return view('Transaksi.create')->with([
            'barang' => $barang
        ]);
    }

    public function store(Request $request)
    {

        try {
            $no_trans = $request->request->get('no_trans');
            $tanggal = $request->request->get('tanggal');

            DB::beginTransaction();

            $carts = Cart::where('transaction_id', null)->get();
            if (count($carts) <= 0) {
                return response()->json(['msg' => 'Tidak Ada Data Keranjang', 'code' => 202], 202);
            }
            $time = strtotime($tanggal);

            $newformat = date('Y-m-d', $time);
            $transaksi = new Transaction();
            $transaksi->no_transaksi = $no_trans;
            $transaksi->tgl_transaksi = $newformat;
            $transaksi->save();

            foreach ($carts as $cart) {
                $cart->transaction_id = $transaksi->id;
                $cart->save();
            }
            DB::commit();
            return response()->json(['msg' => 'Success', 'code' => 200], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msg' => 'Terjadi Kesalahan' . $e], 500);
        }

    }

    public function addCart(Request $request)
    {
        try {
            $cart = new Cart();
            $cart->barang_id = $request->request->get('barang');
            $cart->qty = $request->request->get('qty');
            $cart->transaction_id = null;
            $cart->save();
            return response()->json(['msg' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan ...' . $e], 500);
        }
    }

    public function deleteCart($id)
    {
        try {
            Cart::destroy($id);
            return response()->json(['msg' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan ...' . $e], 500);
        }
    }

    public function getCartNoTransaction()
    {
        try {
            $cart = Cart::with(['barang'])->where('transaction_id', null)->get();
            return response()->json(['msg' => 'Success', 'data' => $cart], 200);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Terjadi Kesalahan ...' . $e], 500);
        }
    }
}
