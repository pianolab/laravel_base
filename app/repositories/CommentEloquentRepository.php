<?php

class CommentEloquentRepository extends BaseRepository
{
    public $MY_NAME = 'comment';

    public function __construct(\Comment $comment, \CommentValidator $validator)
    {
        parent::__construct($comment, $validator);
    }
}
