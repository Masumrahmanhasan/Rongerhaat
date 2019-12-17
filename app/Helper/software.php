<?php
    function saActive($name = null)
    {
        return (Route::is('superadmin.'.$name)) ? 'active' : '';
    }

    function saRoute($name = null, $param = null)
    {
        return route('superadmin.'.$name, $param);
    }

    function saView($path = null, $data = [])
    {
        return view('software.superadmin.'.$path, $data);
    }

    function saRedirect($name = null, $param = null)
    {
        return redirect()->route('superadmin.'.$name, $param);
    }

    function saLayout()
    {
        return 'software.superadmin.layout';
    }

    function saUser($key = null)
    {
        return ($key) ? auth()->guard('superadmin')->user()->$key : auth()->guard('superadmin')->user();
    }
?>