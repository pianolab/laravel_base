<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Comment extends \Eloquent
{
    use SoftDeletingTrait, AttachmentTrait;

    protected $softDelete = true;
    protected $fillable = [ 'user_id', 'parent_id', 'parent_name', 'content' ];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
