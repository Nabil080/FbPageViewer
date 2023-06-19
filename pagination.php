<?php
require('Api.php');

$data = file_get_contents('php://input');
$data = json_decode($data);

$Api = new Api;
$limit = 6;
if(!empty($data->url)){
    $posts = $Api->getAllPosts($limit,$data->url);
}else{
    $posts = $Api->getAllPosts($limit);
}

ob_start();
    foreach ($posts as $post) {
        echo $post->getPostCard();
    }
$postsString = ob_get_clean();

$response = array(
    "posts" => $postsString,
    "next" => $Api->nextUrl,
    "previous" => $Api->previousUrl,
);
echo json_encode($response);