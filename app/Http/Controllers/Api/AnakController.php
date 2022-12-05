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

}
