<?php
include_once('load.php');
use App\Controllers\UserController;
use App\View\UserView;

$userController = new UserController(new UserView);
$userController->showUser();