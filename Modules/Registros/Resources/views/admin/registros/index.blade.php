@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('registros::registros.title.registros') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('registros::registros.title.registros') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.registros.registro.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="glyphicon glyphicon-pencil"></i> {{ trans('registros::registros.button.create registro') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                  @include('registros::admin.registros.partials.index.header')
                </div>
                <!-- /.box-header -->
                @include('registros::admin.registros.partials.index.table')
                <!-- /.box -->
            </div>
        </div>
    </div>
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('registros::registros.title.create registro') }}</dd>
    </dl>
@stop

@section('scripts')
  @include('registros::admin.registros.partials.index.scripts.main')
@stop
