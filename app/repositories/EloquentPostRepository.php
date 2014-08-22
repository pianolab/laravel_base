<?php

class EloquentPostRepository
{
    static protected $name = 'Post';

    protected function isValid($data, $id = false)
    {
        $return = false;

        $rules = [
            'title' => 'required|max:255|unique:posts,title,' . ($id ?: 'NULL') . ',id,deleted_at,NULL',
            'content' => 'required',
            'published_at' => 'required|date',
        ];

        $validator = Validator::make($data, $rules);
        $validator->passes() ? $return = true : $this->errors = $validator->messages();

        return $return;
    }

    public function all($perpage = 2)
    {
        return Post::paginate($perpage);
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function store($data)
    {
        if ($this->isValid($data)) {
            $post = new Post($data);
            if ($post->save()) {
                return Redirect::route('posts.edit', $post->id)->with('success', t('success_created', [ 'module' => t(self::$name) ]));
            }
            else {
                return Redirect::back()->withInput()->with('danger', t('error_created', [ 'module' => t(self::$name) ]));
            } # endif;
        }
        else {
            return Redirect::back()->withErrors($this->errors)->withInput();
        } # endif;
    }

    public function update($id, $data)
    {
        if ($this->isValid($data, $id)) {
            $post = Post::find($id);
            if ($post->update($data)) {
                return Redirect::route('posts.edit', $post->id)->with('success', t('success_updated', [ 'module' => t(self::$name) ]));
            }
            else {
                return Redirect::back()->withInput()->with('danger', t('error_updated', [ 'module' => t(self::$name) ]));
            } # endif;
        }
        else {
            return Redirect::back()->withErrors($this->errors)->withInput();
        } # endif;
    }

    public function destroy($id)
    {
        if (Post::find($id)->delete()) {
            return Redirect::route('posts.index')->with('success', t('success_deleted', [ 'module' => t(self::$name) ]));
        }
        else {
            return Redirect::back()->withInput()->with('error', t('error_deleted', [ 'module' => t(self::$name) ]));
        } # endif;
    }
}
