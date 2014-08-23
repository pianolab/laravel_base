<?php

class LanguagesController extends Controller
{
    public function js($file)
    {
        $langs = Lang::get($file);
        $content = View::make('languages.js')->with('langs', $langs)->with('file', $file);
        $response = Response::make($content, 200);
        $response->header('Content-Type', 'application/javascript');
        return $response;
    }
}
