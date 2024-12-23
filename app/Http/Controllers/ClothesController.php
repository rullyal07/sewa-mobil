<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothes;
use Illuminate\Support\Facades\DB;
class ClothesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clothes.index', [
        'title' => 'Admin',
        'menu' => 'Clothes',
        'datas' => Clothes::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clothes.create', [
        'title' => 'Admin',
        'menu' => 'Clothes',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$jenis = DB::table('pakaians')
        //->where('jenis', '=', $request->jenis)
        //->value('jenis');

        // if($jenis){
        //     return view('clothes.index', [
        //         'title' => 'Admin',
        //         'menu' => 'Clothes',
        //         'pesan' => 'Type',
        //         . $request->jenis .
        //         'Data sudah ada',
        //         'jenis' => $request->jenis,
        //         'model' => $request->model,
        //         'warna' => $request->warna,
        //         'ukuran' => $request->ukuran,
        //         'bahan' => $request->bahan,
        //         'deskripsi' => $request->deskripsi,
        //         'stok' => $request->stok,
        //         'harga_sewa' => $request->harga_sewa
        //   ]);
        //}

        $data = $request->only([
            'jenis', 'model', 'warna', 'ukuran', 'bahan', 'Deskripsi', 'stok', 'harga_sewa'
        ]);

        if($request->file('foto1') !== null){
            $data['foto1'] = $request->file('foto1')->store('Pakaian');
        }
        if($request->file('foto2') !== null){
            $data['foto2'] = $request->file('foto2')->store('Pakaian');
        }
        if($request->file('foto3') !== null){
            $data['foto3'] = $request->file('foto3')->store('Pakaian');
        }

        $simpan = Clothes::create($data);
        if($simpan){
            return view('clothes.index', [
            'title' => 'Admin',
            'menu' => 'Clothes',
            'datas' => Clothes::all(),
            // 'status' => 'simpan',
            'pesan' => 'Clothes'
            . $request->jenis .
            'Data sudah disimpan'
            ]);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Clothes::find($id)->delete();
        return redirect()->route('clothes.index')->with('pesan', 'Produk berhasil dihapus');
    }
}
