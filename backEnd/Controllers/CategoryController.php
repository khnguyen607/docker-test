<?php

class CategoryController extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->model = new CategoryModel;
    }

    public function index()
    {
        $data = $this->model->mAlls();

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function find()
    {
        $id = $_GET['id'];
        $data = $this->model->mFind($id);
        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function insert()
    {
        $data = [
            'name'      => $_POST['name'],
            'location'  => $_POST['location'],
            'img'       => $_POST['img'],
            'capacity'  => $_POST['capacity'],
            'utility'   => $_POST['utility']
        ];

        $this->model->mInsert($data);
        header("Location: ../frontend/dashboard.html?tab=mgr__room");
    }

    public function update()
    {
        $id = $_GET['id'];
        $data = [
            'name'      => $_POST['name'],
            'location'  => $_POST['location'],
            'img'       => $_POST['img'],
            'capacity'  => $_POST['capacity'],
            'utility'   => $_POST['utility']
        ];

        $this->model->mUpdate($id, $data);

        header("Location: ../frontend/dashboard.html?tab=mgr__room");
    }

    public function delete()
    {
        $id = $_GET['id'];
        $data = [
            'status' => '0'
        ];
        $this->model->mDelete($id, $data);
        header("Location: ../frontend/dashboard.html?tab=mgr__room");
    }


}
