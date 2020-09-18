<?php $columns = array('Fecha', 'Sector', 'Acceso', 'Tipo', 'Nro de Chapa', 'Es Chapa?', 'Imagen', 'core::core.table.actions');?>

<div class="box-body table-responsive">
    <table class="data-table table table-bordered table-hover">
        <thead>
          <tr>
            @foreach ($columns as $column)
              <th class="btn-primary">{{ trans($column) }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
          <tr>
            @foreach ($columns as $column)
              <th class="btn-primary">{{ trans($column) }}</th>
            @endforeach
          </tr>
        </tfoot>
    </table>
</div>