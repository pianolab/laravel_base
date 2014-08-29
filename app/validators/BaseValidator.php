<?php

class BaseValidator extends \Validator
{
    private $model;
    private $success = false;

    protected function validate($data, $rules)
    {
        $return = false;

        $validator = self::make($data, $rules);

        $this->success = $validator->passes();

        if (!$this->success) {
            $this->errors = $validator->messages();
        }
        return $this;
    }

    public function success()
    {
        return $this->success;
    }

    public function message($success, $message = null)
    {
        $this->success = $success;
        $this->message = $message;
    }
}
