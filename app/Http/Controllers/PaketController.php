<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use App\Models\Outlet;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaketExport;
use App\Imports\PaketImport;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paket'] = Paket::all();
        $data['outlet'] = Outlet::all(); 
        return view('paket/index', $data);

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
     * @param  \App\Http\Requests\StorePaketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaketRequest $request)
    {
        $validated = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ]);

        $input = Paket::create($validated);

        if ($input->save()) {
             return redirect('paket')->with('success', 'data berhasil di input');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaketRequest  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        $validatedData = $request->validate([

            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',

        ]);

        Paket::where('id', $paket->id)
            ->update($validatedData);

            return redirect('paket')->with('succes'.'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            Paket::find($id)->delete();
    
          return redirect()->back()->with('success','Cabang Deleted');
        }
    }
    
    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new PaketExport, $date.'_paket.xlsx');
    }

    public function importData(){
        Excel::import(new PaketImport, request()->file('import'));

        return redirect('/paket')->with('success', 'Import data paket berhasil!');
    }
}

