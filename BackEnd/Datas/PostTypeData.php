<?php
namespace Data;

require_once __DIR__ . "/Connection.php";
use Data\ConnectionMySql;
use mysqli;

class PostTypeData
{

    public mysqli $PostTypeContext;
    public function __construct()
    {
        $ConnectSQL = new ConnectionMySql();
        $this->PostTypeContext = $ConnectSQL->Context;
        //$ConnectSQL->disposeConnect();

    }
    public function getRecord()
    {
        $result = $this->PostTypeContext->query("SELECT count(*) as cnt FROM posttype");

        return $result->fetch_assoc();

    }
    //DONE
    public function getAllPostTypes()
    {
        $result = $this->PostTypeContext->query(" SELECT * FROM posttype");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    //DONE
    public function getPostTypeById($PostTypeId)
    {
        $PostTypeId = $this->PostTypeContext->real_escape_string($PostTypeId);
        $result = $this->PostTypeContext->query(" SELECT * FROM posttype WHERE id = $PostTypeId ");

        return $result->fetch_assoc();
    }

    // DONE
    // PostTypeid = 1 is PostType Admin,
    // PostTypeid = 2 is PostType normal,
    public function createPostType($PostTypename, $Description)
    {

        $PostTypename = $this->PostTypeContext->real_escape_string($PostTypename);
        $Description = $this->PostTypeContext->real_escape_string($Description);
        return $this->PostTypeContext->query("INSERT INTO PostType (name, description) VALUES ('$PostTypename', '$Description')");
    }
    //DONE
    public function updatePostType($PostTypeId, $PostTypename, $Description)
    {
        $PostTypename = $this->PostTypeContext->real_escape_string($PostTypename);
        $Description = $this->PostTypeContext->real_escape_string($Description);

        return $this->PostTypeContext->query("UPDATE posttype SET name='$PostTypename', description ='$Description' WHERE id=$PostTypeId");
    }
    //DONE
    public function deletePostType($PostTypeId)
    {
        $PostTypeId = $this->PostTypeContext->real_escape_string($PostTypeId);
        $this->PostTypeContext->query("DELETE FROM posttype WHERE id=$PostTypeId");
    }
}

?>