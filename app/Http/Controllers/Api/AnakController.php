<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Anak;

class AnakController extends Controller
{
    /**create data anak */
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
            'message' => 'add data anak success'
        ], 201);

    }

    /**get all data anak */
    public function getAllAnak()
    {
        $anak = Anak::all();
        $anak = Anak::paginate(10);
        // if data anak not found
        if (count($anak) == 0) {
            return response()->json([
                'message' => 'data anak not found',
                'data' => $anak
            ],200);
        }

        return response()->json([
            'message' => 'data anak has been found successfully',
            'data' => $anak
        ], 200);
    }

    /**get data anak by id */
    public function getAnakById($id)
    {
        $anak = Anak::find($id);

        // if data anak not found
        if (!$anak) {
            return response()->json([
                'message' => 'data anak not found'
            ], 200);
        }

        return response()->json([
            'message' => 'data anak has been found successfully',
            'data' => $anak
        ], 200);

    }

    /**delete data anak by id */
    public function deleteAnakById($id)
    {
        $anak = Anak::find($id);

        // if data anak not found
        if (!$anak) {
            return response()->json([
                'message' => 'data anak not found'
            ], 200);
        }

        $anak->delete();

        return response()->json([
            'message' => 'named data anak ' . $anak->nama_anak . ' deleted successfully',
        ], 200);
    }

    /**delete all data anak */
    public function deleteAllAnak()
    {
        // user admin and pengurus only
        if (Auth::user()->role != 'admin' && Auth::user()->role != 'pengurus') {
            return response()->json([
                'message' => 'you are not authorized to delete all data anak'
            ], 403);
        }

        $anak = Anak::all();

        // if data anak not found
        if (count($anak) == 0) {
            return response()->json([
                'message' => 'data anak not found'
            ], 200);
        }

        Anak::truncate();

        return response()->json([
            'message' => 'success delete all data anak',
            'data' => $anak
        ], 200);
    }

    /**update data anak by id */
    public function updateAnak(Request $request, $id)
    {
        $anak = Anak::find($id);

        // if data anak not found
        if ($anak==null) {
            return response()->json([
                'message' => 'data anak not found'
            ], 200);
        }

        $validator = Validator::make($request->all(), [
            'nama_anak' => 'required|string|max:255',
            'nik' => 'required',
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

        $anak->update([
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
            'message' => 'data anak has been updated successfully',
            'data' => $anak
        ], 200);
    }
}
