<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has("search")){
            $data=Company::where("name","LIKE", "%".$request->search."%")->paginate(3);
        }else{
            $data=Company::latest()->paginate(3);
        }
        return view("companies.index", ["companies"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("companies.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"email|unique:companies,email",
            "website"=>"url",
            "adress"=>"min:15",
        ]);
        
        Company::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "website"=>$request->website,
            "adress"=>$request->adress,
        ]);

        return redirect("/companies")->with(["msg"=>"Company Inserted Successfuly", "status"=>"success"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company=Company::findOrFail($id);
        return view("companies.show", ["company"=> $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Company::findOrFail($id);
        return view("companies.edit", ["company"=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"email",
            "website"=>"url",
            "adress"=>"min:15",
        ]);
        
        Company::find($id)->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "website"=>$request->website,
            "adress"=>$request->adress,
        ]);

        return redirect("/companies")->with(["msg"=>"Company Updated Successfuly", "status"=>"success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Company::destroy($id);
        return redirect("/companies")->with(["msg"=>"Company Deleted Successfuly", "status"=>"info"]);
    }

    public function getDeletedCompanies(Request $request)
    {
        if($request->has("search")){
            $data=Company::onlyTrashed()->where("name","LIKE", "%".$request->search."%")->paginate(3);
        }else{
            $data=Company::onlyTrashed()->latest()->paginate(3);
        }
        return view("companies.trash", ["companies"=>$data]);
    }

    public function forceDeleteCompany($id)
    {
        $company = Company::withTrashed()->find($id);
        $company->forceDelete();
        return redirect("/companies")->with(["msg"=>"Company Deleted Forever Successfuly", "status"=>"info"]);
    }

    public function restoreCompany($id)
    {
        $company = Company::withTrashed()->find($id);
        $company->restore();
        return redirect("/companies")->with(["msg"=>"Company Restored Successfuly", "status"=>"info"]);
    }
}
