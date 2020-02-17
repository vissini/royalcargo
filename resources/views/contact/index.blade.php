@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Lista de Contatos da Empresa - {{$company_name}}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    @include('_errors')
    <a class="btn btn-primary" href="{{ route('companies.contacts.create',['company'=>$company_id]) }}">Adicionar Contato</a>
    <a class="btn btn-secondary" href="{{ route('companies.index') }}">Voltar Lista de Empresas</a>
  </div>
  <div class="card-body p-3">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Empresa</th>
          <th>Telefones</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($contacts as $contact)
          <tr>
            <td data-label="Id">{{ $contact->id }}</td>
            <td data-label="Nome">{{ $contact->name }}</td>
            <td data-label="Telefones">
              @forelse ($contact->phones as $phone)
                <span>{{ $phone->phone_number }}</span>
              @empty
              -
              @endforelse
            </td>
            <td style="width:240px;" class="actions-td">
              <a class='btn btn-info btn-sm' href=" {{ route('contacts.phones.index',  ['contact'=>$contact->id]) }}" alt="Telefone"><i class="fas fa-phone"></i></a>
              <a class='btn btn-warning' href=" {{ route('companies.contacts.edit',  ['company'=>$company_id, 'contact'=>$contact->id]) }}"><i class="fas fa-edit"></i></a>
              <a class='btn btn-danger' href=" {{ route('companies.contacts.destroy', ['company'=>$company_id, 'contact'=>$contact->id]) }} " 
                  onclick="event.preventDefault(); if(confirm('Deseja apagar o Contato')){document.getElementById('form-contact-delete-{{ $contact->id }}').submit();}"
                  ><i class="fas fa-trash"></i></a>
              <form id="form-contact-delete-{{ $contact->id }}" style="display:none" action="{{ route('companies.contacts.destroy', ['company'=>$company_id, 'contact'=>$contact->id]) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4">Nenhum registro encontrado!</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    {{ $contacts->links() }}
  </div>
</div>
@stop
