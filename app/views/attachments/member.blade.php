@if(!empty($attachment))
    <div id="attachment-{{ $attachment->id }}" class="attachment col-lg-3 col-md-4 col-xs-6">
        {{ $attachment->show() }}
        <div class="actions" data-id="{{ $attachment->id }}">
            @if(isset($remove))
                <span class="attachment-remove btn btn-xs btn-danger">
                    <i class="fa fa-trash-o"></i>
                </span>
            @endif
            @if(isset($download_button))
                {{ $attachment->download_button() }}
            @endif

            @if(isset($comment_button))
                {{ $attachment->comment_button() }}
            @endif

            @if(isset($parent_route))
                {{ $attachment->parent_button($parent_route) }}
            @endif

            @if(isset($main))
                <span class="attachment-main btn btn-xs btn-default" data-current-value="{{ $attachment->is_main() }}">
                    <i class="fa fa-{{ $attachment->is_main() ? 'check text-success' : 'times text-danger'}}"></i> {{ t('main') }}
                </span>
            @endif
        </div>
        @if(isset($label))
            <p class="fields" data-id="{{ $attachment->id }}">
                <input type="text" class="attachment-label form-control input-xs" value="{{ $attachment->label }}" />
            </p>
        @endif
        <p class="caption">{{ $attachment->origin_name }}</p>
    </div>
@endif
