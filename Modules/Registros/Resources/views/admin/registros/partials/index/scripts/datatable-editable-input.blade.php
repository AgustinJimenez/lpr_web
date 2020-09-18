<style type="text/css">
	.datatable-editable-input-focus-off
	{
		border:none;
		background-color:transparent;
	}
	.datatable-editable-input-focus-on
	{
		border: 1px;
	}
</style>
<script type="text/javascript">

	var input_editable_class = '.datatable_input-plate';
	var input_focus_off_class = 'datatable-editable-input-focus-off';
	var input_focus_on_class = 'datatable-editable-input-focus-on';
	var input_element_id_attribute = 'registro_id';
	var input_element_attribute_attribute = "campo";
	var select_editable_class = ".datatable_select_is_plate";

	$("body").on('focus' , input_editable_class,function(event)
	{
		input_editable_focus_on_off_class( $( this ) )
	});

	$("body").on('focusout', input_editable_class,function(event)
	{
		input_editable_focus_on_off_class( $( this ) )
	});

	$("body").on('keypress', input_editable_class,function(key_pressed)
	{
		$(this).next('.bar').toggleClass('bar-after', 'bar-before');
		if( key_pressed.which == 13) 
			edit_element( $(this) );
	});

	$("body").on('change', select_editable_class,function(event)
	{
		edit_element( $(this) );
	});

	function edit_element( object )
	{
		var submit_is_allowed = true;

		var value = object.val();
		var id = object.attr(input_element_id_attribute);
		var attribute = object.attr(input_element_attribute_attribute);
		var token = "{{ csrf_token() }}";
		var route = "{{ route('admin.registros.registro.index_ajax_edit') }}";
		route = route.replace("%7Bregistro%7D", id);
		log("value="+value+" id="+id+" attribute="+attribute+" route="+route);

		if(submit_is_allowed)
		{
	    	$.post(route, 
	    	{ 
	    		attribute: attribute,
	    		value: value,
	    		_token: token,
	    		_method: "put"
	    	}
	    	,function(result)
	    	{
	        	//console.log( result );
	    	});
	    	object.blur();
	    	object.next(".bar").show().delay(5000).queue(function(n) 
            {

                $(this).hide(); n();

                $("#cliente_form").trigger("reset");

            });
	    }
    	
    	//$(this).next('.bar').toggleClass("bar-before", 1000, "bar-after");
    	
	}

	function input_editable_focus_on_off_class( any_input )
	{
		any_input.toggleClass( input_focus_off_class, input_focus_on_class );
	}
</script>