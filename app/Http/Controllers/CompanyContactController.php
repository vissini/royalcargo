<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Company;
use App\Model\Contact;
use App\Http\Requests\CompanyContactRequest;

class CompanyContactController extends Controller
{
    public function index(Company $company)
    {
        $company_id = $company->id;
        $company_name = $company->name;

        $contacts = Contact::with('phones')->where("company_id",$company_id)->paginate(3);
        return view('contact.index', compact('contacts', 'company_id', 'company_name'));
    }

    public function create(Company $company)
    {
         $contact = new Contact();
         $company_id = $company->id;
         return view('contact.create', compact('contact', 'company_id'));
    }

    public function store(CompanyContactRequest $request)
    {
        $contact = Contact::create($request->all());
        return redirect()->route('companies.contacts.index', ['company' => $contact->company_id])->with('success','Contato criada com sucesso!');
    }

    public function destroy(Company $company, Contact $contact)
    {
        $contact->delete();
        return redirect()->route('companies.contacts.index', ['company' => $contact->company_id])->with('success','Contato deletada com sucesso!');
    }

    public function edit(Company $company, Contact $contact)
    {
        $company_id = $company->id;
        return view('contact.edit', compact('contact', 'company_id'));
    }

    public function update(CompanyContactRequest $request, Company $company, Contact $contact)
    {
        $contact->update($request->all());
        return redirect()->route('companies.contacts.index',['company' => $contact->company_id])->with('success','Contato alterada com sucesso!');
    }
}
