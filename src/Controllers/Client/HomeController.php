<?php

namespace Danghau\Playfinal\Controllers\Client;

use Danghau\Playfinal\Commons\Controller;
use Danghau\Playfinal\Commons\Helper;
use Danghau\Playfinal\Models\User;

class HomeController extends Controller
{

    // show ra đúng cái đối tượng trang sẽ là
    public function index()
    {
        // $user = new User();

        // Helper::debug($user);
        $name =  'Ngo';
        $this->renderClient('home', [
            'name' => $name
        ]);
    }
}
