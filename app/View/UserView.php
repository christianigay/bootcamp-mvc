<?php
namespace App\View;

use App\Interfaces\ViewInterface;

class UserView extends TemplateView implements ViewInterface {


    public function view($data)
    {
        $this->display($data);
    }
}