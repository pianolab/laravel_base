<?php

namespace Admin;

class PostsController extends BaseController
{
    public function __construct(\PostEloquentRepository $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $post = $this->post->all();
        $this->layout->content = \View::make('admin.posts.index')->with('posts', $post);
    }

    public function create()
    {
        $post = $this->post->init();
        $this->layout->content = \View::make('admin.posts.create')->with('post', $post);
    }

    public function store()
    {
        $created = $this->post->store(\Input::except('_method', '_token'));

        if ($created->validator->success()) {
            return \Redirect::route('admin.posts.edit', $created->model->id)->with('success', $created->validator->message);
        }
        else {
            return \Redirect::back()->withErrors($created->validator->errors)->withInput();
        } # endif;
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        $this->layout->content = \View::make('admin.posts.edit')->with('post', $post);
    }

    public function update($id)
    {
        $updated = $this->post->update($id, \Input::except('_method', '_token'));

        if ($updated->validator->success()) {
            return \Redirect::route('admin.posts.index')->with('success', $updated->validator->message);
        }
        else {
            return \Redirect::back()->withErrors($updated->validator->errors)->withInput();
        } # endif;
    }

    public function destroy($id)
    {
        $destroyed = $this->post->destroy($id);

        if ($destroyed->validator->success()) {
            return \Redirect::route('admin.posts.index')->with('success', $destroyed->validator->message);
        }
        else {
            return \Redirect::back()->with('danger', $destroyed->validator->message);
        } # endif;
    }
}
