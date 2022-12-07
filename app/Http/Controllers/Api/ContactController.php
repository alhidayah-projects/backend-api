<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
        return response ()->json([
            'success' => true,
            'message' => 'Thank you for contacting us!',
            'data' => $request->all()
        ], 200);
    }

    // get contact all data
    public function getContactData()
    {
        $contact = Contact::all();
        $contact = Contact::paginate(5);

        // if empty data
        if($contact->isEmpty()){
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => $contact
            ], 200);
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
            return response ()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => $contact
            ], 200);
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
        // if not admin can not delete
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete data'
            ], 403);
        }

        $contact = Contact::find($id);

        // if empty data
        if($contact == null){
            return response ()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => $contact
            ], 200);
        }
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Contact Successfully Deleted',
            'data' => $contact
        ], 200);
    }
    
    // delete all contact data
    public function deleteAllContactData()
    {
        $contact = Contact::all();
        // only admin can create new contact
        if (Auth::user()->role != 'admin') {
            return response([
                'message' => 'you are not admin, you can not delete data'
            ], 403);
        }
        // if empty data
        if($contact->isEmpty()){
            return response ()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => $contact
            ], 200);
        }

        $contact->each->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Contact Successfully Deleted',
            'data' => $contact
        ], 200);
    }
}

