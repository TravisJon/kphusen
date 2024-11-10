<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Satuan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Buat kode produk otomatis untuk form
        $lastProduct = DB::table('produk')->orderBy('id', 'desc')->first();
        $newCode = 'KP001';
        if ($lastProduct) {
            $lastCode = intval(substr($lastProduct->kode_produk, 2));
            $newCode = 'KP' . str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT);
        }

        $db = Produk::with(['kategori', 'satuan'])->get();

        $kategori = Kategori::all();
        $satuan = Satuan::all();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataMaster.produk', compact('newCode', 'kategori', 'satuan', 'db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.produk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil kode produk terakhir dari tabel produk
        $lastProduct = DB::table('produk')->orderBy('id', 'desc')->first();

        // Buat kode produk baru berdasarkan data terakhir
        $newCode = 'KP001'; // Default untuk produk pertama
        if ($lastProduct) {
            $lastCode = intval(substr($lastProduct->kode_produk, 2)); // Ambil nomor akhir kode produk
            $newCode = 'KP' . str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT); // Format KP001, KP002, dst.
        }

        DB::table("produk")->insert([
            'kode_produk' => $newCode,
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'satuan_id' => $request->satuan_id,
        ]);
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DB::table('produk')->where('id', $id)->get();
        $kategori = DB::table('kategori')->get();
        $satuan = DB::table('satuan')->get();
        return view('DataMaster.edit_produk', ['data' => $data, 'kategori' => $kategori, 'satuan' => $satuan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('produk')->where('id', $request->id)->update([
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'satuan_id' => $request->satuan_id,
        ]);
        return redirect('/produk')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = DB::table("produk")->where("id", $id)->first();
        DB::table("produk")->where("id", $id)->delete();

        return back()->with('success', 'Produk ' . $db->nama_produk . ' berhasil dihapus');
    }

    public function pdf()
    {
        $db = Produk::with('kategori', 'satuan')->get();
        $pdf = Pdf::loadview('DataMaster.pdf_produk', compact('db'));
        return $pdf->stream('Kasir_Husen.pdf');
    }
}
