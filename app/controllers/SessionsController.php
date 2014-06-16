<?php

class SessionsController extends BaseController
{
    /**
   * The layout that should be used for responses.
   */
  protected $layout = 'layouts.authentication';

  public function sign_in()
  {
    $this->layout->content = View::make('sessions.sign_in');
  }

    public function sign_out()
    {
        Auth::logout();
    return Redirect::intended('/sign_in');
    }

  public function authenticate()
  {
    $validator = Validator::make(Input::all(), array(
      'username' => 'required|email',
      'password' => 'required|alphaNum|min:3',
    ));


    if ($validator->passes()) {
      Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')));

      if (Auth::check()) {
        return Redirect::to('/');
      }
      else {
        return Redirect::to('/sign_out');
      }
    }
    else {
      return Redirect::to('/sign_out')
           ->withErrors($validator)
           ->withInput( Input::except('password') );
    }
  }

}
