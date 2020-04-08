<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
    protected function before()
    {
    }

    protected function after()
    {
    }

    public function indexAction()
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
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
