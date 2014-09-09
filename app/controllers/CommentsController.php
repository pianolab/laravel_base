<?php

class CommentsController extends \BaseController
{
    public function __construct(\CommentEloquentRepository $comment)
    {
        $this->comment = $comment;
    }

    public function store()
    {
        $attributes = [ 'user_id' => Auth::user()->id, 'parent_name' => 'attachment',  ] + \Input::except('_method', '_token');
        $created = $this->comment->store($attributes);

        if ($created->validator->success()) {
            return \Redirect::back()->with('success', $created->validator->message);
        }
        else {
            return \Redirect::back()->withErrors($created->validator->errors)->withInput();
        } # endif;
    }
}
