<?php
use Service\PostService;

require_once __DIR__ . "/BackEnd/Services/PostService.php";

$service = new PostService();
$TotalRecords = $service->getRecord()['cnt'];

var_dump($TotalRecords);

$check = $TotalRecords % 10 == 0;
var_dump($check);
$page = intdiv($TotalRecords, 10);
var_dump($page);

$page += $check ? 0 : 1;
var_dump($page);
echo $page

    ?>

<!-- echo '</pre>';
print_r($posts);
echo '</pre>'; -->

?>