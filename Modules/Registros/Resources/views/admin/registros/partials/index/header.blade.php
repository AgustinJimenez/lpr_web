<div class="row">

	<div class="col-md-2">
		{!! Form::label('for_acceso', 'Acceso', array('class' => '')) !!}
		{!! Form::select('acceso', $accesos, "", array('class' => 'form-control', 'id' => 'acceso')) !!}
	</div>
	
	<div class="col-md-2">
		{!! Form::label('for_fecha_desde', 'Fecha Desde', array('class' => '')) !!}
		<table>
		<tr>
			<td>
				{!! Form::text('fecha_desde', '', array('class' => 'form-control', 'id' => 'fecha_desde', 'placeholder' => 'Fecha Desde')) !!}
			</td>
			<td>
				<i class="glyphicon glyphicon-trash btn btn-primary" id="borrar_fecha_desde"></i>
			</td>
		</table>
		
	</div>

	<div class="col-md-2">
		{!! Form::label('for_fecha_hasta', 'Fecha Hasta', array('class' => '')) !!}
		<table>
		<tr>
			<td>
				{!! Form::text('fecha_hasta', '', array('class' => 'form-control fecha', 'id' => 'fecha_hasta', 'placeholder' => 'Fecha Hasta')) !!}
			</td>
			<td>
				<i class="glyphicon glyphicon-trash btn btn-primary" id="borrar_fecha_hasta"></i>
			</td>
		</table>
	</div>

	<div class="col-md-2">
		{!! Form::label('for_plate', 'Chapa', array('class' => '')) !!}
		{!! Form::text('plate', '', array('class' => 'form-control fecha', 'id' => 'plate', 'placeholder' => 'Chapa')) !!}
	</div>

	<div class="col-md-2">
		{!! Form::label('for_is_plate', 'Es Chapa?', array('class' => '')) !!}
		{!! Form::select('is_plate', ["" => "Todos", 'SI' => 'SI', 'NO' => 'NO', 'PROBABLE' => 'PROBABLE'], null, array('class' => 'form-control', 'id' => 'is_plate')) !!}
	</div>
	
</div>