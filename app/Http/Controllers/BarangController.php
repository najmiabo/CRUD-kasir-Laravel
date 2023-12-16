<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function home()
    {
        $data = array(
            'title' => 'Data Barang',
            'data_jenis' => JenisBarang::all(),
            'data_barang' => Barang::join('tbl_jenis_barang', 'tbl_jenis_barang.id', '=', 'tbl_barang.id_jenis')
                ->select('tbl_barang.*', 'tbl_jenis_barang.nama_jenis')->get()
        );
        return view('admin.master.barang.list', $data);
    }

    public function store(Request $request)
    {
        echo $request;
        Barang::create([
            'nama_barang' => $request->nama_barang,
            'id_jenis' => $request->id_jenis,
            'harga' => $request->harga,
            'stock' => $request->stock,
        ]);
        return redirect('/barang')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        Barang::where('id', $id)
            ->where('id', $id)
            ->update([
                'id_jenis' => $request->id_jenis,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'stock' => $request->stock,
            ]);
        return redirect('/barang')->with('success', 'Berhasil update Data');
    }

    public function delete($id)
    {
        Barang::where('id', $id)->delete();
        return redirect('/barang')->with('success', 'Data berhasil dihapus');
    }
}
