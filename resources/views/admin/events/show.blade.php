@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.events.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.events.fields.name')</th>
                            <td field-key='name'>{{ $event->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.description')</th>
                            <td field-key='description'>{{ $event->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.website')</th>
                            <td field-key='website'>{{ $event->website }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.fb-page-url')</th>
                            <td field-key='fb_page_url'>{{ $event->fb_page_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.ig-page-url')</th>
                            <td field-key='ig_page_url'>{{ $event->ig_page_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.cover-img')</th>
                            <td field-key='cover_img'>@if($event->cover_img)<a
                                        href="{{ asset(env('UPLOAD_PATH').'/' . $event->cover_img) }}"
                                        target="_blank"><img
                                            src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $event->cover_img) }}"/></a>@endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.events.fields.images')</th>
                            <td field-key='images'> @foreach($event->getMedia('images') as $media)
                                    <p class="form-group">
                                        <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }}
                                            ({{ $media->size }} KB)</a>
                                    </p>
                                @endforeach</td>
                        </tr>
                        {{--<tr>--}}
                        {{--<th>@lang('quickadmin.events.fields.school')</th>--}}
                        {{--<td field-key='school'>{{ $event->school->name or '' }}</td>--}}
                        {{--</tr>--}}
                    </table>
                </div>
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab"
                                                          data-toggle="tab">Students</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="users">
                    <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <th>@lang('quickadmin.users.fields.email')</th>
{{--                            <th>@lang('quickadmin.users.fields.role')</th>--}}
                            <th>Event Auth Code</th>
{{--                            <th>@lang('quickadmin.users.fields.events')</th>--}}
                            <th>&nbsp;</th>

                        </tr>
                        </thead>

                        <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td field-key='name'>{{ $user->name }}</td>
                                    <td field-key='email'>{{ $user->email }}</td>
                                    <td field-key="auth-code">{{ $user_auth_codes[$user->id] }}</td>
                                    {{--<td field-key='role'>{{ $user->role->title or '' }}</td>--}}
                                    {{--<td field-key='clubs'>--}}
                                        {{--@foreach ($user->clubs as $singleClubs)--}}
                                            {{--<span class="label label-info label-many">{{ $singleClubs->name }}</span>--}}
                                        {{--@endforeach--}}
                                    {{--</td>--}}
                                    <td>
                                        @can('view')
                                            <a href="{{ route('users.show',[$user->id]) }}"
                                               class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                        @endcan
                                        @can('edit')
                                            <a href="{{ route('users.edit',[$user->id]) }}"
                                               class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                        @endcan
                                        @can('delete')
                                            {!! Form::open(array(
                                                                                    'style' => 'display: inline-block;',
                                                                                    'method' => 'DELETE',
                                                                                    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                    'route' => ['users.destroy', $user->id])) !!}
                                            {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.events.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
