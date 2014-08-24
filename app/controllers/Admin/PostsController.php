<?php

namespace Admin;

class PostsController extends BaseController
{
    public function __construct(\EloquentPostRepository $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $this->layout->content = \View::make('admin.posts.index')->with('posts', $this->post->all());
    }

    public function create()
    {
        $this->layout->content = \View::make('admin.posts.create')->with('post', new \Post);
    }

    public function store()
    {
        return $this->post->store(\Input::except('_method', '_token'));
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        $this->layout->content = \View::make('admin.posts.edit')->with('post', $post);
    }

    public function update($id)
    {
        return $this->post->update($id, \Input::except('_method', '_token'));
    }

    public function destroy($id)
    {
        return $this->post->destroy($id);
    }
}
