<?php

class PDOFactory
{
    public static function getMySqlConnection(): PDO
    {
        return new PDO('mysql:host=db;dbname=cms_php', 'root', 'example');
    }

    /*public function render(string $titre, array $vars, string $view) 
    {
        $view = $this->viewDir . $view . '.view.php';
        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->template;
    }*/
}