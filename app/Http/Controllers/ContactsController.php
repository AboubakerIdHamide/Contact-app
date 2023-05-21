<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    
    public function getContacts(Request $request)
    {
        $data=["companies"=> Company::all()];
        if(
            $request->has("search")
            && $request->has("company")
            && !empty(trim($request->search))
            && !empty(trim($request->company))
        ){
            $data["contacts"]=Contact::where("first_name", "LIKE", "%".$request->search."%")
            ->where("company_id", $request->company)->paginate(3);

        }elseif($request->has("search") && !empty(trim($request->search))){
            $data["contacts"]=Contact::where("first_name", "LIKE", "%".$request->search."%")->paginate(3);

        }elseif($request->has("company") && !empty(trim($request->company))){
            $data["contacts"]=Contact::where("company_id", $request->company)->paginate(3);

        }else{
            $data["contacts"]=Contact::latest()->paginate(3);
        }
        return view("contacts.index", ["data"=>$data]);
    }

    public function addNewContact()
    {
        $companies=Company::all();
        return view("contacts.create", ["companies"=>$companies]);
    }

    public function storeNewContact(Request $request)
    {
        $request->validate([
            "firstName"=>"required",
            "lastName"=>"required",
            "email"=>"email|unique:contacts,email",
            "phone"=>"starts_with:06|min:10|max:12",
            "adress"=>"min:15",
            "company"=>"integer",
        ]);
        
        Contact::create([
            "first_name"=>$request->firstName,
            "last_name"=>$request->lastName,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "adress"=>$request->adress,
            "company_id"=>$request->company,
        ]);

        return redirect("/contacts")->with(["msg"=>"Contact Inserted Successfuly", "status"=>"success"]);
    }

    public function showContact($id)
    {
        $contact=Contact::findOrFail($id);
        return view("contacts.show", ["contact"=> $contact]);
    }

    public function deleteContact($id)
    {
        Contact::destroy($id);
        return redirect("/contacts")->with(["msg"=>"Contact Deleted Successfuly", "status"=>"info"]);
    }

    public function editContact($id)
    {
        $data=[
            "contact"=>Contact::findOrFail($id),
            "companies"=>Company::all(),
        ];
        return view("contacts.edit", ["data"=> $data]);
    }

    public function updateContact(Request $request, $id)
    {
        $request->validate([
            "firstName"=>"required",
            "lastName"=>"required",
            "email"=>"email",
            "phone"=>"starts_with:06|min:10|max:12",
            "adress"=>"min:15",
            "company"=>"integer",
        ]);
        
        Contact::find($id)->update([
            "first_name"=>$request->firstName,
            "last_name"=>$request->lastName,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "adress"=>$request->adress,
            "company_id"=>$request->company,
        ]);

        return redirect("/contacts")->with(["msg"=>"Contact Updated Successfuly", "status"=>"success"]);
    }
}
