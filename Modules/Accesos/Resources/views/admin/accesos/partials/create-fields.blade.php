<div class="box-body">
  {!! Form::normalInput('nombre', 'Nombre', $errors) !!}
  {!! Form::normalSelect('sector_id', 'Sector', $errors, $sectores) !!}
  {!! Form::normalSelect('entrada_salida', 'Entrada/Salida', $errors, $enum_options["entrada_salida"]) !!}
  {!! Form::normalSelect('externa_interna', 'Externa/Interna', $errors, $enum_options["externa_interna"]) !!}
  {!! Form::normalSelect('camara_lpr_id', 'Cámara', $errors, array('' => '------') + $camaras) !!}
  {!! Form::normalCheckbox('activo','Activo', $errors) !!}

</div>
