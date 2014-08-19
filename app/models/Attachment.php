<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Attachment extends \Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'attachments';
    protected $softDelete = true;

    public function unique_name()
    {
        return strtolower(Str::random(8) . '-' . Str::random(4) . '-' . Str::random(4) . '-' . Str::random(4) . '-' . Str::random(12));
    }

    public function path()
    {
        return 'uploads/' . str_plural($this->parent_name) . '/' . $this->parent_id . '/' . $this->file_name;
    }
}
