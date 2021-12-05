<?php

namespace App\Framework;

use PDO;

class PDOFactory
{
    public static function getMySqlConnection(): PDO
    {
        return new PDO('mysql:host=db;dbname=cms_php', 'root', 'example');
    }
}