<?php

class AttachmentEloquentRepository extends BaseRepository
{
    public $my_name = 'attachment';
    public $perpage = 30;

    public function __construct(\Attachment $attachment, \AttachmentValidator $validator)
    {
        parent::__construct($attachment, $validator);
    }
}
