<?php

namespace App\Controllers;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        echo 'Hello from POSTS controller INDEX action';
        echo '<p>Query string parameters<pre>'.
            htmlspecialchars(print_r($_GET, true)) .'</pre></pre>';
    }

    public function addNewAction()
    {
        echo 'Hello from POSTS controller addNew ACTION';
    }

    public function editAction()
    {
        echo 'Hello from POSTS controller edit ACTION';
        echo '<p>Query string parameters<pre>'.
            htmlspecialchars(print_r($this->route_params, true)) .'</pre></pre>';
    }
}