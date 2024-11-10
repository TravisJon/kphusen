<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = DB::table('kategori')->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('KategoriProduk.kategori', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('KategoriProduk.kategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table("kategori")->insert([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('/kategori')->with('success', 'Kategori Produk berhasil ditambahkan');
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
        $data = DB::table('kategori')->where('id', $id)->get();
        return view('KategoriProduk.edit_kategori', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('kategori')->where('id', $request->id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('/kategori')->with('success', 'Kategori Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = DB::table("kategori")->where("id", $id)->first();
        DB::table("kategori")->where("id", $id)->delete();

        return back()->with('success', 'Kategori Produk ' . $db->nama_kategori . ' berhasil dihapus');
    }

    public function pdf()
    {
        $db = DB::table('kategori')->get();
        $pdf = pdf::loadview('KategoriProduk.pdf_kategori', compact('db'));
        return $pdf->stream('kasir_Husen.pdf');
    }
}
