<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $db = User::with('role')->get();
        $roles = DB::table("roles")->get();

        $title = 'Delete!';
        $text = "Apakah Anda yakin ingin menghapus?";
        confirmDelete($title, $text);

        return view('DataUser.data_user', compact('db', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = DB::table("roles")->get();
        return view('DataUser.data_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagename = null;

        if ($request->hasFile('foto')) {
            $imagename = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('/public/users', $imagename);
        }

        DB::table("users")->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role_id' => $request->role_id,
            'foto' => $imagename,
            'password' => bcrypt($request->password),

        ]);
        return redirect('/data_user')->with('success', 'User berhasil ditambahkan');
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
        $data = DB::table('users')->where('id', $id)->get();
        $roles = DB::table('roles')->get();
        return view('DataUser.edit_user', ['data' => $data, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'password' => 'nullable',
        ]);

        $imagename = null;

        if ($request->hasFile('foto')) {
            $imagename = time() . '.' . $request->foto->extension();
            $request->foto->storeAs('public/users', $imagename);
        }

        // Inisialisasi variabel untuk updateData
        $updateData = [
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role_id' => $request->role_id,
            'foto' => $imagename,
        ];

        // Cek apakah password diisi
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
        } else {
            // Jika tidak diisi, ambil password dari data yang ada
            $user = DB::table('users')->where('id', $id)->first();
            $updateData['password'] = $user->password;
        }

        // Update data user
        DB::table('users')->where('id', $id)->update($updateData);

        return redirect('/data_user')->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $db = DB::table("users")->where("id", $id)->first();
        DB::table("users")->where("id", $id)->delete();

        return back()->with('success', 'User ' . $db->nama . ' berhasil dihapus');
    }

    public function pdf()
    {
        $db = User::with('role')->get();
        $pdf = Pdf::loadview('DataUser.pdf_user', compact('db'));
        return $pdf->stream('Kasir_Husen.pdf');
    }
}
