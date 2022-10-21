<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;
use Illuminate\Support\Facades\Auth;

class RekeningController extends Controller
{

    // Create new rekening
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

    // Get all rekening
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

    // Get rekening by id
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

    // Update rekening by id
    public function update(Request $request, $id)
    {
        $rekening = Rekening::find($id);

        // if empty data
        if($rekening == null){
            return ['message' => 'Data tidak ditemukan'];
        }

        $request->validate([
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'atas_nama' => 'required'
        ]);

        $rekening->update($request->all());
        return ['message' => 'Data Rekening Berhasil Di Update'];
    }

    //delete rekening by id
    public function destroy($id)
    {
        $rekening = Rekening::find($id);

        // if empty data
        if($rekening == null){
            return ['message' => 'Data tidak ditemukan'];
        }

        $rekening->delete();
        return ['message' => 'Data Rekening Berhasil Di Hapus'];
    }
}
