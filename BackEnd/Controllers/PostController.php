<?php
namespace App\Controllers;

require_once __DIR__ . "/../Services/PostService.php";
require_once __DIR__ . "/Controller.php";
use Service\PostService;
use App\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {

    }
    public function GateWay()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $service = new PostService();

        if ($method == "POST") {
            if (isset($_POST['IsCreate'])) {
                $userId = $_POST["userId"];
                $typeId = $_POST["typeId"];
                $title = $_POST["title"];
                $content = $_POST["content"];
                $priceFrom = $_POST["priceFrom"];
                $priceTo = $_POST["priceTo"];
                $location = $_POST["location"];
                $status = $_POST["status"];

                $IdPost = $_POST['IsCreate'];
                if ($IdPost == -1) {
                    $service->Create($userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status);
                } else {
                    $service->Update($IdPost, $userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status);
                }
            }
            if (isset($_POST['delete'])) {
                $idDele = $_POST['delete'];
                $service->Delete($idDele);
            }
            header("Location: /raovat/home");
        } else if ($method == "GET") {
            if (!isset($_GET["id"])) {
                $Posts = $service->GetALL(1, 10);
                include __DIR__ . "/../../FrontEnd/Views/Posts/Post.php";
            } else {
                include __DIR__ . "/../../FrontEnd/Views/Header.php";
                $post = $service->GetPostById($_GET["id"]);
                include __DIR__ . "/../../FrontEnd/Views/Posts/contentPost.php";

            }
        }
    }
}
$run = new PostController();
$run->GateWay();
?>