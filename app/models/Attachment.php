<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Attachment extends \Eloquent
{
    use SoftDeletingTrait, AttachmentTrait;

    protected $softDelete = true;
    protected $fillable = [ 'is_main', 'label' ];

    public function comments()
    {
        return $this->hasMany('Comment', 'parent_id')
            ->where('parent_name', 'attachment')->orderBy('created_at', 'desc');
    }
}
