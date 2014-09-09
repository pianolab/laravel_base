<?php

class AttachmentValidator extends \BaseValidator
{
    protected function main($data, $id = false)
    {
        $rules = [ 'content' => 'required' ];

        return parent::validate($data, $rules);
    }
}
