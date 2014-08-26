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
        return Redirect::intended('/');
    }

    public function authenticate()
    {
        $validator = Validator::make(Input::all(), array(
            'username' => 'required|email',
            'password' => 'required|alphaNum|min:3',
        ));

        if ($validator->passes()) {
            Auth::attempt([ 'username' => Input::get('username'), 'password' => Input::get('password') ]);

            if (Auth::check()) {
                $user = Auth::user();

                if (in_array($user->type, [ 'admin', 'dev' ])) {
                    return Redirect::intended('/admin');
                }
                else if ($user->type == 'account') {
                    return Redirect::intended('/account');
                }
                return Redirect::intended('/');
            }
            else {
                return Redirect::intended('/sign_out');
            }
        }
        else {
            return Redirect::to('/sign_out')->withErrors($validator)->withInput( Input::except('password') );
        }
    }

}
