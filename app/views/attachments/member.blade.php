@if(!empty($attachment))
    <div id="attachment-{{ $attachment->id }}" class="attachment col-lg-3 col-md-4 col-xs-6">
        <div class="image thumbnail">
            {{ HTML::image($attachment->path(), null, [ 'class' => 'img-responsive' ]) }}
        </div>
        <div class="actions">
            <span data-id="{{ $attachment->id }}" class="attachment-remove btn btn-xs btn-danger">
                <i class="fa fa-trash-o"></i>
            </span>
        </div>
        <p class="caption">{{ $attachment->origin_name }}</p>
    </div>
@endif
