<div class="box-body">
  <div class="row">
      {!! Form::normalInputCol(12,'nombre', 'Nombre', $errors) !!}
      @if ($advanced_config)
        {!! Form::normalSelectCol(4,'tipo', 'Tipo', $errors, $enum_options["tipo"]) !!}
        {!! Form::normalSelectCol(4,'source', 'Source', $errors, $enum_options["source"]) !!}
        {!! Form::normalInputCol(4,'lpr_time', 'LPR Time (ms)', $errors) !!}
        {!! Form::normalInputCol(12,'camera_url', 'Camera URL', $errors) !!}
        {!! Form::normalInputCol(12,'video_path', 'Video Path', $errors) !!}
        {!! Form::normalCheckboxCol(2,'crop','Crop', $errors) !!}
        {!! Form::normalInputCol(10,'crop_data', 'Crop data', $errors) !!}
        {!! Form::normalCheckboxCol(2,'rotate','Rotate', $errors) !!}
        {!! Form::normalInputCol(10,'rotate_data', 'Rotate data', $errors) !!}
        {!! Form::normalCheckboxCol(2,'perspective','Perspective', $errors) !!}
        {!! Form::normalInputCol(10,'perspective_data', 'Perspective data', $errors) !!}
        {!! Form::normalCheckboxCol(3,'save_as_video','Save as Video', $errors) !!}
        {!! Form::normalCheckboxCol(3,'do_tesseract_analysis','Do Tesseract', $errors) !!}
        {!! Form::normalCheckboxCol(3,'do_knn_analysis','Do KNN', $errors) !!}
        {!! Form::normalCheckboxCol(3,'show_live_preview','Live Preview', $errors) !!}
      @endif
  </div>
</div>
