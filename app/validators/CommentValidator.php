<?php

class CommentValidator extends \BaseValidator
{
    public function main($data, $id = false)
    {
        $return = false;

        $rules = [
            'parent_id' => 'required',
            'parent_name' => 'required',
            'content' => 'required',
        ];

        return parent::validate($data, $rules);
    }
}
