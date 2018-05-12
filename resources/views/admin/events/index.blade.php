@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>
{{--    @can('club_create')--}}
        <p>
            <a href="{{ route('admin.events.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>
    {{--@endcan--}}

    @can('club_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.events.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.events.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($events) > 0 ? 'datatable' : '' }} @can('club_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('club_delete')
                        @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                    @endcan

                    <th>@lang('quickadmin.events.fields.name')</th>
                    <th>@lang('quickadmin.events.fields.description')</th>
                    <th>@lang('quickadmin.events.fields.cover-img')</th>
                    <th>@lang('quickadmin.events.fields.start-date')</th>
                    <th>@lang('quickadmin.events.fields.end-date')</th>
                    <th>@lang('quickadmin.events.fields.public')</th>
                    <th>@lang('quickadmin.events.fields.address')</th>
                    <th>@lang('quickadmin.events.fields.address_description')</th>
                    <th>@lang('quickadmin.events.fields.peak-period')</th>
                    <th>@lang('quickadmin.events.fields.participants')</th>
                    <th>@lang('quickadmin.events.fields.itinerary')</th>
                    <th>@lang('quickadmin.events.fields.notes')</th>
                    <th>@lang('quickadmin.events.fields.free')</th>
                    <th>@lang('quickadmin.events.fields.require-sponsorships')</th>
                    <th>@lang('quickadmin.events.fields.require-snacks-sponsorship')</th>
                    <th>@lang('quickadmin.events.fields.require-stationary-sponsorship')</th>
                    <th>@lang('quickadmin.events.fields.require-facial-sponsorship')</th>
                    <th>@lang('quickadmin.events.fields.require-cash-sponsorship')</th>
                    <th>@lang('quickadmin.events.fields.require-shirt-vendor')</th>
                    <th>@lang('quickadmin.events.fields.require-food-vendor')</th>
                    <th>@lang('quickadmin.events.fields.require-games-vendor')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-display-poster')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-display-standees')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-display-tv')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-fb-likeandshare')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-fb-review')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-ig')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-google')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-afu')</th>
                    <th>@lang('quickadmin.events.fields.sponsor-fulfillment-booth')</th>
                    <th>@lang('quickadmin.events.fields.images')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($events) > 0)
                    @foreach ($events as $event)
                        <tr data-entry-id="{{ $event->id }}">
                            @can('club_delete')
                                @if ( request('show_deleted') != 1 )<td></td>@endif
                            @endcan

                            <td field-key='name'>{{ $event->name }}</td>
                            <td field-key='description'>{{ $event->description }}</td>
                            <td field-key='cover_img'>@if($event->cover_img)<a href="{{ asset(env('UPLOAD_PATH').'/' . $event->cover_img) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $event->cover_img) }}"/></a>@endif</td>
                            <td field-key='start_date'>{{ $event->start_date or '' }}</td>
                            <td field-key='end_date'>{{ $event->end_date or '' }}</td>
                            @if ($event->public == 1)
                                <td field-key='public'>Yes</td>
                            @else
                                <td field-key='public'>No</td>
                            @endif
                            <td field-key='address'>{{ $event->address or '' }}</td>
                            <td field-key='address_description'>{{ $event->address_description or '' }}</td>
                            <td field-key='peak_period'>{{ $event->peak_period or '' }}</td>
                            <td field-key='participants'>{{ $event->participants or '' }}</td>
                            <td field-key='itinerary'>{{ $event->itinerary or '' }}</td>
                            <td field-key='notes'>{{ $event->notes or '' }}</td>
                            @if ($event->free == 1)
                                <td field-key='free'>Yes</td>
                            @else
                                <td field-key='free'>No</td>
                            @endif
                            <td field-key='require_sponsorships'>{{ $event->require_sponsorships or '' }}</td>
                            <td field-key='require_snacks_sponsorship'>{{ $event->require_snacks_sponsorship or '' }}</td>
                            <td field-key='require_stationary_sponsorship'>{{ $event->require_stationary_sponsorship or '' }}</td>
                            <td field-key='require_facial_sponsorship'>{{ $event->require_facial_sponsorship or '' }}</td>
                            <td field-key='require_cash_sponsorship'>{{ $event->require_cash_sponsorship or '' }}</td>
                            <td field-key='require_shirt_vendor'>{{ $event->require_shirt_vendor or '' }}</td>
                            <td field-key='require_food_vendor'>{{ $event->require_food_vendor or '' }}</td>
                            <td field-key='require_games_vendor'>{{ $event->require_games_vendor or '' }}</td>
                            <td field-key='sponsor_fulfillment_display_poster'>{{ $event->sponsor_fulfillment_display_poster or '' }}</td>
                            <td field-key='sponsor_fulfillment_display_standees'>{{ $event->sponsor_fulfillment_display_standees or '' }}</td>
                            <td field-key='sponsor_fulfillment_display_tv'>{{ $event->sponsor_fulfillment_display_tv or '' }}</td>
                            <td field-key='sponsor_fulfillment_fb_likeandshare'>{{ $event->sponsor_fulfillment_fb_likeandshare or '' }}</td>
                            <td field-key='sponsor_fulfillment_fb_review'>{{ $event->sponsor_fulfillment_fb_review or '' }}</td>
                            <td field-key='sponsor_fulfillment_ig'>{{ $event->sponsor_fulfillment_ig or '' }}</td>
                            <td field-key='sponsor_fulfillment_google'>{{ $event->sponsor_fulfillment_google or '' }}</td>
                            <td field-key='sponsor_fulfillment_afu'>{{ $event->sponsor_fulfillment_afu or '' }}</td>
                            <td field-key='sponsor_fulfillment_booth'>{{ $event->sponsor_fulfillment_booth or '' }}</td>
                                <td field-key='images'> @foreach($event->getMedia('images') as $media)
                                        <p class="form-group">
                                            <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                        </p>
                                    @endforeach</td>
                            @if( request('show_deleted') == 1 )
                                <td>
                                    {{--@can('club_delete')--}}
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.events.restore', $event->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    {{--@endcan--}}
                                    @can('event_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.events.perma_del', $event->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    {{--@can('club_view')--}}
                                        <a href="{{ route('admin.events.show',[$event->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    {{--@endcan--}}
{{--                                    @can('club_edit')--}}
                                        <a href="{{ route('admin.events.edit',[$event->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    {{--@endcan--}}
                                    @can('event_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.events.destroy', $event->id])) !!}
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
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.events.mass_destroy') }}'; @endif
        @endcan
    </script>
@endsection