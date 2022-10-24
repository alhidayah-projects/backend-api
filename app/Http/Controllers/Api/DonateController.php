<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DonateController extends Controller
{
    // create donate
    public function createDonate(Request $request)
    {
        $this->validate($request, [
            'jenis_donasi' => 'required',
            'nominal' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'rekening_id' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'keterangan' => 'required',
            // 'bukti_pembayaran' => 'required|image|mimes:jpg,png,jpeg'
            'bukti_pembayaran' => 'required'
        ]);

        $donate=Donate::create([
            'donasi_id' => $request->donasi_id = 'DNS' . rand(0, 9999),
            'jenis_donasi'=> $request->jenis_donasi,
            'nominal' => $request->nominal,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'rekening_id' => $request->rekening_id,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'keterangan' => $request->keterangan,
            'bukti_pembayaran' => $request->bukti_pembayaran
        ]);

        return response()->json([
            'message' => 'Donate created successfully',
            'data' => $donate
        ], 201);
    }
    

    // only admin can approve or reject status donate
    public function updateStatusDonate(Request $request, $id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'anda bukan admin, tidak bisa approve atau reject'
            ], 403);
        }
        $donate = Donate::findOrFail($id);

        $donate->update($request->all());

        return response()->json([
            'message' => 'Donate updated successfully',
            'data' => $donate
        ], 200);
    }

    // only admin can delete donate
    public function deleteDonate($id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'anda bukan admin, tidak bisa delete'
            ], 403);
        }
        $donate = Donate::find($id);

        if ($donate == null) {
            return response([
                'message' => 'donate not found'
            ], 404);
        }
        $donate->delete();
        return response()->json([
            'message' => 'Donate deleted successfully',
            'data' => $donate
        ], 200);
    }

    // get all donate
    public function getAllDonate()
    {
        // if not found donate
        if (Donate::all()->count() == 0) {
            return response([
                'message' => 'donate not found'
            ], 404);
        }
        $donate = Donate::all();
        return response()->json([
            'message' => 'Donate retrieved successfully',
            'data' => $donate
        ], 200);
    }

}
