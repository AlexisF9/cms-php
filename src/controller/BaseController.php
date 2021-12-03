<?php

abstract class BaseController
{
    private $viewDir = "View/";
    private $template = "View/template.view.php";

    public function render(string $title, array $data, string $view){
        $view = $this->viewDir . $view . ".view.php";
        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->template;
    }
}