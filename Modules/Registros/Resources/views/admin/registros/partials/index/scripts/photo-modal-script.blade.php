<script type="text/javascript">
$(document).ready(function()
{

	$("body").on('click', '.imagen',function(event)
	{
		var source = $(this).attr('imagen');
		$("#photo-modal-image").attr("src", source);
		$("#photo-modal").modal("show");
	});

});
</script>
<style type="text/css">
  .modal-dialog
  {
    width: 90%; height: 90%;
  }
  .modal-body, .modal-content
  {
    padding: 0px;
    background: transparent;
  }
  .dismiss-modal-icon
  {
    position: absolute;
    margin-top:10px;
    color:white;
    font-size: 30px;
  }
</style>
<div id="photo-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" id="photo-modal-body">
        <div class="row">
          <div class="col-md-1 col-md-offset-11">
            <i class="glyphicon glyphicon-remove dismiss-modal-icon" aria-hidden="true" data-dismiss="modal"></i>
          </div>
        </div>
        
        <img src="" id="photo-modal-image" width="100%">
      </div>
      <!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
      -->
    </div>

  </div>
</div>