<?php

namespace Danghau\Playfinal\Controllers\Admin;

use Danghau\Playfinal\Commons\Controller;
use Danghau\Playfinal\Commons\Helper;
use Danghau\Playfinal\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();

        $this->renderAdmin("users.index", [
            "users" => $users,
        ]);
    }

    public function create()
    {
        $this->renderAdmin('users.create');
    }

    public function store()
    {
        $validator = new Validator;

        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'confirm_password'      => 'required|same:password',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
            'type'                  => 'required|in:admin,member',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/users/create'));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                'email'     => $_POST['email'],
                'type'      => $_POST['type'],
                'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/admin/users/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload fail';

                    header('Location: ' . url('admin/users/create'));
                    exit;
                }
            }

            $this->user->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Operation successful';

            header('Location: ' . url('admin/users'));
            exit;
        }
    }

    public function show($id)
    {
        $user = $this->user->findByID($id);

        $this->renderAdmin('users.show', [
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = $this->user->findByID($id);

        $this->renderAdmin('users.edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $user = $this->user->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'min:6',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
            'type'                  => 'in:admin,member',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/users/{$user['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                'email'     => $_POST['email'],
                'type'      => $_POST['type'],
                'password'  => !empty($_POST['password']) ?
                    password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
                // Add 7 hours to the current time in the format 'Y-m-d H:i:s'
                // This is because the 'updated_at' field is in UTC+7 time zone.
                'updated_at' => date('Y-m-d H:i:s', time() + (7 * 3600)),
            ];

            $flagUpload = false;
            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/admin/users/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload failed';

                    header('Location: ' . url("admin/users/{$user['id']}/edit"));
                    exit;
                }
            }

            $this->user->update($id, $data);

            if (
                $flagUpload
                && $user['avatar']
                && file_exists(PATH_ROOT . $user['avatar'])
            ) {
                unlink(PATH_ROOT . $user['avatar']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Operation successful';

            header('Location: ' . url("admin/users/{$user['id']}/edit"));
            exit;
        }
    }

    public function delete($id)
    {
        try {
            $user = $this->user->findByID($id);

            $this->user->delete($id);

            if ($user['avatar'] && file_exists(PATH_ROOT . $user['avatar'])) {
                unlink(PATH_ROOT . $user['avatar']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Operation successful';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Operation fail';
        }

        header('Location: ' . url('admin/users'));
        exit();
    }
}
