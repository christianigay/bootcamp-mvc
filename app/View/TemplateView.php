<?php
namespace App\View;

class TemplateView {
    
    public function display($data)
    {
        include("app/View/template/header.php");
        include("app/View/pages/showUser.php");
        include("app/View/template/footer.php");
    }
}