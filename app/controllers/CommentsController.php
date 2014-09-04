<?php

class CommentsController extends \BaseController
{
    public function __construct(\CommentEloquentRepository $comment)
    {
        $this->comment = $comment;
    }

    public function store()
    {
        $created = $this->comment->store([ 'user_id' => Auth::user()->id, 'parent_name' => 'attachment',  ] + \Input::except('_method', '_token'));

        if ($created->success()) {
            return \Redirect::back()->with('success', $created->message);
        }
        else {
            return \Redirect::back()->withErrors($created->errors)->withInput();
        } # endif;
    }
}
