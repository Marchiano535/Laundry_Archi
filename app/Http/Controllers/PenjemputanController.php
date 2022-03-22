<?php

namespace App\Http\Controllers;

use App\Imports\PenjemputanImport;
use App\Models\Member;
use App\Models\penjemputan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenjemputanExport;
use App\Http\Requests\UpdatePenjemputanRequest;

class penjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['member'] = Member::get();
        $data['penjemputan'] = penjemputan::all();
        return view('penjemputan.index')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $validated = $request->validate([
            'id_member' => 'required',
            'petugas' => 'required',
            'status' => 'required',
        ]);

        $input = penjemputan::create($validated);

        if ($input) return redirect('a/penjemputan')->with('succes', 'data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjemputanRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjemputanRequest $request, Penjemputan $penjemputan)
    {
        $validatedData = $request->validate([

            'id_member' => 'required',
            'petugas' => 'required',
            'status' => 'required'

        ]);

        Penjemputan::where('id', $penjemputan->id)
            ->update($validatedData);

            return redirect('a/penjemputan')->with('succes'.'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            Penjemputan::find($id)->delete();
    
          return redirect()->back()->with('success',' Deleted');
        }
    }
    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new PenjemputanExport, $date.'_Penjemputan.xlsx');
    }

    public function importData(Request $request)
    {
    
        $request->validate([
            'file2' => 'file|mimes:xlsx, xls, xlsm, xlsb'
        ]);

        if ($request) {
            Excel::import(new PenjemputanImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => "File Bukan Excel"
            ]);
        }

        return redirect()->back()->with('success', 'All good!');
    }
}