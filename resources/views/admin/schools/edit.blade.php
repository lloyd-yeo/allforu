@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schools.title')</h3>
    
    {!! Form::model($school, ['method' => 'PUT', 'route' => ['admin.schools.update', $school->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.schools.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('acronym', trans('quickadmin.schools.fields.acronym').'', ['class' => 'control-label']) !!}
                    {!! Form::text('acronym', old('acronym'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('acronym'))
                        <p class="help-block">
                            {{ $errors->first('acronym') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($school->cover_img)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$school->cover_img) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$school->cover_img) }}"></a>
                    @endif
                    {!! Form::label('cover_img', trans('quickadmin.schools.fields.cover-img').'', ['class' => 'control-label']) !!}
                    {!! Form::file('cover_img', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('cover_img_max_size', 2) !!}
                    {!! Form::hidden('cover_img_max_width', 4096) !!}
                    {!! Form::hidden('cover_img_max_height', 4096) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cover_img'))
                        <p class="help-block">
                            {{ $errors->first('cover_img') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

