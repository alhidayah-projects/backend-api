<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengurus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengurusController extends Controller
{
    /**Created Pengurus */
    public function createdPengurus(Request $request){

            // only admin can create pengurus
            if (auth()->user()->role != 'admin') {
                return response()->json([
                    'message' => 'you are not admin, cannot create pengurus,'
                ], 403);
            }

        // validate request
        $request->validate([
            'nama_pengurus' => 'nullable|string',
            'nik' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'jk' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'no_telp' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

          // create pengurus
          $pengurus = pengurus::create([
            'nama_pengurus'  => $request->nama_pengurus,
            'nik'            => $request->nik,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'jk'             => $request->jk,
            'jabatan'        => $request->jabatan,
            'no_telp'        => $request->no_telp,
            'alamat'         => $request->alamat,
        ], 201);

          // return yayasan
          return response()->json([
            'message' => 'pengurus create successfully',
            'pengurus' => $pengurus,
        ], 201);
    }

        /**get pengurus by jabatan and nama */
        public function filterPengurus(Request $request)
        {
            $pengurus = pengurus::where('nama_pengurus', 'like', '%' . $request->nama_pengurus . '%')
                ->where('jabatan', 'like', '%' . $request->jabatan)
                ->paginate(10);
            // if not found
            if ($pengurus == null) {
                return response([
                    'message' => 'pengurus not found'
                ], 200);
            }
            return response()->json([
                'message' => 'pengurus retrieved successfully',
                'data' => $pengurus
            ], 200);
        }

        /**Get Pengurus by id */
    public function getPengurusbyId($id)
    {
        $pengurus = pengurus::find($id);

        // if empty data
        if($pengurus == null){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data pengurus',
            'data' => $pengurus
        ], 200);
    }

    /**Update Pengurus */
    public function updatePengurus(Request $request, $id)
    {
        // only admin can create new pengurus
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, cannot update pengurus'
            ], 403);
        }
        $pengurus = pengurus::find($id);

        // if empty data
        if($pengurus == null){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }

        $request->validate([
            'nama_pengurus' => 'nullable|string',
            'nik' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'jk' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'no_telp' => 'nullable|string',
            'alamat' => 'nullable|string',
        ]);

        $pengurus->update($request->all());
        return response ([
            'message' => 'Data pengurus Successfully Updated',
            'data' => $pengurus
        ], 200);
    }

    /**Delete All Pengurus */
    public function deleteAllPengurus(){

        $pengurus = pengurus::all();
        // only admin can create new pengurus
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, cannot delete pengurus'
            ], 403);
        }
        // if empty data
        if($pengurus->isEmpty()){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }

        $pengurus->each->delete();
        return response ([
            'message' => 'Data pengurus Successfully Deleted',
            'data' => $pengurus
        ], 200);
    }

    /**Delete Pengurus by Id */
    public function deletePengurusbyId($id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, cannot delete pengurus'
            ], 403);
        }
        $pengurus = pengurus::find($id);

        // if empty data
        if($pengurus == null){
            return response ([
                'message' => 'Data not found'
            ], 200);
        }

        $pengurus->delete();
        return response ([
            'message' => 'Data pengurus Successfully Deleted',
            'data' => $pengurus
        ], 200);
    }

}
