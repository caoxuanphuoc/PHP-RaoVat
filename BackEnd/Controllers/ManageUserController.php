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
        //Author
        if (isset($_SESSION['USER_LOGED'])) {
            $userInfo = $_SESSION['USER_LOGED'];
            if ($userInfo['roleId'] != 1)
                header("Location: /raovat/home");
        }

        $method = $_SERVER["REQUEST_METHOD"];
        $userService = new UserService();
        $roleService = new RoleService();
        //session_start();
        if ($method == "POST") {
            if (isset($_POST['addrole'])) {
                $name = $_POST['name'];
                $des = $_POST['description'];
                $Rid = $_POST['addrole'];
                if ($Rid == -1) {
                    $roleService->Create($name, $des);
                } else {
                    $roleService->Update($Rid, $name, $des);
                }
                header("Location: /raovat/manageUser");
            }
            if (isset($_POST['delete'])) {
                $Rid = $_POST['delete'];
                $roleService->Delete($Rid);
                header("Location: /raovat/manageUser");
            }


        } elseif ($method == "GET") {
            include __DIR__ . "/../../FrontEnd/Views/Header.php";
            $pageu = 1;
            if (isset($_GET["pageu"])) {
                $pageu = $_GET["pageu"];
            }
            $pager = 1;
            if (isset($_GET["pager"])) {
                $pager = $_GET["pager"];
            }
            $users = $userService->GetAll($pageu, 5);
            $roles = $roleService->GetAll($pager, 5);
            $TotalRecordUsers = $userService->getRecord()['cnt'];
            $TotalRecordRoles = $roleService->getRecord()['cnt'];
            include __DIR__ . "/../../FrontEnd/Views/Users/manageUser.php";

        }
    }
}
$run = new ManageUserController();
$run->GateWay();
?>