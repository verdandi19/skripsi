<?php


namespace App\Http\Controllers;


use App\Models\Barang;
use App\Models\Data;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function index()
    {
        $data = Barang::all();

        return view('Barang.index',[
            'data' => $data
        ]);
    }

    public function create()
    {
        return view ('Barang.create');
    }

    public function store(Request $request)
    {
        $nama = $request->request->get('nama');
        $code = $request->request->get('code');

        $barang = new Barang();
        $barang->nama = $nama;
        $barang->code = $code;
        $barang->qty = 0;
        $barang->save();

        return redirect('/dashboard/barang');
    }

    public function edit($id) {
        $data = Barang::findOrFail($id);
        return view('Barang.edit',[
            'item'=> $data
        ]);
    }

    public function patch(Request $request)
    {
        $nama = $request->request->get('nama');
        $code = $request->request->get('code');
        $id = $request->request->get('id');

        $barang = Barang::find($id);
        $barang->nama = $nama;
        $barang->code = $code;
        $barang->save();
        return redirect('/dashboard/barang');
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect('/dashboard/barang');
    }
}
