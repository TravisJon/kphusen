<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = DB::table('satuan')->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('SatuanProduk.satuan', compact('db'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('SatuanProduk.satuan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table("satuan")->insert([
            'nama_satuan' => $request->nama_satuan,
        ]);
        return redirect('/satuan')->with('success', 'Satuan Produk berhasil ditambahkan');
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
        $data = DB::table('satuan')->where('id', $id)->get();
        return view('SatuanProduk.edit_satuan', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('satuan')->where('id', $request->id)->update([
            'nama_satuan' => $request->nama_satuan,
        ]);
        return redirect('/satuan')->with('success', 'Satuan Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = DB::table("satuan")->where("id", $id)->first();
        DB::table("satuan")->where("id", $id)->delete();

        return back()->with('success', 'Satuan Produk ' . $db->nama_satuan . ' berhasil dihapus');
    }

    public function pdf()
    {
        $db = DB::table('satuan')->get();
        $pdf = Pdf::loadview('SatuanProduk.pdf_satuan', compact('db'));
        return $pdf->stream('kasir_Husen.pdf');
    }
}
