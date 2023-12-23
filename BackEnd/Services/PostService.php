<?php
namespace Service;

require_once __DIR__ . "/../Datas/PostData.php";
require_once __DIR__ . "/UserService.php";
use Data\PostData;

class PostService
{
    public $PostData;
    public $UserService;
    public function __construct()
    {
        $this->PostData = new PostData();
        $this->UserService = new UserService();

    }
    // return Object in MySQL
    public function Create($userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status = 0)
    {
        //$username, $password, $name, $roleId = 2)
        $post = $this->PostData->createpost($userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status);
        return $post;
    }
    public function GetALL()
    {
        //$username, $password, $name, $roleId = 2)
        $posts = $this->PostData->getAllposts();
        foreach ($posts as &$post) {
            $user = $this->UserService->GetUserById($post['userId']);
            $post["userName"] = $user['name'];
        }
        return $posts;
    }
    public function GetPostById($id)
    {
        //$username, $password, $name, $roleId = 2)
        $post = $this->PostData->getpostById($id);
        $user = $this->UserService->GetUserById($post['userId']);
        $post["u_name"] = $user['name'];
        $post["u_phone"] = $user['phoneNumber'];
        //Date Post
        $stringDate = $post["creation"];
        $date = date_create($stringDate);
        $post["creation"] = date_format($date, "d-m-Y");
        // Status post
        $intStatus = $post["status"];
        switch ($intStatus) {
            case 1:
                $post["status"] = "Open";
                break;
            case 2:
                $post["status"] = "Close";
                break;
        }

        return $post;
    }

}
?>