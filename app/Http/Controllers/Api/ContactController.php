<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'keterangan' => 'required',
        ]);

        $contact = Contact::create($request->all());

        return response()->json([
            'message' => 'success',
            'data' => $contact
        ], 201);
    }

    //gert all contact
    public function getAllContact()
    {
        $contact = Contact::all();

        return response()->json([
            'message' => 'success',
            'data' => $contact
        ], 200);
    }
}
