<?php
namespace App\Models;

class UserModel {

    public $username;
    public $password;
    public $email;
    public $mobile;
    public $image_file;

    public function getUser()
    {
        return $this;
    }

    public function setUser($data)
    {
        $this->username = $data['username'] ?? '';
        $this->password = $data['password'] ?? '';
        $this->email    = $data['email']    ?? '';
        $this->mobile   = $data['mobile']   ?? '';
        $this->image_file = $data['image_file'] ?? '';
    }
}