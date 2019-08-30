<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modeltb_penjualan;
use validator;

class tb_penjualan extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = modeltb_penjualan::all();
        //return view('kontakk', compact('data'));
        return view('tb_penjualan', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tb_penjualan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'kd_barang' => 'required',
            'jml' => 'required',
            'total_harga' => 'required', 
        ]);

        $data = new modeltb_penjualan();
        $data->kd_barang = $request->kd_barang;
        $data->jml = $request->jml;
        $data->total_harga = $request->total_harga;
        $data->save();

        return redirect()->route('tb_penjualan.index')->with('alert_message','berhasil menambah data');
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
        $data = modeltb_penjualan::where('id', $id)->get();
        return view('tb_penjualan_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'kd_barang' => 'required',
            'jml' => 'required',
            'total_harga' => 'required',
        ]);

        $data = modeltb_penjualan::where('id',$id)->first();
  
        $data->kd_barang = $request->kd_barang;
        $data->jml = $request->jml;
        $data->total_harga = $request->total_harga;
        $data->save();

        return redirect()->route('tb_penjualan.index')->with('alert_message','berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = modeltb_penjualan::where('id', $id)->first();
        $data->delete();

        return redirect()->route('tb_penjualan.index')->with('alert_message', "Berhasil Menghapus data1");
    }
}
