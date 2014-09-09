<?php

class BaseRepository implements RepositoryInterface
{
    public $my_name = 'Dados';
    public $perpage = 30;

    public function __construct(\Eloquent $model, \BaseValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    public function init($attributes = [])
    {
        $class_name = get_class($this->model);
        return new $class_name($attributes);
    }

    public function all()
    {
        return $this->model->paginate($this->perpage);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store($data)
    {
        $validator = $this->validator->store($data);

        if ($validator->success()) {
            $this->model = $this->init($data);

            if ($this->model->save()) {
                $validator->message( true, t('created_success', [ 'module' => _t($this->my_name) ]) );
            }
            else {
                $validator->message( false, t('created_error', [ 'module' => _t($this->my_name) ]) );
            } # endif;
        }
        else {
            $validator->message( false, t('created_error', [ 'module' => _t($this->my_name) ]) );
        } # endif;

        return $this;
    }

    public function update($id, $data)
    {
        $validator = $this->validator->update($data, $id);

        if ($validator->success()) {
            $this->model = $this->find($id);

            if ($this->model->update($data)) {
                $validator->message( true, t('updated_success', [ 'module' => _t($this->my_name) ]) );
            }
            else {
                $validator->message( false, t('updated_error', [ 'module' => _t($this->my_name) ]) );
            } # endif;
        }
        else {
            $validator->message( false, t('updated_error', [ 'module' => _t($this->my_name) ]) );
        } # endif;

        return $this;
    }

    public function destroy($id)
    {
        $validator = $this->validator->destroy();

        if ($validator->success()) {
            $this->model = $this->find($id);

            if ($this->model->delete()) {
                $validator->message( true, t('deleted_success', [ 'module' => _t($this->my_name) ]) );
            }
            else {
                $validator->message( false, t('deleted_error', [ 'module' => _t($this->my_name) ]) );
            } # endif;
        }
        else {
            $validator->message( false, t('updated_error', [ 'module' => _t($this->my_name) ]) );
        } # endif;

        return $this;
    }
}
