<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent
{
	use SoftDeletingTrait;
	protected $fillable = [ 'title', 'published_at', 'content' ];

    public function images()
    {
        return $this->hasMany('Attachment', 'parent_id')
            ->where('parent_name', 'post')->orderBy('created_at', 'desc');
    }
}
