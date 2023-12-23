<?php
use Data\PostData;

require_once __DIR__ . "/BackEnd/Datas/PostData.php";

$service = new PostData();

$posts = $service->getAllposts();
foreach ($posts as &$post) {
    $post["ten"] = "Phuoc";
}
echo '<pre>';
print_r($posts);
echo '</pre>';

?>