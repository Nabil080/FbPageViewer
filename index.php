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

<!-- MODAL voir plus -->
<section id="more-info" class="fixed hidden inset-0 z-30 bg-black bg-opacity-50 grid place-items-center">
    <div class="relative bg-white w-4/5 h-4/5 p-10">
        <div class="w-full flex justify-end"><i class="fa fa-xmark m-4 cursor-pointer"></i></div>
        <div class="flex flex-col">
            <div id="modal-slider-container" class="h-3/5 w-full overflow-hidden">
                <div id="modal-slider" class="flex h-3/5 overflow-scroll scroll-smooth relative">
                    <!-- img en js -->
                </div>
            </div>
            <div id="modal-text" class="h-grow">
                <!-- texte en js -->
            </div>
        </div>
    </div>
</section>
<!-- MODAL voir plus -->


<!-- MODAL -->
<script>
    function manageInfoModal()
    {
        const modalDiv = document.querySelector('#more-info')
        const modalSlider = document.querySelector('#modal-slider')
        const modalText = modalDiv.querySelector('#modal-text')
        const modalButtons = document.querySelectorAll('.more-info')
        const modalClose = modalDiv.querySelector('.fa-xmark')
    
        modalButtons.forEach(button => button.addEventListener('click', event => openModal(event)))
        modalClose.addEventListener('click', closeModal)
    
        function openModal(event){
            let post = document.querySelector(`#${event.target.dataset.postId}`)
            let postImages = post.querySelectorAll('.post-image')
            let postMessage = post.querySelector('h3').innerText

            modalDiv.classList.remove('hidden')
            modalText.innerText = postMessage
            modalSlider.innerHTML = ""
            postImages.forEach(image => modalSlider.innerHTML += 
            `
            <img src='${image.src}' class="post-image object-cover m-auto max-h-full">
            `)

        }
        
        function closeModal(){
            modalDiv.classList.add('hidden')
        }
    }
</script>


<!-- SLIDER -->
<script src="slider.js"></script>

<!-- PAGINATION -->
<script src="pagination.js"></script>

</body>
</html>