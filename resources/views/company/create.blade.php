@extends('adminlte::page')

@section('title', 'Criar Empresa')

@section('content_header')
    <h1>Adicionar Empresa</h1>
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
              <form role="form" method="POST" action="{{ route('companies.store') }}">
                @include('company._form')
  
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Criar Empresa</button>
                  <a href="{{ route('companies.index') }}" class="btn btn-default">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.box -->  
          </div>
    </div>
  </div>
  <div class="card-footer">
    @include('_errors')
  </div>
</div>

@stop