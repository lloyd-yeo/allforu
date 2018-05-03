@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clubs.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clubs.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('school_id', trans('quickadmin.clubs.fields.school').'', ['class' => 'control-label']) !!}
                    {!! Form::select('school_id', $schools, old('school_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('school_id'))
                        <p class="help-block">
                            {{ $errors->first('school_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.clubs.fields.name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('club-acronym', trans('quickadmin.clubs.fields.club-acronym').'what is', ['class' => 'control-label']) !!}
                    {!! Form::text('club-acronym', old('club-acronym'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('club-acronym'))
                        <p class="help-block">
                            {{ $errors->first('club-acronym') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.clubs.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('website', trans('quickadmin.clubs.fields.website').'', ['class' => 'control-label']) !!}
                    {!! Form::text('website', old('website'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('website'))
                        <p class="help-block">
                            {{ $errors->first('website') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('fb_page_url', trans('quickadmin.clubs.fields.fb-page-url').'', ['class' => 'control-label']) !!}
                    {!! Form::text('fb_page_url', old('fb_page_url'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fb_page_url'))
                        <p class="help-block">
                            {{ $errors->first('fb_page_url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ig_page_url', trans('quickadmin.clubs.fields.ig-page-url').'', ['class' => 'control-label']) !!}
                    {!! Form::text('ig_page_url', old('ig_page_url'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ig_page_url'))
                        <p class="help-block">
                            {{ $errors->first('ig_page_url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cover_img', trans('quickadmin.clubs.fields.cover-img').'', ['class' => 'control-label']) !!}
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
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('images', trans('quickadmin.clubs.fields.images').'', ['class' => 'control-label']) !!}
                    {!! Form::file('images[]', [
                        'multiple',
                        'class' => 'form-control file-upload',
                        'data-url' => route('admin.media.upload'),
                        'data-bucket' => 'images',
                        'data-filekey' => 'images',
                        ]) !!}
                    <p class="help-block"></p>
                    <div class="photo-block">
                        <div class="progress-bar form-group">&nbsp;</div>
                        <div class="files-list"></div>
                    </div>
                    @if($errors->has('images'))
                        <p class="help-block">
                            {{ $errors->first('images') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('home', trans('quickadmin.clubs.fields.home').'', ['class' => 'control-label']) !!}
                    {!! Form::select('home', $schools, old('home'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('home'))
                        <p class="help-block">
                            {{ $errors->first('home') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
    <script>
        $(function () {
            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();

                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'Club',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        _token: '{{ csrf_token() }}'
                    },
                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
                            $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                            $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                            if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                            }
                            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                        });
                        $parent.find('.progress-bar').hide().css(
                            'width',
                            '0%'
                        );
                    }
                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $parent.find('.progress-bar').show().css(
                        'width',
                        progress + '%'
                    );
                });
            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
                return false;
            });
        });
    </script>
@stop