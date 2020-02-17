@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Lista de Empresas</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Filtro</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
      </div>
    </div>
    <div class="card-body p-3">
      <form action="{{ route('companies.index') }}" method="GET">
        <div class="row">                
          <div class="col-sm-3 col-lg-3">
            <div class="form-group">
              <label for="name">Empresa</label>
              <input type="text" name="name" id="name" class="form-control form-control-sm" style="" placeholder="Nome da Empresa">
            </div>
          </div>
          <div class="col-sm-3 col-lg-3">
            <div class="form-group">
              <label for="document_number">CPF/CNPJ</label>
              <input type="text" name="document_number" id="document_number" class="form-control form-control-sm" placeholder="CPF ou CNPJ">
            </div>
          </div>
          <div class="col-sm-3 col-lg-3 d-flex align-items-end">
            <div class="form-group">
              <input type="submit" id="bt_filtro" value="Filtrar" class="btn btn-primary">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="card">
    <div class="card-header">
      @include('_errors')
      <a class="btn btn-primary" href="{{ route('companies.create') }}">Adicionar Empresa</a>
    </div>
    <div class="card-body p-3"> 
      <table class="table table-bordered table-striped table-sm">
        <thead>
          <tr>
            <th>Id</th>
            <th>Empresa</th>
            <th>CPF/CNPJ</th>
            <th>Cidade</th>
            <th>Contatos (Clique para ver)</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($companies as $company)
            <tr>
              <td>{{ $company->id }}</td>
              <td>{{ $company->name }}</td>
              <td>{{ $company->document_number_formatted }}</td>
              <td>{{ $company->city }}</td>
              <td>
                <button type="button" class="btn btn-link" data-toggle="popover" title="Contatos" data-content="{{ $company->contact_detail }}">{{$company->contact_name}}</button>
              </td>
              <td style="width:140px;" class="pl-3">
                <a class='btn btn-info btn-sm' href=" {{ route('companies.contacts.index',  ['company'=>$company->id]) }}" alt="Contatos"><i class="fas fa-users"></i></a>
                <a class='btn btn-warning btn-sm' href=" {{ route('companies.edit',  ['company'=>$company->id]) }}"><i class="fas fa-edit"></i></a>
                <a class='btn btn-danger btn-sm' href=" {{ route('companies.destroy', ['company'=>$company->id]) }} " 
                  onclick="event.preventDefault(); if(confirm('Deseja apagar a Empresa')){document.getElementById('form-company-delete-{{ $company->id }}').submit();}"
                ><i class="fas fa-trash"></i></a>
                <form id="form-company-delete-{{ $company->id }}" style="display:none" action="{{ route('companies.destroy', ['company'=>$company->id]) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="2">Nenhum registro encontrado!</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      {{ $companies->links() }}
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) { 
      $(function () {
        $("[data-toggle=popover]").popover({
          html: true,
          container: 'body'
        })
      })
    });
  </script>
@stop
