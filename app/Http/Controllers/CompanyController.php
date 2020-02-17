<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Company;
use App\Model\Phone;
use App\Http\Requests\CompanyRequest;


class CompanyController extends Controller
{
    private $itensPerPage = 3;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $name = $request->input('name');
        $document_number = $request->input('document_number');
        if($name != "" && $document_number != ""){
            $companies = Company::with('contacts', 'contacts.phones')->
                                  where('name', 'like', "%{$name}%")->
                                  where('document_number', 'like', "%{$document_number}%")->
                                  paginate($this->itensPerPage)->
                                  appends(request()->query());
        }elseif($name != ""){
            $companies = Company::with('contacts', 'contacts.phones')->
                                  where('name', 'like', "%{$name}%")->
                                  paginate($this->itensPerPage)->
                                  appends(request()->query());
        }elseif($document_number != ""){
            $document_number = preg_replace('/[^0-9]/','',$document_number);
            $companies = Company::with('contacts', 'contacts.phones')->
                                  where('document_number', 'like', "%{$document_number}%")->
                                  paginate($this->itensPerPage)->
                                  appends(request()->query());
        }else{
            $companies = Company::with('contacts', 'contacts.phones')->paginate($this->itensPerPage);
        }

        for ($i=0; $i < count($companies); $i++){
            $contact_name = "";
            $contact_detail = "";
            foreach($companies[$i]->contacts as $contact){
                if($contact_name != "") $contact_name .=  ", ";
                $contact_name .= $contact->name;
                $contact_detail .= "<p><b>$contact->name :</b> ";
                $phone_detail = "";
                foreach($contact->phones as $phone){
                    if($phone_detail != "") $phone_detail .= ", ";
                    $phone_detail .= $phone->phone_number;
                }
                $contact_detail .= $phone_detail."</p>";
            }
            $companies[$i]->contact_name = $contact_name;    
            $companies[$i]->contact_detail = $contact_detail;
        }
        
        return view("company.index", compact('companies'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('company.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->all());
        return redirect()->route('companies.index')->with('success','Empresa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->all());
        return redirect()->route('companies.index')->with('success','Empresa alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success','Empresa deletada com sucesso!');
    }
}
