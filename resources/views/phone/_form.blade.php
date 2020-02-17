<div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="phone_number">Telefone</label>
      <input type="text" class="form-control" name='phone_number' id="phone_number" placeholder="Telefone do Contato" value="{{ old('phone_number',$phone->phone_number) }}">
    </div>
</div>
<!-- /.box-body -->