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
        return response()->json($contact);
    }

    // get contact data by id
    public function getContactDataById($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    // delete contact data by id
    public function deleteContactDataById($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return response()->json('Data berhasil dihapus');
    }
    
}
