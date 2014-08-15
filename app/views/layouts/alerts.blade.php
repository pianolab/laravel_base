 @if($errors->has())
     <div class="alert alert-block alert-danger fade in">
        <button data-dismiss="alert" class="close" type="button">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ t('Error') }}!</strong></br>
        @foreach ($errors->all() as $error)
            {{ $error }}</br>
        @endforeach
    </div>
@endif

<?php $alerts = [];
if (Session::has('info')) $alerts['info'] = Session::get('info');
if (Session::has('danger')) $alerts['danger'] = Session::get('danger');
if (Session::has('success')) $alerts['success'] = Session::get('success');
if (Session::has('warning')) $alerts['warning'] = Session::get('warning'); ?>

@if(!empty($alerts))
    @foreach ($alerts as $type => $message)
        <div class="alert alert-{{ $type }} fade in">
            <button data-dismiss="alert" class="close" type="button">
                <i class="fa fa-times"></i>
            </button>
            <strong>{{ t('Success') }}! </strong>{{ $message }}
        </div>
    @endforeach
@endif
