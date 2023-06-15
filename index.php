<?php require('Post.php') ?>
<?php require('Api.php') ?>
<?php 
$Api = new Api();
$posts = $Api->getAllPosts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook API</title>

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="">

<!-- FAKE NAV BAR -->
    <nav class="w-full h-24 grid place-items-center border">NAV BAR</nav>
<!-- FAKE NAV BAR -->


<!-- FAKE HEADER -->
    <section class="w-full h-36 relative" style="background-image:url(https://actualite.veronique-belleville.fr/wp-content/themes/corporate-key/images/custom-header.jpg)">
        <div class="w-full h-full absolute bg-black bg-opacity-40 grid place-items-center">
            <p class="text-white font-bold text-xl">HEADER</p>
        </div>
    </section>
<!-- FAKE HEADER -->

<!-- 
---
SECTION ARTICLE
---
-->
    <section class="flex flex-wrap gap-12 justify-center max-w-[1300px] mx-auto">
        <?php
            foreach ($posts as $post) {
                echo $post->getPostCard();
            }
        ?>
    </section>
<!-- 
---
SECTION ARTICLE
---
-->

<!-- SLIDER -->
<script src="slider.js"></script>
</body>
</html>