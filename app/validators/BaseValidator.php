<?php

class BaseValidator extends \Validator
{
    private $model;
    private $success = false;

    protected function validate($data, $rules)
    {
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

    protected function main($data, $id = false)
    {
        return $this->validate($data, []);
    }

    public function store($data)
    {
        return $this->main($data);
    }

    public function update($data, $id)
    {
        return $this->main($data, $id);
    }

    public function destroy()
    {
        return parent::validate([], []);
    }
}
