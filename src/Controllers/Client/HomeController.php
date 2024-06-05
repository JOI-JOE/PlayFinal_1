<?php

namespace Danghau\Playfinal\Controllers\Client;

use Danghau\Playfinal\Commons\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $name = 'Ngo Dang Hau';

        $this->renderClient('home', [
            'name' => $name
        ]);
    }
}
