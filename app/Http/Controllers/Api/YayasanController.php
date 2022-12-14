<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yayasan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;


class YayasanController extends Controller
{
    /**create a new yayasan*/
    public function create(Request $request)
    {
        // only admin can create yayasan
        if (auth()->user()->role != 'admin') {
            return response()->json([
                'message' => 'you are not admin, cannot create yayasan,'
            ], 403);
        }

        // validate request
        $request->validate([
            'nama_yayasan' => 'nullable|string',
            'akte_notaris' => 'nullable|string',
            'kemenkumham' => 'nullable|string',
            'npwp' => 'nullable|string',
            'sk_kota' => 'nullable|string',
            'sk_provinsi' => 'nullable|string',
            'profil_yayasan' => 'nullable|string',
            'moto' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string',
            'email' => 'nullable|string',
            'instagram' => 'nullable|string',
        ]);

        // create yayasan
        $yayasan = Yayasan::create([
            'nama_yayasan' => $request->nama_yayasan,
            'akte_notaris' => $request->akte_notaris,
            'kemenkumham' => $request->kemenkumham,
            'npwp' => $request->npwp,
            'sk_kota' => $request->sk_kota,
            'sk_provinsi' => $request->sk_provinsi,
            'profil_yayasan' => $request->profil_yayasan,
            'moto' => $request->moto,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'instagram' => $request->instagram,
        ], 201);

        // return yayasan
        return response()->json([
            'message' => 'yayasan create successfully',
            'yayasan' => $yayasan,
        ], 201);
    }

    /**Get Yayasan */
    public function getYayasan(){

        $yayasan = Yayasan::all();

        if (count($yayasan) == 0) {
            return response()->json([
                'message' => 'data yayasan not found',
                'data' => $yayasan
            ],200);
        }

        return response()->json([
            'message' => 'data yayasan has been found successfully',
            'data' => $yayasan
        ], 200);
    }

    /**Update Yayasan */
    public function updateYayasan(Request $request, $id)
    {
        $yayasan = Yayasan::find($id);

        // if data yayasan not found
        if ($yayasan==null) {
            return response()->json([
                'message' => 'data yayasan not found'
            ], 200);
        }

        $validator = Validator::make($request->all(), [
            'nama_yayasan' => 'required|string',
            'akte_notaris' => 'required|string',
            'kemenkumham' => 'required|string',
            'npwp' => 'required|string',
            'sk_kota' => 'required|string',
            'sk_provinsi' => 'required|string',
            'profil_yayasan' => 'required|string',
            'moto' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|string',
            'instagram' => 'required|string',
        ]);

        // check if validator fails
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $yayasan->update([
            'nama_yayasan' => $request->nama_yayasan,
            'akte_notaris' => $request->akte_notaris,
            'kemenkumham' => $request->kemenkumham,
            'npwp' => $request->npwp,
            'sk_kota' => $request->sk_kota,
            'sk_provinsi' => $request->sk_provinsi,
            'profil_yayasan' => $request->profil_yayasan,
            'moto' => $request->moto,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'instagram' => $request->instagram,
        ]);

        return response()->json([
            'message' => 'data yayasan has been updated successfully',
            'data' => $yayasan
        ], 200);
    }

    /**Delete Yayasan */
    public function deleteYayasan()
    {
        // user admin and pengurus only
        if (Auth::user()->role != 'admin' && Auth::user()->role != 'pengurus') {
            return response()->json([
                'message' => 'you are not authorized to delete data Yayasan'
            ], 403);
        }

        $yayasan = Yayasan::all();

        // if data yayasan not found
        if (count($yayasan) == 0) {
            return response()->json([
                'message' => 'data yayasan not found'
            ], 200);
        }

        Yayasan::truncate();

        return response()->json([
            'message' => 'success delete all data Yayasan',
            'data' => $yayasan
        ], 200);
    }
}
