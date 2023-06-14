<?php
$id="111584798633407";
$token="EAALYeThbMVUBAEx4i5ASmUtI4YpwZB5gJuJFp5sClTekHOKL0zZAP7n3rftE879zgZAZA7Rdjesi1RShpdYZCRWZCoXKPo702xk3OjnfUygZCg9GlRaI1MsHD7xR8cVS4WyLwVUOu60qWxxFY60NDb6FXBGRmlh09WXJWMujaa3NjuHeYoG4dgNjjJvjw9MzYtaUZCA6rSo1SlQtnwazksMDe3ATge7bfHTSad6cv1oK2FRqyivpiDjp4cbWLEukhrUZD";

$url = "https://graph.facebook.com/me/posts?fields=message,created_time,full_picture&access_token=$token";
$response = file_get_contents($url);



if ($response !== false) {
    $data = json_decode($response, true);
    $posts = $data['data'];
    // var_dump($data);

    foreach ($posts as $post) {
        // var_dump($post);
        $message = isset($post['message']) ? $post['message'] : "Inconnu" ;
        $createdTime = $post['created_time'];

        var_dump("<p>$message - $createdTime</p>");
        if(isset($post['full_picture'])){
            $image = $post['full_picture'];
            echo "<img src='$image'>";
        }
    }
} else {
    echo "Il y a eu une erreur";
}
