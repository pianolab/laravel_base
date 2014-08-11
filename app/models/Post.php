<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent
{
	use SoftDeletingTrait;
	protected $fillable = [ 'title', 'published_at', 'content' ];
}
