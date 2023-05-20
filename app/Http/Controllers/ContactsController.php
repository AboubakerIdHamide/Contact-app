<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    
    public function getContacts()
    {
        $data= Contact::paginate(3);
        return view("contacts.index", ["contacts"=>$data]);
    }

    public function addNewContact()
    {
        return view("contacts.create");
    }
}
