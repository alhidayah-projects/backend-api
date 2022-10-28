<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    // public function index()
    // {
    //     return view('contactForm');
    // }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'keterangan' => 'required'
        ]);
  
        Contact::create($request->all());
        return ['message' => 'Terima kasih telah menghubungi kami'];
    }

    // get contact all data
    public function getContactData()
    {
        $contact = Contact::all();

        // if empty data
        if($contact->isEmpty()){
            return ['message' => 'Data tidak ditemukan'];
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Contact',
            'data' => $contact
        ], 200);
    }

    // get contact data by id
    public function getContactDataById($id)
    {
        $contact = Contact::find($id);

        // if empty data
        if($contact == null){
            return ['message' => 'Data tidak ditemukan'];
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Contact',
            'data' => $contact
        ], 200);
    }

    // delete contact data by id
    public function deleteContactDataById($id)
    {
        // if empty data
        if(Contact::find($id) == null){
            return ['message' => 'Data tidak ditemukan'];
        }
        Contact::destroy($id);
        return ['message' => 'Data berhasil dihapus'];
    }
    
    // delete all contact data
    public function deleteAllContactData()
    {
      // if empty data
        if(Contact::all()->isEmpty()){
            return ['message' => 'Data tidak ditemukan'];
        }
        Contact::truncate();
        return ['message' => 'Data berhasil dihapus'];
    }
}
