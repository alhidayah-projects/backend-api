<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekening;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RekeningController extends Controller
{

    /**Create new rekening */
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
                'message' => 'you are not admin, cannot create rekening'
            ], 403);
        }
        // if nomor rekening already exist
        if (Rekening::where('nomor_rekening', $request->nomor_rekening)->exists()) {
            return response([
                'message' => 'nomor rekening already exist'
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


    // /**Get all rekening */
    // public function getRekeningData(){
    //     $rekening = Rekening::all();
    //     $rekening = Rekening::paginate(10);

    //     // if empty data
    //     if($rekening->isEmpty()){
    //         return response ([
    //             'message' => 'Data not found'
    //         ], 200);
    //     }
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Rekening',
    //         'data' => $rekening
    //     ], 200);
    // }

    /**Get rekening by id */
    public function show($id)
    {
        $rekening = Rekening::find($id);

        // if empty data
        if($rekening == null){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Rekening',
            'data' => $rekening
        ], 200);
    }

    /**Update rekening by id */
    public function update(Request $request, $id)
    {
        // only admin can create new rekening
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, cannot update rekening'
            ], 403);
        }
        $rekening = Rekening::find($id);

        // if empty data
        if($rekening == null){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }

        $request->validate([
            'nomor_rekening' => 'required',
            'nama_bank' => 'required',
            'atas_nama' => 'required'
        ]);

        $rekening->update($request->all());
        return response ([
            'message' => 'Data Rekening Successfully Updated',
            'data' => $rekening
        ], 200);
    }

    /**delete rekening by id */
    public function destroy($id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, cannot delete rekening'
            ], 403);
        }
        $rekening = Rekening::find($id);

        // if empty data
        if($rekening == null){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }

        $rekening->delete();
        return response ([
            'message' => 'Data Rekening Successfully Deleted',
            'data' => $rekening
        ], 200);
    }

    /**destroy all rekening */
    public function destroyAll(){
        $rekening = Rekening::all();
        // only admin can create new rekening
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, cannot delete rekening'
            ], 403);
        }
        // if empty data
        if($rekening->isEmpty()){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }

        $rekening->each->delete();
        return response ([
            'message' => 'Data Rekening Successfully Deleted',
            'data' => $rekening
        ], 200);
    }

    /**search rekening by nama bank */
    public function filterRekening(Request $request)
    {
        $rekening = Rekening::where('nama_bank', 'like', '%' . $request->nama_bank . '%')
            ->paginate(10);
        // if not found
        if ($rekening == null) {
            return response([
                'message' => 'rekening not found'
            ], 200);
        }
        return response()->json([
            'message' => 'rekening retrieved successfully',
            'data' => $rekening
        ], 200);
    }

}
