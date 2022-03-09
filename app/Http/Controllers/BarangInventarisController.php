<?php

namespace App\Http\Controllers;

use App\Models\Barang_inventaris;
use App\Http\Requests\StoreBarang_inventarisRequest;
use App\Http\Requests\UpdateBarang_inventarisRequest;

class BarangInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['barang'] = Barang_inventaris::all(); 
        return view('barang/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarang_inventarisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBarang_inventarisRequest $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required'
        ]);

        $input = Barang_inventaris::create($validated);

        if ($input->save()) {
             return redirect('barang')->with('success', 'data berhasil di input');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_inventaris $barang_inventaris)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_inventaris $barang_inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarang_inventarisRequest  $request
     * @param  \App\Models\Barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarang_inventarisRequest $request, Barang_inventaris $barang)
    {
        $validatedData = $request->validate([

            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required'

        ]);

        Barang_inventaris::where('id', $barang->id)
            ->update($validatedData);

            return redirect('barang')->with('succes'.'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang_inventaris::find($id)->delete();

        return redirect('barang')->with('success','Cabang Deleted');
    }
}
