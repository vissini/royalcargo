@extends('adminlte::page')

@section('title', 'Telefones')

@section('content_header')
    <h1>Lista de Telefones do Contato - {{$contact_name}}</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      @include('_errors')
      <a class="btn btn-primary" href="{{ route('contacts.phones.create',['contact'=>$contact_id]) }}">Adicionar Telefone</a>
      <a class="btn btn-secondary" href="{{ route('companies.contacts.index',['company'=>$company_id]) }}">Voltar Lista de Contatos</a>
    </div>
    <div class="card-body p-3">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Telefone</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($phones as $phone)
            <tr>
              <td>{{ $phone->id }}</td>
              <td>{{ $phone->phone_number }}</td>
              <td style="width:240px;">
                <a class='btn btn-warning' href=" {{ route('contacts.phones.edit',  ['contact'=>$contact_id, 'phone'=>$phone->id]) }}"><i class="fas fa-edit"></i></a>
                <a class='btn btn-danger' href=" {{ route('contacts.phones.destroy', ['contact'=>$contact_id, 'phone'=>$phone->id]) }} " 
                    onclick="event.preventDefault(); if(confirm('Deseja apagar o Telefone')){document.getElementById('form-telefone-delete-{{ $phone->id }}').submit();}"
                ><i class="fas fa-trash"></i></a>

                <form id="form-telefone-delete-{{ $phone->id }}" style="display:none" action="{{ route('contacts.phones.destroy', ['contact'=>$contact_id, 'phone'=>$phone->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3">Nenhum registro encontrado!</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      {{ $phones->links() }}
    </div>
  </div>
@stop
