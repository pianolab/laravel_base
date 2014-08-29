@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>{{ _t('posts') }} <small>{{ t('new') }}</small></h3>
        </div>
        <div class="col-md-4 text-right"> <br>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> {{ t('back') }}
            </a>
        </div>
    </div>
    <hr />

    @include('admin.posts.form', [ 'form_attributes' => [ 'id' => 'form-post', 'route' => 'admin.posts.store' ], 'submit_label' => t('submit_new', [ 'model' => _t('post') ]) ])
@stop
