<?php
namespace Service;

require_once __DIR__ . "/../Datas/PostTypeData.php";
use Data\PostTypeData;

class PostTypeService
{
    public $PostTypeData;
    public function __construct()
    {
        $this->PostTypeData = new PostTypeData();
    }
    public function Create($PostTypename, $Description)
    {
        //$username, $password, $name, $PostTypeId = 2)
        $PostType = $this->PostTypeData->createPostType($PostTypename, $Description);
        return $PostType;
    }
    public function GetAll($page = 1, $pageSize = 100)
    {
        //$username, $password, $name, $PostTypeId = 2)
        $PostTypes = $this->PostTypeData->getAllPostTypes();
        $RolePage = [];
        for ($i = ($page - 1) * $pageSize; $i < $page * $pageSize && $i < count($PostTypes); $i++) {
            $RolePage[] = $PostTypes[$i];
        }
        return $RolePage;
    }
    public function GetRecord()
    {
        return $this->PostTypeData->GetRecord();
    }
    public function GetPostTypeById($id)
    {
        //$username, $password, $name, $PostTypeId = 2)
        $PostType = $this->PostTypeData->getPostTypeById($id);
        return $PostType;
    }
    public function Update($PostTypeId, $PostTypename, $Description)
    {
        //$username, $password, $name, $PostTypeId = 2)
        $PostTypes = $this->PostTypeData->updatePostType($PostTypeId, $PostTypename, $Description);
        return $PostTypes;
    }
    public function Delete($PostTypeId)
    {
        $this->PostTypeData->deletePostType($PostTypeId);
    }


}
?>