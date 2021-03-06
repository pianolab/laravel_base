@if(!empty($attachment))
    <div id="attachment-{{ $attachment->id }}" class="attachment col-lg-3 col-md-4 col-xs-6">
        {{ $attachment->show() }}
        @if (isset($actions))
            <div class="actions" data-id="{{ $attachment->id }}">
                <span class="attachment-remove btn btn-xs btn-danger">
                    <i class="fa fa-trash-o"></i>
                </span>
                {{ $attachment->download_button() }}

                {{ $attachment->comment_button() }}

                <span class="attachment-main btn btn-xs btn-default" data-current-value="{{ $attachment->is_main() }}">
                    <i class="fa fa-{{ $attachment->is_main() ? 'check text-success' : 'times text-danger'}}"></i> {{ t('main') }}
                </span>
            </div>
            <p class="fields" data-id="{{ $attachment->id }}">
                <input type="text" class="attachment-label form-control input-xs" value="{{ $attachment->label }}" />
            </p>
        @endif
        <p class="caption">{{ $attachment->origin_name }}</p>
    </div>
@endif
