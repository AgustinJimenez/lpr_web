<script type="text/javascript">

  $.fn.dataTable.ext.errMode = 'none';
	var table = $('.data-table').DataTable(
  {
    dom: "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
    "<'row'<'col-xs-12't>>"+
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    "deferRender": true,
    processing: true,
    "order": [[ 0, "desc" ]],
    serverSide: true,
    "paginate": true,
    "lengthChange": true,
    "filter": true,
    "sort": true,
    "info": true,
    "autoWidth": true,
    "iDisplayLength": 50,
    ajax:
     {
        url: '{!! route('admin.registros.registro.index_ajax') !!}',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        type: "POST",
        data: function (e)
        {
          e.fecha_desde = $('#fecha_desde').val(),
          e.fecha_hasta = $('#fecha_hasta').val(),
          e.plate = $("#plate").val(),
          e.is_plate = $('#is_plate').val(),
          e.acceso = $("#acceso").val()
        },
        "dataSrc": function ( json ) 
        {
          //$("#any_element_on_dom").text( json.some );
          return json.data;
        }    
    },
    columns:
    [
        { data: 'date_time', name: 'date_time' },
        { data: 'acceso_sector_nombre' , name: 'acceso_sector_nombre' },
        { data: 'acceso_nombre', name: 'acceso_nombre' },
        { data: 'acceso_tipo', name: 'acceso_tipo' },
        { data: 'plate', name: 'plate' },
        { data: 'is_plate', name: 'is_plate' },
        { data: 'imagen', name: 'imagen' },
        { data: 'action', name: 'action', orderable: false, searchable: false}
    ],
    language: 
    {
        processing:     "Procesando...",
        search:         "Buscar",
        lengthMenu:     "Mostrar _MENU_ Elementos",
        info:           "Mostrando de _START_ al _END_ registros de un total de _TOTAL_ registros",
        infoFiltered:   ".",
        infoPostFix:    "",
        loadingRecords: "Cargando Registros...",
        zeroRecords:    "No existen registros disponibles",
        emptyTable:     "No existen registros disponibles",
        paginate: 
        {
            first:      "Primera",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Ultima"
        }
    }
  }); //end datatale
</script>