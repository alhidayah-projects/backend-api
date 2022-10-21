<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DonateController extends Controller
{
    // create donate
    public function createDonate(Request $request)
    {
        $request->validate([
            'jenis_donasi' => 'required',
            'nominal' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'rekening_id' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'keterangan' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $donate = Donate::create($request->all());

        return response()->json([
            'message' => 'Donate created successfully',
            'data' => $donate
        ], 201);
    }

    // only admin can approve or reject status donate
    public function updateStatusDonate(Request $request, $id)
    {
        $donate = Donate::findOrFail($id);

        $donate->update($request->all());

        return response()->json([
            'message' => 'Donate updated successfully',
            'data' => $donate
        ], 200);
    }
}
