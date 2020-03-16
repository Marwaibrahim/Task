<table class="table datatable">
    <thead>
        <tr>
            <th>@lang('global.user-actions.created_at')</th>
            <th>@lang('global.user-actions.fields.user')</th>
            <th>@lang('global.user-actions.fields.action')</th>
            <th>@lang('global.user-actions.fields.action-model')</th>
            <th>@lang('global.user-actions.fields.action-id')</th>
        </tr>
    </thead>

    <tbody>
        @if (count($user_actions) > 0)
            @foreach ($user_actions as $user_action)
                <tr>
                    <td>{{ $user_action->created_at or '' }}</td>
                    <td>{{ $user_action->user->name or '' }}</td>
                    <td>{{ $user_action->action }}</td>
                    <td>{{ $user_action->action_model }}</td>
                    <td>{{ $user_action->action_id }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>