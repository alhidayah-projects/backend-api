<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        // only admin can create new rekening
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'anda bukan admin, tidak bisa membuat rekening'
            ], 403);
        }
        // if nomor rekening already exist
        if (Rekening::where('nomor_rekening', $request->nomor_rekening)->exists()) {
            return response([
                'message' => 'nomor rekening sudah ada'
            ], 409);
        }

        $rekening = Rekening::create([
            'nomor_rekening' => $request->nomor_rekening,
            'nama_bank' => $request->nama_bank,
            'atas_nama' => $request->atas_nama
        ]);

        return response()->json([
            'message' => 'rekening created successfully',
            'data' => $rekening
        ], 201);
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
        // only admin can create new rekening
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'anda bukan admin, tidak bisa update rekening'
            ], 403);
        }
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
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'anda bukan admin, tidak bisa delete'
            ], 403);
        }
        $rekening = Rekening::find($id);

        // if empty data
        if($rekening == null){
            return ['message' => 'Data tidak ditemukan'];
        }

        $rekening->delete();
        return ['message' => 'Data Rekening Berhasil Di Hapus'];
    }

    // destroy all rekening
    public function destroyAll(){
        $rekening = Rekening::all();
        // only admin can create new rekening
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'anda bukan admin, tidak bisa delete all rekening'
            ], 403);
        }
        // if empty data
        if($rekening->isEmpty()){
            return ['message' => 'Data Kosong'];
        }

        $rekening->each->delete();
        return ['message' => 'Data Rekening Berhasil Di Hapus'];
    }
}
