<?php

class AttachmentEloquentRepository extends BaseRepository
{
    public $MY_NAME = 'attachment';

    public function __construct(\Attachment $attachment, \AttachmentValidator $validator)
    {
        parent::__construct($attachment, $validator);
    }

}
