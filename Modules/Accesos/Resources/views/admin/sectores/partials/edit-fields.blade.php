<div class="box-body">
  {!! Form::normalInput('nombre', 'Nombre', $errors, $sector) !!}
  {!! Form::normalInput('descripcion', 'Descripcion', $errors, $sector) !!}
  {!! Form::normalCheckbox('activo','Activo', $errors, $sector) !!}
</div>
