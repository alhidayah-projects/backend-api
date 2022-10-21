<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;
use Illuminate\Support\Facades\Auth;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'atas_nama' => 'required'
        ]);
  
        Rekening::create($request->all());
        return ['message' => 'Nomor Rekening Sukses Di Tambahkan'];
    }

    public function getRekeningData(){
        $rekening = Rekening::all();

        // if empty data
        if($rekening->isEmpty()){
            return ['message' => 'Data Kosong'];
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Rekening',
            'data' => $rekening
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rekening = Rekening::find($id);

        // if empty data
        if($rekening == null){
            return ['message' => 'Data tidak ditemukan'];
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Rekening',
            'data' => $rekening
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
    }
}
