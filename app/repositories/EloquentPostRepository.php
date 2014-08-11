<?php

class EloquentPostRepository
{
    protected function isValid($data, $id = false)
    {
        $return = false;

        $rules = [
            'title' => 'required|max:255|unique:posts' . ($id ? ',title,' . $id : null),
            'content' => 'required',
            'published_at' => 'required|date',
        ];

        $validator = Validator::make($data, $rules);
        $validator->passes() ? $return = true : $this->errors = $validator->messages();

        return $return;
    }

    public function all($perpage = 15)
    {
        return DB::table('posts')->paginate(15);
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
                return Redirect::route('posts.edit', $post->id)->with('success', 'Post was successfully saved');
            }
            else {
                return Redirect::back()->withInput()->with('error', 'Data can\'t be saved, please try again');
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
                return Redirect::route('posts.edit', $post->id)->with('success', 'Post was successfully updated');
            }
            else {
                return Redirect::back()->withInput()->with('error', 'Data can\'t be saved, please try again');
            } # endif;
        }
        else {
            return Redirect::back()->withErrors($this->errors)->withInput();
        } # endif;
    }
}
