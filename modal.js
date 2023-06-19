function manageInfoModal()
{
    const modalDiv = document.querySelector('#modal-info')
    const modalImages = document.querySelector('#modal-images')
    const modalText = modalDiv.querySelector('#modal-text')
    const modalButtons = document.querySelectorAll('.more-info')
    const modalClose = modalDiv.querySelector('#close-modal')

    modalButtons.forEach(button => button.addEventListener('click', event => openModal(event)))
    modalClose.addEventListener('click', closeModal)

    function openModal(event){
        let post = document.querySelector(`#${event.target.dataset.postId}`)
        let postImages = post.querySelectorAll('.post-image')
        let postMessage = post.querySelector('h3').innerText

        modalDiv.showModal()
        modalDiv.classList.remove('hidden')
        modalText.innerText = postMessage
        modalImages.innerHTML = ""
        postImages.forEach(image => modalImages.innerHTML += 
        `
        <img src='${image.src}'>
        `)

    }
    
    function closeModal(){
        modalDiv.close()
        modalDiv.classList.add('hidden')
    }
}
