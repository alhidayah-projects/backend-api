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
    // create a new yayasan
    public function create(Request $request)
    {
        // only admin can create yayasan
        if (auth()->user()->role != 'admin') {
            return response()->json([
                'message' => 'anda bukan admin untuk membuat yayasan',
            ], 403);
        }

        // validate request
        $request->validate([
            'nama_yayasan' => 'required|string',
            'akte_notaris' => 'required|string',
            'kemenkumham' => 'required|string',
            'npwp' => 'required|string',
            'sk_kota' => 'required|string',
            'sk_provinsi' => 'required|string',
            'profil_yayasan' => 'required|string',
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
        ]);

        // return yayasan
        return response()->json([
            'message' => 'yayasan berhasil dibuat',
            'yayasan' => $yayasan,
        ], 201);
    }
}
