<?php
namespace App\Controllers;

require_once __DIR__ . "/../Services/UserService.php";
require_once __DIR__ . "/../Services/RoleService.php";
require_once __DIR__ . "/Controller.php";
use Service\UserService;
use Service\RoleService;
use App\Controllers\Controller;

class ManageUserController extends Controller
{
    public function __construct()
    {

    }
    public function GateWay()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $userService = new UserService();
        $roleService = new RoleService();
        session_start();
        if ($method == "POST") {

            header("Location: /raovat/home");
        } elseif ($method == "GET") {
            include __DIR__ . "/../../FrontEnd/Views/Header.php";
            $users = $userService->GetAll();
            $roles = $roleService->GetAll();
            include __DIR__ . "/../../FrontEnd/Views/Users/manageUser.php";

        }
    }
}
$run = new ManageUserController();
$run->GateWay();
?>