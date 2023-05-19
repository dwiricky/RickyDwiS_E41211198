<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function index()
    {
        $boats = Boat::all();
        return view('pages.datatables', compact('boats'));
    }

    public function create()
    {
        // Kode untuk menampilkan form pembuatan perahu
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'linkgambar' => 'required',
            'harga' => 'required|numeric'
        ]);

        $boat = new Boat();
        $boat->nama = $validatedData['nama'];
        $boat->jenis = $validatedData['jenis'];
        $boat->linkgambar = $validatedData['linkgambar'];
        $boat->harga = $validatedData['harga'];

        $boat->save();
        return redirect()->route('boats.index')->with('success', 'Data unit berhasil ditambahkan!');
    }



    public function show(Boat $boat)
    {
        // Kode untuk menampilkan detail perahu tertentu
    }

    public function edit(Boat $boat)
    {
        return view('pages.editunit', compact('boat'));
    }

    public function update(Request $request, Boat $boat)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'linkgambar' => 'required',
            'harga' => 'required|numeric'
        ]);

        $boat->nama = $validatedData['nama'];
        $boat->jenis = $validatedData['jenis'];
        $boat->linkgambar = $validatedData['linkgambar'];
        $boat->harga = $validatedData['harga'];

        $boat->save();

        return redirect()->route('boats.index')->with('success', 'Data unit berhasil diperbarui!');
    }

    public function destroy(Boat $boat)
    {
        $boat->delete();

        return redirect()->route('boats.index')->with('success', 'Data unit berhasil dihapus!');
    }

}
