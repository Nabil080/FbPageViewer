<?php
$id="111584798633407";
$token="EAALYeThbMVUBAAmoG9Jb2epzCmCB39KPMd10dKJdUnwqW2gdLqdY1xlpZAlPT2OcYwtMMHWhYGQSMvrezaMUwMqkv88lawTMH5RWTZB9G8ADLxYhvV4W42EzZALQfepBILwZBJegIRbo68GAZA0puqRkhr4klLfMKZBGhuixZAxgy8WJ39FjlJQFo9fyQL47DGY6QL4cst66b04vT4biRdn";

$url = "https://graph.facebook.com/me/posts?access_token=$token";
$response = file_get_contents($url);



if ($response !== false) {
    $data = json_decode($response, true);
    $posts = $data['data'];

    foreach ($posts as $post) {
        // var_dump($post);
        $message = isset($post['message']) ? $post['message'] : "Inconnu" ;
        $createdTime = $post['created_time'];

        var_dump("<p>$message - $createdTime</p>");
    }
} else {
    echo "Il y a eu une erreur";
}
