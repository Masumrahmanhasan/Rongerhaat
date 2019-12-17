<?php
    function webActive($name = null)
    {
        return (Route::is('web.'.$name)) ? 'active' : '';
    }

    function webRoute($name = null, $param = null)
    {
        return route('web.'.$name, $param);
    }

    function webView($path = null, $data = [])
    {
        return view('web.'.$path, $data);
    }

    function webLayout()
    {
        return 'web.layout';
    }

    function webUser($key = null)
    {
        return ($key) ? auth()->guard('web')->user()->$key : auth()->guard('web')->user();
    }
?>