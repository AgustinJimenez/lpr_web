<script type="text/javascript">

  $(document).keypressAction({actions: [{ key: 'c', route: "{{ route('admin.registros.registro.create') }}" }]});
  
  $("#fecha_desde, #fecha_hasta").on("dp.change", function (e) 
  {
    table.draw();
  });

  $("#borrar_fecha_desde").click(function()
  {
    $('#fecha_desde').val('');
    table.draw();
  });
  $("#borrar_fecha_hasta").click(function()
  {
    $('#fecha_hasta').val('');
    table.draw();
  });

  $("#plate").keyup(function()
  {
    table.draw();
  });

  $("#acceso, #is_plate").change(function()
  {
    table.draw();
  });
</script>