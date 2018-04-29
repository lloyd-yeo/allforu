@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schools.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.schools.fields.name')</th>
                            <td field-key='name'>{{ $school->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.acronym')</th>
                            <td field-key='acronym'>{{ $school->acronym }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.cover-img')</th>
                            <td field-key='cover_img'>@if($school->cover_img)<a href="{{ asset(env('UPLOAD_PATH').'/' . $school->cover_img) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $school->cover_img) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#clubs" aria-controls="clubs" role="tab" data-toggle="tab">Clubs</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="clubs">
<table class="table table-bordered table-striped {{ count($clubs) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.clubs.fields.name')</th>
                        <th>@lang('quickadmin.clubs.fields.description')</th>
                        <th>@lang('quickadmin.clubs.fields.website')</th>
                        <th>@lang('quickadmin.clubs.fields.fb-page-url')</th>
                        <th>@lang('quickadmin.clubs.fields.ig-page-url')</th>
                        <th>@lang('quickadmin.clubs.fields.cover-img')</th>
                        <th>@lang('quickadmin.clubs.fields.school')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($clubs) > 0)
            @foreach ($clubs as $club)
                <tr data-entry-id="{{ $club->id }}">
                    <td field-key='name'>{{ $club->name }}</td>
                                <td field-key='description'>{{ $club->description }}</td>
                                <td field-key='website'>{{ $club->website }}</td>
                                <td field-key='fb_page_url'>{{ $club->fb_page_url }}</td>
                                <td field-key='ig_page_url'>{{ $club->ig_page_url }}</td>
                                <td field-key='cover_img'>@if($club->cover_img)<a href="{{ asset(env('UPLOAD_PATH').'/' . $club->cover_img) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $club->cover_img) }}"/></a>@endif</td>
                                <td field-key='images'>@if($club->images)<a href="{{ asset(env('UPLOAD_PATH').'/' . $club->images) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $club->images) }}"/></a>@endif</td>
                                <td field-key='school'>{{ $club->school->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['clubs.restore', $club->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['clubs.perma_del', $club->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('clubs.show',[$club->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('clubs.edit',[$club->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['clubs.destroy', $club->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.schools.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
