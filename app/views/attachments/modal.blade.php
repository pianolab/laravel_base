<!-- Modal -->
<div class="modal fade" id="delete-attachment-{{ $attachment->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title modal-title-delete">{{ t('Atention') }}!</h3>
            </div>
            <div class="modal-body">
                {{ t('confirm_remove_image', [ 'image' => $attachment->origin_name ]) }}
            </div>
            <div class="modal-footer">
                {{ Form::open([ 'route' => [ 'attachments.destroy', 'posts', $post->id, $attachment->id ], 'method' => 'delete' ]) }}
                    <button type="button" class="btn btn-default btn-modal-close" data-dismiss="modal">{{ t('cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ t('remove') }}</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
