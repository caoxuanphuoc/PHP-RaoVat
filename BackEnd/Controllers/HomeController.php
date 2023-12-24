<?php
namespace App\Controllers;

require_once __DIR__ . "/../Services/PostService.php";
require_once __DIR__ . "/../Services/PostTypeService.php";
require_once __DIR__ . "/Controller.php";
use Service\PostService;
use App\Controllers\Controller;
use Service\PostTypeService;

class HomeController extends Controller
{
    public function __construct()
    {

    }
    public function GateWay()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $service = new PostService();
        $serviceType = new PostTypeService();
        //  session_start();
        if ($method == "POST") {
            if (!isset($_POST["Regis"])) {
                $LoginPostname = $_POST["Postname"];
            }

        } else if ($method == "GET") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            }
            $Posts = $service->GetALL($page, 5);
            $Types = $serviceType->GetAll();
            $TotalRecords = $service->getRecord()['cnt'];
            include __DIR__ . "/../../FrontEnd/Views/Homes/home.php";
        }
    }
}
$run = new HomeController();
$run->GateWay();
?>