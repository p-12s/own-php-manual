<?php

namespace App\Models;

use PDO;

class Post extends \Core\Model
{
    public static function getAll()
    {
        try {
            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content 
                                            FROM posts 
                                            ORDER BY created_at');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}