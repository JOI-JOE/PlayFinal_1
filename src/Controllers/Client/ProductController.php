<?php

namespace Danghau\Playfinal\Controllers\Client;

use Danghau\Playfinal\Commons\Controller;
use Danghau\Playfinal\Models\User;

// class ProductController extends Controller
// {
//     private User $user;
//     public function __construct()
//     {
//         $this->user = new User();
//     }
//     public function index()
//     {
//         [$users, $totalPage] = $this->user->paginate($_GET['page'] ?? 1);

//         $this->renderClient("shop", [
//             "users" => $users,
//             "totalPage" => $totalPage
//         ]);
//     }

//     public function detail($id)
//     {
//     }
// }
