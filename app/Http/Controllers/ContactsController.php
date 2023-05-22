<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function eloquentTests()
    {
        # Qa, b & c
        // $data=Contact::all();
        // $data=Contact::limit(3)->get();
        // $data=Contact::limit(3)->offset(5)->get();
        
        # Qd
        // $contact= new Contact();
        // $contact->first_name="john doe";
        // $contact->last_name="john doe";
        // $contact->phone="000";
        // $contact->email="email@email";
        // $contact->adress="somewhere, ss";
        // $contact->company_id=17;
        // $res=$contact->save();

        #Qe
        // $res= Contact::create([
        //     "first_name"=>"john doe",
        //     "last_name"=>"john doe",
        //     "phone"=>"000",
        //     "email"=>"email@email",
        //     "adress"=>"somewhere, ss",
        //     "company_id"=>17,
        // ]);

        #Qf
        // $res= Contact::firstOrCreate([
        //     "first_name"=>"john doe (You Can't Find Me :)",
        // ], [
        //     "last_name"=>"john doe",
        //     "phone"=>"000",
        //     "email"=>"email@email",
        //     "adress"=>"somewhere, ss",
        //     "company_id"=>17,
        // ]);

        #Qg
        // $contact= Contact::findOrFail(24);
        // $contact->first_name="john doe updated using Save";
        // $contact->last_name="john doe";
        // $contact->phone="000";
        // $contact->email="email@email";
        // $contact->adress="somewhere, ss";
        // $contact->company_id=17;
        // $res=$contact->save();

        #Qh
        // $res= Contact::findOrFail(23)->update([
        //     "first_name"=>"john doe updated",
        //     "last_name"=>"john doe",
        //     "phone"=>"000",
        //     "email"=>"email@email",
        //     "adress"=>"somewhere, ss",
        //     "company_id"=>17,
        // ]);

        #Qi
        // $res= Contact::findOrFail(23)->delete();
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::statement('TRUNCATE TABLE contacts;');
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // DB::statement('ALTER TABLE contacts AUTO_INCREMENT = 1;');
        
        // return $res;
    }

    public function getDeletedContacts(Request $request)
    {
        $data=["companies"=> Company::all()];
        if(
            $request->has("search")
            && $request->has("company")
            && !empty(trim($request->search))
            && !empty(trim($request->company))
        ){
            $data["contacts"]=Contact::onlyTrashed()->where("first_name", "LIKE", "%".$request->search."%")
            ->where("company_id", $request->company)->paginate(3);

        }elseif($request->has("search") && !empty(trim($request->search))){
            $data["contacts"]=Contact::onlyTrashed()->where("first_name", "LIKE", "%".$request->search."%")->paginate(3);

        }elseif($request->has("company") && !empty(trim($request->company))){
            $data["contacts"]=Contact::onlyTrashed()->where("company_id", $request->company)->paginate(3);

        }else{
            $data["contacts"]=Contact::onlyTrashed()->latest()->paginate(3);
        }
        return view("contacts.trash", ["data"=>$data]);
    }

    public function forceDeleteContact($id)
    {
        $contact = Contact::withTrashed()->find($id);
        $contact->forceDelete();
        return redirect("/contacts")->with(["msg"=>"Contact Deleted Forever Successfuly", "status"=>"info"]);
    }

    public function restoreContact($id)
    {
        $contact = Contact::withTrashed()->find($id);
        $contact->restore();
        return redirect("/contacts")->with(["msg"=>"Contact Restored Successfuly", "status"=>"info"]);
    }
}
