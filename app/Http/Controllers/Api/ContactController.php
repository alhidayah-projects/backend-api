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

    //get contact by id
    public function getContactById($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            return response()->json([
                'message' => 'success',
                'data' => $contact
            ], 200);
        } else {
            return response()->json([
                'message' => 'contact not found',
                'data' => null
            ], 404);
        }
    }

    //delete contact by id
    public function deleteContactById($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();
            return response()->json([
                'message' => 'contact deleted',
                'data' => null
            ], 200);
        } else {
            return response()->json([
                'message' => 'contact not found',
                'data' => null
            ], 404);
        }
    }
}
