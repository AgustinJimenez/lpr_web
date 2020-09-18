<div class="box-body">
  {!! Form::normalInput('nombre', 'Nombre', $errors, $acceso) !!}
  {!! Form::normalSelect('sector_id', 'Sector', $errors, $sectores, $acceso) !!}
  {!! Form::normalSelect('entrada_salida', 'Entrada/Salida', $errors, $enum_options["entrada_salida"], $acceso) !!}
  {!! Form::normalSelect('externa_interna', 'Externa/Interna', $errors, $enum_options["externa_interna"], $acceso) !!}
  {!! Form::normalSelect('camara_lpr_id', 'Cámara', $errors,array('' => '------') + $camaras, $acceso) !!}
  {!! Form::normalCheckbox('activo','Activo', $errors, $acceso) !!}

</div>
