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
    public function Create($userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status = 1)
    {
        //$username, $password, $name, $roleId = 2)
        $post = $this->PostData->createpost($userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status);
        return $post;
    }
    public function Update($postId, $userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status)
    {
        $post = $this->PostData->updatepost($postId, $userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status);
        return $post;
    }
    public function getRecord()
    {
        return $this->PostData->getRecord();
    }
    public function Delete($postId)
    {
        $this->PostData->deletepost($postId);

    }
    public function GetALL($page, $pageSize)
    {
        //$username, $password, $name, $roleId = 2)
        $posts = $this->PostData->getAllposts();
        foreach ($posts as &$post) {
            $user = $this->UserService->GetUserById($post['userId']);
            $post["userName"] = $user['name'];
        }
        // paging
        $postPage = [];
        for ($i = ($page - 1) * $pageSize; $i < $page * $pageSize && $i < count($posts); $i++) {
            $postPage[] = $posts[$i];
        }
        return $postPage;
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