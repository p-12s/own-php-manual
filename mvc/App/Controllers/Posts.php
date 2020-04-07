<?php

namespace App\Controllers;

class Posts
{
    public function index()
    {
        echo 'Hello from POSTS controller INDEX action';
        echo '<p>Query string parameters<pre>'.
            htmlspecialchars(print_r($_GET, true)) .'</pre></pre>';
    }

    public function addNew()
    {
        echo 'Hello from addNew Post';
    }
}