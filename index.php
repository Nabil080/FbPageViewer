<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-500">



<section class="flex flex-wrap gap-12 justify-center">
    <?php
    $id="109157512212506";
    $token="EAALYeThbMVUBAO4Hq2ZA6naEIxFdNx1xYqnqZCpPBhOmSdK4HZBhZBLBkOARDq7Cir2sgQYfjZCZBcuY5S2S3suo2DtbFV7ZAipdqsdXDM899SJGbRAUflESnkB3gsYfs70etY6UdNZBuDhJIBSaR8qHa7IxjBSfPqnCNsux7ZCc0ZBkMt68TbDMns4H8egEELcc9NJdiDG6mvTonZCJz3sTlAI";

    $url = "https://graph.facebook.com/v12.0/$id/posts?fields=message,created_time,attachments&access_token=$token";
    $response = file_get_contents($url);
    


    if ($response !== false) {
        $data = json_decode($response, true);
        $posts = $data['data'];
        // var_dump($data);

        foreach ($posts as $post) {
            // définit les variables
            $message = isset($post['message']) ? $post['message'] : "Inconnu" ;
            $createdTime = new DateTime($post['created_time']);
            $images = [];
            if(isset($post['attachments'])){
                if(isset($post['attachments']['data'][0]['subattachments'])){
                $imagesData = $post['attachments']['data'][0]['subattachments']['data'];
                    foreach ($imagesData as $imageData){
                        if($imageData['type'] === "photo"){
                            $images[] = $imageData['media']['image']['src'];
                        }
                    }
                }else{
                    $images[] = $post['attachments']['data'][0]['media']['image']['src'];
                }
            }
            ?>

            <article class="w-[500px] [&_img]:w-[500px] border ">
                <div class="slider-container flex w-[500px] h-[400px] overflow-scroll scroll-smooth">
                    <?php         
                        if(!empty($images)){
                            foreach($images as $image){ ?>
                                <img src='<?=$image?>' class="object-cover">
                            <?php }
                        }else{ 
                            echo '<img src="logo.png">';
                        }
                    ?>
                </div>
                <div class="flex justify-between">
                    <h2><?=$message?></h2>
                    <p><?=$createdTime->format('j F Y')?></p>
                </div>
            </article>

            <?php
        }

        
    } else {
        echo "Il y a eu une erreur";
    }
    ?>
</section>


</body>
</html>