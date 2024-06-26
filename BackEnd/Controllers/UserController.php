<?php
namespace App\Controllers;

require_once __DIR__ . "/../Services/UserService.php";
require_once __DIR__ . "/Controller.php";
use Service\UserService;
use App\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {

    }
    public function GateWay()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $service = new UserService();
        //session_start();
        if ($method == "POST") {
            //xử lý update
            if (isset($_POST["update"])) {
                $un = $_POST["userName"];
                $roleID = $_POST["roleId"];
                $name = $_POST["name"];
                $userid = $_POST["update"];
                $service->UpdateUser($userid, $un, $name, $roleID);
                header("Location: /raovat/manageUser");

            }
            // Xử lý xóa
            if (isset($_POST["delete"])) {
                $uID = $_POST["delete"];
                $service->Delete($uID);
                header("Location: /raovat/manageUser");

            }
            //Xử lý login, register
            if (!isset($_POST["Regis"])) {
                $LoginUsername = $_POST["username"];
                $LoginPass = $_POST["password"];
                if ($LoginUsername != null && $LoginPass != null) {
                    $result = $service->login($LoginUsername, $LoginPass);
                    if ($result != null) {

                        $_SESSION["USER_LOGED"] = $result;
                        //serialize($result->data);
                        //$this->render("Home", $result);
                        header("Location: /raovat/home");
                        //exit();
                    } else {
                        header("Location: /raovat?login=false");
                    }
                }
            } else {
                $pw = $_POST["pw"];
                $cpw = $_POST["cpw"];
                if ($pw == $cpw) {
                    $un = $_POST["un"];
                    $pn = $_POST["pn"];
                    $fn = $_POST["fn"];
                    $User = $service->Register($un, $pw, $fn, 2);
                    if ($User == null)
                        header("Location: /raovat?RegRes=UN");
                    else {
                        $Userlogin = $service->login($un, $pw);
                        $_SESSION["USER_LOGED"] = $Userlogin;
                        //$this->render("Home", $Userlogin);
                        header("Location: /raovat/home");
                    }
                } else {
                    header("Location: /raovat?RegRes=Pass");
                }
            }

        } else if ($method == "GET") {
            if (isset($_GET["logout"])) {
                $id = $_GET["logout"];
                unset($_SESSION['USER_LOGED']);
                header("Location: /raovat");
            } elseif (isset($_GET["login"])) {

            }
        }
    }
}
$run = new UserController();
$run->GateWay();
?>