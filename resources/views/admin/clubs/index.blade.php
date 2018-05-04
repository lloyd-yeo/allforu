@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clubs.title')</h3>
    @can('club_create')
    <p>
        <a href="{{ route('admin.clubs.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

    </p>
    @endcan

    @can('club_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.clubs.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.clubs.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($clubs) > 0 ? 'datatable' : '' }} @can('club_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('club_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.clubs.fields.name')</th>
                        <th>@lang('quickadmin.clubs.fields.club-acronym')</th>
                        <th>@lang('quickadmin.clubs.fields.description')</th>
                        <th>@lang('quickadmin.clubs.fields.website')</th>
                        <th>@lang('quickadmin.clubs.fields.fb-page-url')</th>
                        <th>@lang('quickadmin.clubs.fields.ig-page-url')</th>
                        <th>@lang('quickadmin.clubs.fields.cover-img')</th>
                        <th>@lang('quickadmin.clubs.fields.images')</th>
                        <th>@lang('quickadmin.clubs.fields.school')</th>
                        <th>@lang('quickadmin.clubs.fields.organisation')</th>
                        <th>@lang('quickadmin.clubs.fields.organisation-acronym')</th>
                        <th>@lang('quickadmin.clubs.fields.referred-by')</th>
                        <th>@lang('quickadmin.clubs.fields.classification')</th>
                        <th>@lang('quickadmin.clubs.fields.category-1')</th>
                        <th>@lang('quickadmin.clubs.fields.category-2')</th>
                        <th>@lang('quickadmin.clubs.fields.usual-activity')</th>
                        <th>@lang('quickadmin.clubs.fields.opportunity-1')</th>
                        <th>@lang('quickadmin.clubs.fields.opportunity-2')</th>
                        <th>@lang('quickadmin.clubs.fields.opportunity-3')</th>
                        <th>@lang('quickadmin.clubs.fields.news-1')</th>
                        <th>@lang('quickadmin.clubs.fields.news-2')</th>
                        <th>@lang('quickadmin.clubs.fields.news-3')</th>
                        <th>@lang('quickadmin.clubs.fields.catchphrase')</th>
                        <th>@lang('quickadmin.clubs.fields.events-per-year')</th>
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
                                @can('club_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='name'>{{ $club->name }}</td>
                                <td field-key='club_acronym'>{{ $club->club_acronym or '' }}</td>
                                <td field-key='description'>{{ $club->description }}</td>
                                <td field-key='website'>{{ $club->website }}</td>
                                <td field-key='fb_page_url'>{{ $club->fb_page_url }}</td>
                                <td field-key='ig_page_url'>{{ $club->ig_page_url }}</td>
                                <td field-key='cover_img'>@if($club->cover_img)<a href="{{ asset(env('UPLOAD_PATH').'/' . $club->cover_img) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $club->cover_img) }}"/></a>@endif</td>
                                <td field-key='images'> @foreach($club->getMedia('images') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                                <td field-key='school'>{{ $club->school->name or '' }}</td>
                                <td field-key='organisation'>{{ $club->organisation or '' }}</td>
                                <td field-key='organisation_acronym'>{{ $club->organisation_acronym or '' }}</td>
                                <td field-key='referred_by'>{{ $referred_by->slice($club->referred_by, 1) or '' }}</td>
                                <td field-key='classification'>{{ $society_classification->slice($club->classification, 1) or '' }}</td>
                                <td field-key='category_1'>{{ $society_category->values()->get($club->category_1) or '' }}</td>
                                <td field-key='category_2'>{{ $society_category->slice($club->category_2, 1) or '' }}</td>
                                <td field-key='usual_activity'>{{ $club->usual_activity or '' }}</td>
                                <td field-key='opportunity_1'>{{ $club->opportunity_1 or '' }}</td>
                                <td field-key='opportunity_2'>{{ $club->opportunity_2 or '' }}</td>
                                <td field-key='opportunity_3'>{{ $club->opportunity_3 or '' }}</td>
                                <td field-key='news_1'>{{ $club->news()->where('order','1')->first()->description or '' }}</td>
                                <td field-key='news_2'>{{ $club->news()->where('order','2')->first()->description or '' }}</td>
                                <td field-key='news_3'>{{ $club->news()->where('order','3')->first()->description or '' }}</td>
                                <td field-key='catchphrase'>{{ $club->catchphrase or '' }}</td>
                                <td field-key='events_per_year'>{{ $club->events_per_year or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('club_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clubs.restore', $club->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('club_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clubs.perma_del', $club->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('club_view')
                                    <a href="{{ route('admin.clubs.show',[$club->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('club_edit')
                                    <a href="{{ route('admin.clubs.edit',[$club->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('club_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.clubs.destroy', $club->id])) !!}
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
@stop

@section('javascript')
    <script>
        @can('club_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.clubs.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection