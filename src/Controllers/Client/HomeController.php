<?php

namespace Danghau\Playfinal\Controllers\Client;

use Danghau\Playfinal\Commons\Controller;
use Danghau\Playfinal\Commons\Helper;
use Danghau\Playfinal\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $name = 'DucTV44';

        $this->renderClient('home', [
            'name' => $name
        ]);
    }
}
