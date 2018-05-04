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
                    {!! Form::label('name', 'Society\'s Full '.trans('quickadmin.clubs.fields.name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('club_acronym', trans('quickadmin.clubs.fields.club-acronym').'', ['class' => 'control-label']) !!}
                    {!! Form::text('club_acronym', old('club_acronym'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('club_acronym'))
                        <p class="help-block">
                            {{ $errors->first('club_acronym') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('organisation', 'Main '.trans('quickadmin.clubs.fields.organisation').' you are serving', ['class' => 'control-label']) !!}
                    {!! Form::text('organisation', old('organisation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('organisation'))
                        <p class="help-block">
                            {{ $errors->first('organisation') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('organisation_acronym', 'Acronym of organisation you are serving', ['class' => 'control-label']) !!}
                    {!! Form::text('organisation_acronym', old('organisation_acronym'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('organisation_acronym'))
                        <p class="help-block">
                            {{ $errors->first('organisation_acronym') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('referred_by', 'How do you first know about us?', ['class' => 'control-label']) !!}
                    {!! Form::select('referred_by', $referred_by, old('referred_by'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('referred_by'))
                        <p class="help-block">
                            {{ $errors->first('referred_by') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('classification', trans('quickadmin.clubs.fields.classification').' of Society', ['class' => 'control-label']) !!}
                    {!! Form::select('classification', $society_classification, old('classification'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('classification'))
                        <p class="help-block">
                            {{ $errors->first('classification') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('category_1', trans('quickadmin.clubs.fields.category-1').' of Society', ['class' => 'control-label']) !!}
                    {!! Form::select('category_1', $society_category, old('category_1'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_1'))
                        <p class="help-block">
                            {{ $errors->first('category_1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('category_2', trans('quickadmin.clubs.fields.category-2').' of Society', ['class' => 'control-label']) !!}
                    {!! Form::select('category_2', $society_category, old('category_2'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_2'))
                        <p class="help-block">
                            {{ $errors->first('category_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'How will you describe your club profile to interest members to join', ['class' => 'control-label']) !!}
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
                    {!! Form::label('usual_activity', 'What are the usual activity for your clubs?', ['class' => 'control-label']) !!}
                    {!! Form::text('usual_activity', old('usual_activity'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('usual_activity'))
                        <p class="help-block">
                            {{ $errors->first('usual_activity') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('opportunity_1', 'What is the TOP opportunity that will benefit the student should they join up with your club', ['class' => 'control-label']) !!}
                    {!! Form::text('opportunity_1', old('opportunity_1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('opportunity_1'))
                        <p class="help-block">
                            {{ $errors->first('opportunity_1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('opportunity_2', 'What is the 2nd opportunity that will benefit the student should they join up with your club', ['class' => 'control-label']) !!}
                    {!! Form::text('opportunity_2', old('opportunity_2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('opportunity_2'))
                        <p class="help-block">
                            {{ $errors->first('opportunity_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('opportunity_3', 'What is the 3rd opportunity that will benefit the student should they join up with your club', ['class' => 'control-label']) !!}
                    {!! Form::text('opportunity_3', old('opportunity_3'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('opportunity_3'))
                        <p class="help-block">
                            {{ $errors->first('opportunity_3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('news_1', 'What is the TOP news highlight that you will want to share with your members when they first join your club?', ['class' => 'control-label']) !!}
                    {!! Form::text('news_1', old('news_1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('news_1'))
                        <p class="help-block">
                            {{ $errors->first('news_1') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('news_2', 'What is the 2nd top news highlight that you will want to share with your members when they first join your club?', ['class' => 'control-label']) !!}
                    {!! Form::text('news_2', old('news_2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('news_2'))
                        <p class="help-block">
                            {{ $errors->first('news_2') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('news_3', 'What is the 3rd top news highlight that you will want to share with your members when they first join your club?', ['class' => 'control-label']) !!}
                    {!! Form::text('news_3', old('news_3'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('news-3'))
                        <p class="help-block">
                            {{ $errors->first('news_3') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('catchphrase', 'Write a one liner attention seeking catch-phrase for your club', ['class' => 'control-label']) !!}
                    {!! Form::text('catchphrase', old('catchphrase'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('catchphrase'))
                        <p class="help-block">
                            {{ $errors->first('catchphrase') }}
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
                    {!! Form::label('events_per_year', 'What are the number of events you have in a year?', ['class' => 'control-label']) !!}
                    {!! Form::text('events_per_year', old('events_per_year'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('events_per_year'))
                        <p class="help-block">
                            {{ $errors->first('events_per_year') }}
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