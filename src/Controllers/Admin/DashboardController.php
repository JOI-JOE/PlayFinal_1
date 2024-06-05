<?php

namespace Danghau\Playfinal\Controllers\Admin;

use Danghau\Playfinal\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->renderAdmin(__FUNCTION__);
    }
}
