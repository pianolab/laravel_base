@section('content')
    <h3>Posts <small>listing</small></h3>

    @if ($posts->isEmpty())
        No post yet, click {{ link_to_route('posts.create', 'here') }} to add
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Published at</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <th>{{ $post->title }}</th>
                    <th>{{ $post->published_at }}</th>
                    <th>{{ link_to_route('posts.edit', 'edit', $post->id) }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@stop
