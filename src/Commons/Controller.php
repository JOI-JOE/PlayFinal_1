<?php

namespace Danghau\Playfinal\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    protected string $templatePath = __DIR__ . '/../Views';
    protected string $compiledPath = __DIR__ . '/../Views/Compiles';

    protected function render($view, $data, $folder)
    {
        $blade = new BladeOne("{$this->templatePath}/{$folder}", $this->compiledPath);
        echo $blade->run($view, $data);
    }

    protected function renderClient($view, $data = [])
    {
        $this->render($view, $data, 'Client');
    }

    protected function renderAdmin($view, $data = [])
    {
        $this->render($view, $data, 'Admin');
    }
}
