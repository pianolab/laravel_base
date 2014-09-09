<?php

class PostEloquentRepository extends BaseRepository
{
    public $MY_NAME = 'post';

    public function __construct(\Post $post, \PostValidator $validator)
    {
        parent::__construct($post, $validator);
    }
}
