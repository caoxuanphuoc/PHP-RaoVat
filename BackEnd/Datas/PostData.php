<?php
namespace Data;

require_once __DIR__ . "/Connection.php";
use Data\ConnectionMySql;
use mysqli;

class PostData
{

    public mysqli $postContext;
    public function __construct()
    {
        $ConnectSQL = new ConnectionMySql();
        $this->postContext = $ConnectSQL->Context;
        //$ConnectSQL->disposeConnect();

    }
    //DONE
    public function getRecord()
    {
        $result = $this->postContext->query("SELECT count(*) as cnt FROM post");

        return $result->fetch_assoc();

    }
    public function getAllposts()
    {
        $result = $this->postContext->query("SELECT * FROM post ORDER BY creation DESC");

        return $result->fetch_all(MYSQLI_ASSOC);

    }
    //DONE
    public function getpostById($postId)
    {
        $postId = $this->postContext->real_escape_string($postId);
        $result = $this->postContext->query("SELECT * FROM post WHERE id = $postId");

        return $result->fetch_assoc();
    }

    public function createpost($userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status)
    {
        $userId = $this->postContext->real_escape_string($userId);
        $typeId = $this->postContext->real_escape_string($typeId);
        $title = $this->postContext->real_escape_string($title);
        $content = $this->postContext->real_escape_string($content);
        $priceFrom = $this->postContext->real_escape_string($priceFrom);
        $priceTo = $this->postContext->real_escape_string($priceTo);
        $location = $this->postContext->real_escape_string($location);
        $status = $this->postContext->real_escape_string($status);
        echo $title;
        echo "chuan bi insert OK";
        $res = $this->postContext->query("INSERT INTO post ( userId, typeId, title, content, priceFrom, priceTo, location, status) 
        VALUES ($userId, $typeId, '$title', '$content', $priceFrom, $priceTo, '$location', $status)");
        echo "tao insert OK";
        return $res ? $this->postContext->insert_id : -1;
    }
    //DONE
    public function updatepost($postId, $userId, $typeId, $title, $content, $priceFrom, $priceTo, $location, $status)
    {
        $postId = $this->postContext->real_escape_string($postId);
        $userId = $this->postContext->real_escape_string($userId);
        $typeId = $this->postContext->real_escape_string($typeId);
        $title = $this->postContext->real_escape_string($title);
        $content = $this->postContext->real_escape_string($content);
        $priceFrom = $this->postContext->real_escape_string($priceFrom);
        $priceTo = $this->postContext->real_escape_string($priceTo);
        $location = $this->postContext->real_escape_string($location);
        $status = $this->postContext->real_escape_string($status);

        return $this->postContext->query("UPDATE post
        SET
        userId = '$userId',
        typeId = $typeId,
        title = '$title',
        content = '$content',
        priceFrom = '$priceFrom',
        priceTo = '$priceTo',
        location = '$location',
        status = '$status'
        WHERE id = $postId
        ");
    }
    //DONE
    public function deletepost($postId)
    {
        $postId = $this->postContext->real_escape_string($postId);
        $this->postContext->query("DELETE FROM post WHERE id=$postId");
    }
}

?>