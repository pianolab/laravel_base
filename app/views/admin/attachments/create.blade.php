@section('content')
    @include('admin.attachments.member', [ 'attachment' => $attachment, 'actions' => true ])
@stop
