<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Phone;
use App\Model\Contact;
use App\Http\Requests\ContactPhoneRequest;

class ContactPhoneController extends Controller
{
    public function index(Contact $contact)
    {
        $contact_id = $contact->id;
        $contact_name = $contact->name;
        $company_id = $contact->company_id;

        $phones = Phone::where("contact_id",$contact_id)->paginate(3);
        return view('phone.index', compact('phones', 'contact_id', 'contact_name', 'company_id'));
    }

    public function create(Contact $contact)
    {
         $phone = new Phone();
         $contact_id = $contact->id;
         return view('phone.create', compact('phone', 'contact_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactPhoneRequest $request)
    {
        $phone = Phone::create($request->all());
        return redirect()->route('contacts.phones.index', ['contact' => $phone->contact_id])->with('success','Telefone criado com sucesso!');
    }

    public function destroy(Contact $contact, Phone $phone)
    {
        $phone->delete();
        return redirect()->route('contacts.phones.index', ['contact' => $phone->contact_id])->with('success','Telefone deletado com sucesso!');
    }

    public function edit(Contact $contact, Phone $phone)
    {
        $contact_id = $contact->id;
        return view('phone.edit', compact('phone', 'contact_id'));
    }

    public function update(ContactPhoneRequest $request, Contact $contact, Phone $phone)
    {
        $phone->update($request->all());
        return redirect()->route('contacts.phones.index',['contact' => $phone->contact_id])->with('success','Telefone alterado com sucesso!');
    }
}
