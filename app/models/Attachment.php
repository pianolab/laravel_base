<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Attachment extends \Eloquent
{
    use SoftDeletingTrait, AttachmentTrait;

    protected $softDelete = true;
    protected $fillable = [ 'is_main', 'label' ];
}
