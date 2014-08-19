@if(!empty($attachment))
    <div id="attachment-{{ $attachment->id }}" class="attachment col-lg-3 col-md-4 col-xs-6 thumb">
        <div class="image thumbnail">
            {{ HTML::image($attachment->path(), null, [ 'class' => 'img-responsive' ]) }}
        </div>
        <div class="actions">
            <span class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-attachment-{{ $attachment->id }}">
                <i class="fa fa-trash-o"></i>
            </span>
        </div>
        <p class="caption">{{ $attachment->origin_name }}</p>
    </div>
@endif
