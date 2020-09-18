<div class="box-body">
  <div class="row">
      {!! Form::normalInputCol(12,'nombre', 'Nombre', $errors, $camara) !!}
      @if ($advanced_config)
        {!! Form::normalSelectCol(4,'tipo', 'Tipo', $errors, $enum_options["tipo"], $camara) !!}
        {!! Form::normalSelectCol(4,'source', 'Source', $errors, $enum_options["source"], $camara) !!}
        {!! Form::normalInputCol(4,'lpr_time', 'LPR Time (ms)', $errors, $camara) !!}
        {!! Form::normalInputCol(12,'camera_url', 'Camera URL', $errors, $camara) !!}
        {!! Form::normalInputCol(12,'video_path', 'Video Path', $errors, $camara) !!}
        {!! Form::normalCheckboxCol(2,'crop','Crop', $errors, $camara) !!}
        {!! Form::normalInputCol(10,'crop_data', 'Crop data', $errors, $camara) !!}
        {!! Form::normalCheckboxCol(2,'rotate','Rotate', $errors, $camara) !!}
        {!! Form::normalInputCol(10,'rotate_data', 'Rotate data', $errors, $camara) !!}
        {!! Form::normalCheckboxCol(2,'perspective','Perspective', $errors, $camara) !!}
        {!! Form::normalInputCol(10,'perspective_data', 'Perspective data', $errors, $camara) !!}
        {!! Form::normalCheckboxCol(3,'save_as_video','Save as Video', $errors, $camara) !!}
        {!! Form::normalCheckboxCol(3,'do_tesseract_analysis','Do Tesseract', $errors, $camara) !!}
        {!! Form::normalCheckboxCol(3,'do_knn_analysis','Do KNN', $errors, $camara) !!}
        {!! Form::normalCheckboxCol(3,'show_live_preview','Live Preview', $errors, $camara) !!}
      @endif
  </div>
</div>
