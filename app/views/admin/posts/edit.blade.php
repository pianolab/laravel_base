@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>{{ _t('posts') }} <small>{{ t('edit') }}</small></h3>
        </div>
        <div class="col-md-4 text-right"> <br>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> {{ t('back') }}
            </a>
        </div>
    </div>
    <hr />

    @include('admin.posts.form', [ 'form_attributes' => [ 'id' => 'form-post', 'route' => [ 'admin.posts.update', $post->id ], 'method' => 'put' ], 'submit_label' => t('submit_update', [ 'model' => _t('post') ]) ])
@stop
