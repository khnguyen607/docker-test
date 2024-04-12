<?php

class UserController extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->loadModel('UserModel');
        $this->model = new UserModel;
    }

    public function index()
    {
        $data = $this->model->mAlls();

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function findUser()
    {
        $id = $_GET['id'];
        $user = $this->model->mFind($id);

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($user);
    }

    public function addStudent()
    {
        $data = [
            'email'  => $_POST['email'],
            'name'  => $_POST['name'],
            'user'  => $_POST['user'],
            'pass'  => $_POST['pass']
        ];

        if ($this->model->checkuser_name($data['user'])) {
            $this->model->bmInsert($data);
            header("Location: ../frontend/auth-sign-in.html?user=" . $data['user']);
        } else {
            header("Location: ../frontend/auth-sign-up.html?name=" . $data['name']);
        }
    }

    public function addLibrarian()
    {
        $data = [
            'email'  => $_POST['email'],
            'name'  => $_POST['name'],
            'user'  => $_POST['user'],
            'pass'  => $_POST['pass'],
            'role'  => '1'
        ];

        if ($this->model->checkuser_name($data['user'])) {
            $this->model->bmInsert($data);
            header("Location: ../frontend/dashboard.html?tab=mgr__user");
        } else {
            header("Location: ../frontend/dashboard.html?tab=mgr__user&sign_up=false");
        }
    }

    public function editUser()
    {
        $id = $_GET['id'];
        $data = [
            'email'  => $_POST['email'],
            'name'  => $_POST['name']
        ];

        $this->model->mUpdate($id, $data);
        header("Location: ../frontend/dashboard.html?tab=mgr__user");
    }

    public function updateUser()
    {
        $data = [
            'email'       => $_POST['email'],
            'name'        => $_POST['name'],
            'user'        => $_POST['user'],
            'currentpass' => $_POST['currentpass'],
            'newpass'     => $_POST['newpass']
        ];

        if($this->model->updateU($data)) header("Location: ../frontend/user.html?update=true");
        else header("Location: ../frontend/user.html?update=false");
        
    }

    public function delUser()
    {
        $id = $_GET['id'];
        $data = [
            'status' => '0'
        ];
        $this->model->mUpdate($id, $data);
        header("Location: ../frontend/dashboard.html?tab=mgr__user");
    }

    public function login()
    {
        $data = [
            'user'  => $_POST['user'],
            'pass'  => $_POST['pass']
        ];

        $check = $this->model->isValidUser($data);
        if ($check) {
            header("Location: ../frontend/index.html");
        } else {
            header("Location: ../frontend/auth-sign-in.html?loginF=" . $data['user']);
        }
    }

    public function logout()
    {
        setcookie("user_id", "", time() - 3600, "/");
        header("Location: ../frontend/auth-sign-in.html");
    }

    public function check()
    {
        $role = $this->model->checkUserRole();
        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($role);
    }

}
