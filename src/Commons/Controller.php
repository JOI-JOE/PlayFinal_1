<?php

namespace Danghau\Playfinal\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    private string $templatePath = __DIR__ . "/../Views";
    private string $compiledPath = __DIR__ . "/../Views/Compiles";

    protected function renderClient($view, $data)
    {
        $this->render($view, $data, $this->templatePath, "Client");
    }

    protected function renderAdmin($view, $data)
    {
        $this->render($view, $data, $this->templatePath, "Admin");
    }

    protected function render($view, $data, $templatePath, $folder)
    {
        $blade = new BladeOne($templatePath . "/" . $folder, $this->compiledPath);
        echo $blade->run($view, $data);
    }
}
// -class Controller
// -{
// -    public function renderClient($view, $data)
// -    {
// -        $templatePath = __DIR__ . "/../View/Client"; // đường dẫn tuyệt đối 
// -        $this->renderBlade($templatePath, $view, $data);
// -    }
// -    public function renderAdmin($view, $data)
// -    {
// -        $templatePath = __DIR__ . "/../View/Admin"; // đường dẫn tuyệt đối 
// -        $this->renderBlade($templatePath, $view, $data);
// -    }
// -
// -    public function renderBlade($templatePath, $view, $data)
// -    {
// -        $compiledPath = __DIR__ . "/../View/compiles";
// -        $blade = new BladeOne($templatePath, $compiledPath);
// -        echo $blade->run($view, $data);
// -    }
// -}
