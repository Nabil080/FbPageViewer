const postsSectionDiv = document.querySelector('#posts-section');
const paginationDiv = document.querySelector('.pagination')
const previousButton = paginationDiv.querySelector('#prev-page')
const nextButton = paginationDiv.querySelector('#next-page')

if(nextButton){
    nextButton.addEventListener('click',(e) => updateData(e))
}
if(previousButton){
    previousButton.addEventListener('click',(e) => updateData(e))
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
        postsSectionDiv.innerHTML = data.posts
        nextButton.dataset.url = data.next
        previousButton.dataset.url = data.previous

        manageCards()
    })
}
updateData()