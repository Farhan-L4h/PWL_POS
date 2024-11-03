<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockModel;
use Yajra\DataTables\DataTables;

class StockController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list' => ['home', 'stock']
        ];

        $page = (object) [
            'title' => 'Daftar Stock yang terdaftar dalam sistem'
        ];

        $activeMenu = 'stock';
        return view('stock.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Stock',
            'list' => ['home', 'stock', 'tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Stock baru'
        ];

        $activeMenu = 'stock';
        return view('stock.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'stock_kode' => 'required|string|min:3',
            'stock_nama' => 'required|string|max:100',
            'stock_jumlah' => 'required|integer',
        ]);

        StockModel::create([
            'stock_kode' => $request->stock_kode,
            'stock_nama' => $request->stock_nama,
            'stock_jumlah' => $request->stock_jumlah,
        ]);

        return redirect('/stock')->with('success', 'Data Stock Berhasil di Simpan');
    }

    // Ambil data stock dalam bentuk JSON untuk DataTables
    public function list(Request $request)
    {
        $stocks = StockModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah')->with('user', 'barang');

        return DataTables::of($stocks)
            ->addIndexColumn() // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($stock) { // Menambahkan kolom aksi
                $btn = '<a href="' . url('/stok/' . $stock->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stock->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stock/' . $stock->stock_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';

                return $btn;
            })
            ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }
}
