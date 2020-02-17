<div class="box-body">
  {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Empresa</label>
      <input type="text" class="form-control" name='name' id="name" placeholder="Nome da Empresa" value="{{ old('name',$company->name) }}">
    </div>
    <div class="form-group col-md-6">
      <label for="city">Cidade</label>
      <input type="text" class="form-control" name='city' id="city" placeholder="Cidade da Empresa" value="{{ old('city',$company->city) }}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="company_type">Tipo Empresa</label>
      <select class="form-control" name="company_type" id="company_type">
        <option value="1">Física</option>
        <option value="2">Jurídica</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="document_number">CPF/CNPJ</label>
      <input type="text" class="form-control" name='document_number' id="document_number" placeholder="Documento" value="{{ old('document_number',$company->document_number) }}">
    </div>
    <div class="form-group col-md-3" id="rg_div" >
      <label for="rg">RG</label>
      <input type="text" class="form-control" name='rg' id="rg" placeholder="RG" value="{{ old('rg',$company->rg) }}">
    </div>
    <div class="form-group col-md-3" id="date_birth_div" >
      <label for="date_birth">Data de Nascimento</label>
      <input type="text" class="form-control" name='date_birth' id="date_birth" placeholder="Data de Nascimento" value="{{ old('date_birth',$company->date_birth) }}">
    </div>
    <div class="form-group col-md-6 d-none" id="fantasy_name_div">
      <label for="fantasy_name">Nome Fantasia</label>
      <input type="text" class="form-control" name='fantasy_name' id="fantasy_name" placeholder="Nome Fantasia" value="{{ old('fantasy_name',$company->fantasy_name) }}">
    </div>
  </div>
</div>
<!-- /.box-body -->

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
  $('#company_type').on('change', function(){
    if($(this).val() === '1'){
      $('#rg_div').removeClass('d-none');
      $('#date_birth_div').removeClass('d-none');
      $('#fantasy_name_div').addClass('d-none');
      $('#fantasy_name').val("");
    }else{
      $('#rg_div').addClass('d-none');
      $('#date_birth_div').addClass('d-none');
      $('#rg').val("");
      $('#date_birth').val("");
      $('#fantasy_name_div').removeClass('d-none');

    }
  });

  $('#date_birth').mask('00/00/0000');

var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 14 ? '00.000.000/0000-00' : '000.000.000-00999';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('#document_number').mask(SPMaskBehavior, spOptions);
}); 
</script>