@section('content')
    <h3>{{ t('Posts') }} <small>{{ t('listing') }}</small></h3>

    @if ($posts->isEmpty())
        {{ t('notfound', [ 'model' => 'post', 'link' => link_to_route('posts.create', 'here') ]) }}
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ t('Title') }}</th>
                    <th>{{ t('Published at') }}</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <th>{{ $post->title }}</th>
                    <th>{{ $post->published_at }}</th>
                    <th class="text-right">
                        {{ link_to_route('posts.edit', '', $post->id, [ 'class' => 'btn btn-sm btn-warning fa fa-edit', 'data-title' => 'Edit' ]) }}
                        {{ link_to('#', '', [ 'data-target' => '#delete-post-' . $post->id, 'data-toggle' => 'modal', 'data-title' => 'Delete', 'class' => 'btn btn-sm btn-danger fa fa-trash-o' ]) }}
                    </th>
                    <!-- Modal -->
                    <div class="modal fade" id="delete-post-{{ $post->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <h3 class="modal-title modal-title-delete">{{ t('Atention') }}!</h3>
                                </div>
                                <div class="modal-body">{{ t('Are sure you want to delete?') }}</div>
                                <div class="modal-footer">
                                    {{ Form::open(['route' => [ 'posts.update', $post->id ], 'method' => 'delete']) }}
                                        <button type="button" class="btn btn-default btn-modal-close" data-dismiss="modal">{{ t('cancel') }}</button>
                                        <button type="submit" class="btn btn-danger">{{ t('delete') }}</button>
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    @endif
@stop
