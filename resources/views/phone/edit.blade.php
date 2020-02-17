@extends('adminlte::page')

@section('title', 'Editar Telefone')

@section('content_header')
    <h1>Editar Telefone</h1>
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
              <form role="form" method="POST" action="{{ route('contacts.phones.update', ['contact'=>$contact_id, 'phone'=>$phone->id]) }}">
                {{method_field('PUT')}}
                @include('phone._form')
                <input type="hidden" name="contact_id" value="{{ $contact_id }}">
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Alterar Telefone</button>
                  <a href="{{ route('contacts.phones.index',['contact'=>$contact_id]) }}" class="btn btn-default">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.box -->  
          </div>
    </div>
  </div>
</div>

@stop