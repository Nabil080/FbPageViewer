function manageCards()
{
    const cards = document.querySelectorAll('.post-card')
    cards.forEach(card => manageCardSlider(card))
}

function manageCardSlider(card){
    const slider = card.querySelector('.slider-container')
    const prev = card.querySelector('.prev-image')
    const next = card.querySelector('.next-image')
    const imageCounter = card.querySelector('.image-counter')
    
    const totalImages = card.querySelectorAll("img").length
    let currentImage = 0

    if(prev && next){
        slideImage()
        next.addEventListener('click' , manageNextButton)
        prev.addEventListener('click' , managePrevButton)
    }

    function manageNextButton() {
        if(currentImage + 1 < totalImages){
            currentImage++
        }else{
            currentImage = 0
        }
        slideImage()
    }

    function managePrevButton() {
        if(currentImage > 0){
            currentImage--
        }else{
            currentImage = totalImages - 1
        }
        slideImage()
    }

    function slideImage(){
        slider.scrollLeft = slider.clientWidth * currentImage
        imageCounter.innerText = `${currentImage + 1} / ${totalImages}`
    }
}
