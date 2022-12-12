<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Storage;
class DonateController extends Controller
{
    /**create donate */
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
            'bukti_pembayaran' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
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
            // bukti_pembayaran should be stored in storage/app/public
            'bukti_pembayaran' => $request->file('bukti_pembayaran')->store('bukti', 'public')
        ], 201);
        
        return response()->json([
            'message' => 'Donate created successfully',
            'data' => $donate
        ], 201);
    }
    

    /**only admin can approve or reject status donate*/
    public function updateStatusDonate(Request $request, $id)
    {
        // join table rekening_id in name rekenings
        $donate = Donate::join('rekenings', 'donates.rekening_id', '=', 'rekenings.id')
            ->select('donates.*', 'rekenings.nama_bank')
            ->where('donates.id', $id)
            ->first();

        if ($donate == null) {
            return response([
                'message' => 'donate not found'
            ], 200);
        }
        // only admin can approve or reject status donate
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'You are not admin, you can not approve or reject status donate'
            ], 403);
        }
        $donate->update([
            'status' => $request->status,
        ]);
        return response()->json([
            'message' => 'Donate updated successfully',
            'data' => $donate
        ], 200);
    }

    /**only admin can delete donate*/
    public function deleteDonate($id)
    {
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete donate'
            ], 403);
        }
        $donate = Donate::find($id);

        if ($donate == null) {
            return response([
                'message' => 'donate not found'
            ], 200);
        }
        // delete image in public/storage/bukti
        Storage::disk('public')->delete($donate->bukti_pembayaran);
        $donate->delete();
        return response()->json([
            'message' => 'Donate deleted successfully',
            'data' => $donate
        ], 200);
    }

    /**delete all donate*/
    public function deleteAllDonate()
    {
        $donate = Donate::all();
        // only admin can create new donate
        if (Auth::user()->role != 'admin') {
            return response ([
                'message' => 'you are not admin, you can not delete all donate',
                'data' => $donate
            ], 403);
        }
        // if empty data
        if($donate->isEmpty()){
            return response ([
                'message' => 'donate not found',
                'data' => $donate
            ], 200);
        }

        // delete image in public/storage/donate
        foreach($donate as $a){
            \Storage::disk('public')->delete($a->bukti_pembayaran);
        }
        $donate->each->delete();

        return response ([
            'message' => 'all donate deleted successfully',
            'data' => $donate
        ], 200);

    }

    /**get all donate*/
    public function getAllDonate()
    {
        $donate = DB::table('donates')
        ->join('rekenings', 'donates.rekening_id', '=', 'rekenings.id')
        ->select('donates.*', 'rekenings.nama_bank', 'rekenings.nomor_rekening', 'rekenings.atas_nama')
        ->get();
        $donate = Donate::paginate(10);
        // if not found
        if ($donate == null) {
            return response([
                'message' => 'donate not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Donate retrieved successfully',
            'data' => $donate
        ], 200);
    }

    /**get donate by id*/
    public function getDonateById($id)
    {
        // join table rekening with donate
        $donate = DB::table('donates')
        ->join('rekenings', 'donates.rekening_id', '=', 'rekenings.id')
        ->select('donates.*', 'rekenings.nama_bank', 'rekenings.nomor_rekening', 'rekenings.atas_nama')
        ->where('donates.id', $id)
        ->get();
        // if not found
        if ($donate == null) {
            return response([
                'message' => 'donate not found'
            ], 200);
        }
        return response()->json([
            'message' => 'Donate retrieved successfully',
            'data' => $donate
        ], 200);

    }

}
