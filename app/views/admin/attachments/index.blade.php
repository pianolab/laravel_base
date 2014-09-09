@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>{{ _t('attachments') }} <small>{{ t('listing') }}</small></h3>
        </div>
    </div>

    @if ($attachments->isEmpty())
        {{ t('No attachments found') }}
    @else
        <table id="attachments" class="table table-hover">
            <thead>
                <tr>
                    <th>{{ _t('file name') }}</th>
                    <th>{{ _t('parent name') }}</th>
                    <th>{{ _t('created at') }}</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($attachments as $key => $attachment)
                <tr>
                    <th>{{ $attachment->origin_name }}</th>
                    <th>{{ _t($attachment->parent_name) }}</th>
                    <th>{{ $attachment->created_at }}</th>
                    <th class="text-right">
                        {{ link_to($attachment->comment_path(), '', [ 'class' => 'btn btn-sm btn-info fa fa-eye', 'data-title' => t('view') ]) }}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $attachments->links() }}
    @endif
@stop
