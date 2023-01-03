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

}
