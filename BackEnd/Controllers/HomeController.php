<?php
namespace App\Controllers;

require_once __DIR__ . "/../Services/PostService.php";
require_once __DIR__ . "/Controller.php";
use Service\PostService;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {

    }
    public function GateWay()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $service = new PostService();
        session_start();
        if ($method == "POST") {
            if (!isset($_POST["Regis"])) {
                $LoginPostname = $_POST["Postname"];
            }

        } else if ($method == "GET") {
            $Posts = $service->GetALL();
            include __DIR__ . "/../../FrontEnd/Views/Homes/home.php";
        }
    }
}
$run = new HomeController();
$run->GateWay();
?>