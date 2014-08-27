<?php

if (!function_exists('_t')) {
    function _t($key, $params = array(), $file = 'application') {
        return ucfirst( t($key, $params, $file) );
    }
}

if (!function_exists('t')) {
    function t($key, $params = array(), $file = 'application') {
        $file = $file ? $file : Config::get('app.lang_file_default');
        $file_key = $file . '.' . $key;
        $translated = Lang::get($file_key, $params);

        return $translated == $file_key ? $key : $translated;
    }
}

if (!function_exists('fa_link_to_action')) {
    function fa_link_to_action ($action, $text, $icon = '', $params = array(), $attrs = array())
    {
        if ($icon) $text = '<i class="fa fa-' . $icon . '"></i> ' . $text;
        return link_to_action($action, $text, $params, $attrs);
    }
}

if (!function_exists('fa_link_to_route')) {
    function fa_link_to_route ($route, $text, $icon = '', $params = array(), $attrs = array())
    {
        if ($icon) $text = '<i class="fa fa-' . $icon . '"></i> ' . $text;
        return link_to_route($route, $text, $params, $attrs);
    }
}

if (!function_exists('fa_link_to')) {
    function fa_link_to ($url, $text, $icon = '', $attrs = array(), $secure = null)
    {
        if ($icon) $text = '<i class="fa fa-' . $icon . '"></i> ' . $text;
        return link_to($url, $text, $attrs, $secure);
    }
}
