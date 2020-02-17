<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="name">Nome</label>
      <input type="text" class="form-control" name='name' id="name" placeholder="Nome da Empresa" value="{{ old('name',$contact->name) }}">
    </div>
</div>
<!-- /.box-body -->