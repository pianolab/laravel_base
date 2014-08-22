@if(!empty($attachment))
    <div id="attachment-{{ $attachment->id }}" class="attachment col-lg-3 col-md-4 col-xs-6">
        <div class="image thumbnail">
            {{ HTML::image($attachment->path(), null, [ 'class' => 'img-responsive' ]) }}
        </div>
        <div class="actions" data-id="{{ $attachment->id }}">
            <span class="attachment-remove btn btn-xs btn-danger">
                <i class="fa fa-trash-o"></i>
            </span>
            <span class="attachment-main btn btn-xs btn-default" data-column="main" data-value="{{ $attachment->is_main() }}">
                <i class="fa fa-{{ $attachment->is_main() ? 'check text-success' : 'times text-danger'}}"></i> {{ t('main') }}
            </span>
        </div>
        <p class="caption">{{ $attachment->origin_name }}</p>
    </div>
@endif
