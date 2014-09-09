<?php

class CommentValidator extends \BaseValidator
{
    protected function main($data, $id = false)
    {
        $rules = [
            'parent_id' => 'required',
            'parent_name' => 'required',
            'content' => 'required',
        ];

        return parent::validate($data, $rules);
    }
}
