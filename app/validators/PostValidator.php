<?php

class PostValidator extends \BaseValidator
{
    public function main($data, $id = false)
    {
        $return = false;

        $rules = [
            'title' => 'required|max:255|unique:posts,title,' . ($id ?: 'NULL') . ',id,deleted_at,NULL',
            'content' => 'required',
            'published_at' => 'required|date',
        ];

        return parent::validate($data, $rules);
    }
}
