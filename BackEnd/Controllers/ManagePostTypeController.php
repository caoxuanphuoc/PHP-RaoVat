<?php
namespace App\Controllers;

require_once __DIR__ . "/../Services/PostTypeService.php";
require_once __DIR__ . "/Controller.php";
use Service\PostTypeService;
use App\Controllers\Controller;

class ManagePostTypeController extends Controller
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
        // RES
        $method = $_SERVER["REQUEST_METHOD"];
        $PostTypeService = new PostTypeService();
        // session_start();
        if ($method == "POST") {
            if (isset($_POST['addTypePost'])) {
                $name = $_POST['name'];
                $des = $_POST['description'];
                $Rid = $_POST['addTypePost'];
                if ($Rid == -1) {
                    $PostTypeService->Create($name, $des);
                } else {
                    $PostTypeService->Update($Rid, $name, $des);
                }
                header("Location: /raovat/managePostType");
            }
            if (isset($_POST['delete'])) {
                $Rid = $_POST['delete'];
                $PostTypeService->Delete($Rid);
                header("Location: /raovat/managePostType");
            }
        } elseif ($method == "GET") {
            include __DIR__ . "/../../FrontEnd/Views/Header.php";
            $page = 1;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            }
            $TotalRecords = $PostTypeService->getRecord()['cnt'];
            $PostTypes = $PostTypeService->GetAll($page, 10);
            include __DIR__ . "/../../FrontEnd/Views/PostTypes/managePostType.php";

        }
    }
}
$run = new ManagePostTypeController();
$run->GateWay();
?>