<div class="box-body">
  {!! Form::normalInput('nombre', 'Nombre', $errors) !!}
  {!! Form::normalInput('descripcion', 'Descripcion', $errors) !!}
  {!! Form::normalCheckbox('activo','Activo', $errors) !!}
</div>
