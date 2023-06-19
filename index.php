<?php require('Api.php');
$img = "https://scontent.fsxb1-1.fna.fbcdn.net/v/t39.30808-6/354040923_114421415013616_3379430468213691418_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=730e14&_nc_ohc=RibXwI7xLuYAX-n41Ni&_nc_ht=scontent.fsxb1-1.fna&edm=AKIiGfEEAAAA&oh=00_AfAPc01KkW9p7Lfsg5nlPylA2CwzprrDn7QzxCZ_LzbP3g&oe=64951054";?>
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
    <section id="posts-section" class="flex flex-wrap gap-12 justify-center max-w-[1300px] mx-auto mt-12">
        <!-- Cards récupérées en AJAX dans pagination.js et pagination.php -->
    </section>
    <div class="pagination max-w-[1300px] mx-auto my-4 flex justify-between mb-12">
            <button id="prev-page" data-url="" class="mr-auto">Précédent</button>
            <button id="next-page" data-url="" class="ml-auto">Voir plus de publications</button>
    </div>
<!-- 
---
SECTION ARTICLE
---
-->

<!-- MODAL voir plus -->
<dialog id="modal-info" class="hidden xl:w-1/2 md:h-4/5 p-6 grid fixed">
    <button id="close-modal" class="absolute top-2 right-2"><i class="fa fa-xmark"></i></button>
    <div class="overflow-y-scroll [&>*]:mx-auto p-6 border relative">
        <div>
            <p id="modal-text">
                <!-- texte rempli en JS dans modal.js -->
            </p>
        </div>
        <div id="modal-images" class="grid gap-6 place-items-center mt-4">
                <!-- images remplies en JS dans modal.js -->
        </div>
    </div>
</dialog>
<!-- MODAL voir plus -->

<!-- FAKE FOOTER -->
<div class="w-full h-16 grid place-items-center bg-black text-white">FOOTER</div>
<!-- FAKE FOOTER -->




<!-- PAGINATION -->
<script src="pagination.js"></script>

<!-- SLIDER -->
<script src="slider.js"></script>

<!-- MODAL -->
<script src="modal.js"></script>

<script>
    managePagination()
    manageCards()
    manageInfoModal()
</script>

</body>
</html>