function managePagination()
{
    const postsSectionDiv = document.querySelector('#posts-section');
    const paginationDiv = document.querySelector('.pagination')
    const previousButton = paginationDiv.querySelector('#prev-page')
    const nextButton = paginationDiv.querySelector('#next-page')
    const disabledButton = ['select-none','opacity-50']
    
    if(nextButton){
        nextButton.addEventListener('click',(e) => updateData(e))
    }
    if(previousButton){
        previousButton.addEventListener('click', (e) => updateData(e))
        // previousButton.addEventListener('click', showLess)
    }
    
    function updateData(e = null)
    {
        let url = e === null ? '' : e.target.dataset.url;
        fetch('pagination.php', {
            method: 'POST',
            body: JSON.stringify({url: url})
        })
        .then((response) => response.json())
        .then((data) => {
            postsSectionDiv.innerHTML += data.posts
            if(data.previous === ""){
                previousButton.classList.add('select-none','opacity-50','pointer-events-none')
            }else{
                previousButton.classList.remove('select-none','opacity-50','pointer-events-none')
                previousButton.dataset.url = data.previous
            }
            if(data.next === ""){
                nextButton.classList.add('select-none','opacity-50','pointer-events-none')
            }else{
                nextButton.classList.remove('select-none','opacity-50','pointer-events-none')
                nextButton.dataset.url = data.next
            }
    
            manageCards()
            manageInfoModal()
        })
    }
    function showLess()
    {
        const posts = postsSectionDiv.querySelectorAll('.post-card')
        let postsCount = posts.length
        let startIndex = postsCount - 3
        for(let i = startIndex; i < postsCount; i++ ){
            console.log(i)
            posts[i].remove()
        }
    }
    updateData()
}

managePagination()