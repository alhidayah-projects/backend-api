<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Anak;

class AnakController extends Controller
{
    // create data anak
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_anak' => 'required|string|max:255',
            'nik' => 'required|string|max:17|unique:anak',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'nama_ibu' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'status' => 'required'
        ]); 

        // check if validator fails
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $anak = Anak::create([
            'nama_anak' => $request->nama_anak,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'status' => $request->status
        ]);

        return response()->json([
            'data' => $anak,
            'message' => 'data anak berhasil ditambahkan'
        ]);

    }

    // get all data anak
    public function getAllAnak()
    {
        $anak = Anak::all();

        // if data anak not found
        if (count($anak) == 0) {
            return response()->json([
                'message' => 'data anak tidak ditemukan'
            ]);
        }

        return response()->json([
            'data' => $anak,
            'message' => 'data anak berhasil ditemukan'
        ]);
    }

    // get data anak by id
    public function getAnakById($id)
    {
        $anak = Anak::find($id);

        // if data anak not found
        if (!$anak) {
            return response()->json([
                'message' => 'data anak tidak ditemukan'
            ]);
        }

        return response()->json([
            'data' => $anak,
            'message' => 'data anak berhasil ditemukan'
        ]);

    }

    // delete data anak by id
    public function deleteAnakById($id)
    {
        $anak = Anak::find($id);

        // if data anak not found
        if (!$anak) {
            return response()->json([
                'message' => 'data anak tidak ditemukan'
            ]);
        }

        $anak->delete();

        return response()->json([
            'message' => 'data anak bernama ' . $anak->nama_anak . ' berhasil dihapus'
        ]);
    }

    // delete all data anak
    public function deleteAllAnak()
    {
        // user admin and pengurus only
        if (Auth::user()->role != 'admin' && Auth::user()->role != 'pengurus') {
            return response()->json([
                'message' => 'anda bukan admin atau pengurus, tidak bisa menghapus semua data anak'
            ], 403);
        }

        $anak = Anak::all();

        // if data anak not found
        if (count($anak) == 0) {
            return response()->json([
                'message' => 'data anak tidak ditemukan'
            ]);
        }

        Anak::truncate();

        return response()->json([
            'message' => 'semua data anak berhasil dihapus'
        ]);
    }
}
