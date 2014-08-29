<?php

class BaseRepository implements RepositoryInterface
{
    public $MY_NAME = 'data';

    public function __construct(\Eloquent $model, \BaseValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    public function all($perpage = 15)
    {
        return $this->model->paginate($perpage);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        $validator = $this->validator->main($data);

        if ($validator->success()) {
            $model = $this->model->create($data);
            if ($model) {
                $validator->id = $model->id;
                $validator->message( true, _t('created_success', [ 'module' => t($this->MY_NAME) ]) );
            }
            else {
                $validator->message( false, _t('created_error', [ 'module' => t($this->MY_NAME) ]) );
            } # endif;
        }
        else {
            $validator->message( false, _t('created_error', [ 'module' => t($this->MY_NAME) ]) );
        } # endif;

        return $validator;
    }

    public function update($id, $data)
    {
        $validator = $this->validator->main($data, $id);

        if ($validator->success()) {
            $model = $this->find($id);

            if ($model->update($data)) {
                $validator->message( true, _t('updated_success', [ 'module' => t($this->MY_NAME) ]) );
            }
            else {
                $validator->message( false, _t('updated_error', [ 'module' => t($this->MY_NAME) ]) );
            } # endif;
        }
        else {
            $validator->message( false, _t('updated_error', [ 'module' => t($this->MY_NAME) ]) );
        } # endif;

        return $validator;
    }

    public function destroy($id)
    {
        $validator = $this->validator;

        if ($this->model->find($id)->delete()) {
            $validator->message( true, _t('deleted_success', [ 'module' => t($this->MY_NAME) ]) );
        }
        else {
            $validator->message( false, _t('deleted_error', [ 'module' => t($this->MY_NAME) ]) );
        } # endif;

        return $validator;
    }
}
