<?php
namespace App\Controllers;

use App\Interfaces\ViewInterface;
use App\Models\UserModel;

class UserController {

    public function __construct(ViewInterface $viewInterface)
    {
        $this->userModel = new UserModel;
        $this->viewInterface = $viewInterface;
        $this->fileController = new FileController;
    }

    public function showUser()
    {
        $uploadResult = $this->fileController->upload('myFiles');
        $input = $_POST;
        $input['image_file'] = $uploadResult['success'][0]['web_path'] ?? 'storage/' . 'image_placeholder.png';
        $this->userModel->setUser($input);
        $data['contents'] = $this->userModel->getUser();
        $data['meta']['title'] = 'User page';
        $this->viewInterface->view($data);
    }
}