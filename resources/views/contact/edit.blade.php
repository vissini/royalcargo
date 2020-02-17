@extends('adminlte::page')

@section('title', 'Editar Contato')

@section('content_header')
    <h1>Editar Contato</h1>
@stop
@section('content')
<div class="card">
  <div class="card-body p-3">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <!-- /.box-header -->
              <!-- form start -->
              @include('_errors')
              <form role="form" method="POST" action="{{ route('companies.contacts.update', ['company'=>$company_id, 'contact'=>$contact->id]) }}">
                {{method_field('PUT')}}
                @include('contact._form')
                <input type="hidden" name="company_id" value="{{ $company_id }}">
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Alterar Contato</button>
                  <a href="{{ route('companies.contacts.index',['company'=>$company_id]) }}" class="btn btn-default">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.box -->  
          </div>
    </div>
  </div>
</div>

@stop