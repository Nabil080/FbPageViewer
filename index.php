<?php require('Post.php') ?>
<?php require('Api.php') ?>
<?php 
$Api = new Api();
$posts = $Api->getAllPosts(2);
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
    <section id="posts-section" class="flex flex-wrap gap-12 justify-center max-w-[1300px] mx-auto">
        <!-- Cards récupérés en AJAX dans pagination.js et pagination.php -->
    </section>
    <div class="pagination max-w-[1300px] mx-auto my-4 flex justify-between">
        <?php if(isset($Api->previousUrl)){ ?>
            <button id="prev-page" data-url="<?=$Api->previousUrl?>" class="mr-auto">Précédent</button>
        <?php }; if(isset($Api->nextUrl)){ ?>
            <button id="next-page" data-url="<?=$Api->nextUrl?>" class="ml-auto">Suivant</button>
        <?php } ?>
    </div>
<!-- 
---
SECTION ARTICLE
---
-->

<!-- SLIDER -->
<script src="slider.js"></script>

<!-- PAGINATION -->
<script src="pagination.js"></script>

</body>
</html>