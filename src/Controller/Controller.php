<?php

namespace App\Controller;

abstract class Controller {
    /**
     * Renders passed view file.
     * 
     * @param string $view
     * @param array $response
     * 
     * @return void
     */
    protected function view(string $view, array $response): void
    {
        extract($response);

        echo include __DIR__ . "/../View/$view.php";
    }
}