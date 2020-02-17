@extends('adminlte::page')

@section('title', 'Criar Contato')

@section('content_header')
    <h1>Adicionar Contato</h1>
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
              <form role="form" method="POST" action="{{ route('companies.contacts.store',['company'=>$company_id]) }}">
                @include('contact._form')
                <input type="hidden" name="company_id" value="{{ $company_id }}">
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Criar Contato</button>
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