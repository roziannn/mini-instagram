//infinite scroll
let postTime = ''
let lastPostTime = ''
let lastFetchTime = ''

window.onscroll = function() {

    const bodyHeight = document.body.scrollHeight
    const scrollPoint = window.scrollY + window.innerHeight
    const tolerantDistance = 100

    postTime = document.getElementsByClassName('post-time')
    lastPostTime = postTime[postTime.length - 1].value

    if(scrollPoint >= bodyHeight - tolerantDistance) {

        if(lastFetchTime != lastPostTime) {

            fetch('/loadmore/' + lastPostTime)
                .then(response => response.json())
                .then(data => {
                    console.log('load more..')
                    console.log(data)
                    lastFetchTime = lastPostTime
                })
                .catch(err => console.log(err))
        }
    }
}

// # = %23 (in url)
// $1 = hasil pencarian (regular expresion)
//finding hastag 
document.querySelectorAll(".captions").forEach(function(el) {
    //sistem pencarian = "<a href='/search?query=%23$1'>#$1</a>"
    let renderedText = el.innerHTML.replace(/#(\w+)/g, "<a href='/search?query=%23$1'>#$1</a>");
    el.innerHTML =
        renderedText //render caption jika ada # agar bisa ditampilkan semua sesuai hastag yg digunakan
})

//finding post with caption
function like(id, type='POST') {

    let likesCount = 0
    let el = ''

    if (type == 'POST'){
        el = document.getElementById('post-btn-' + id)
        likesCount = document.getElementById('post-likescount-' +id)
    }else{
        el = document.getElementById('comment-btn-' + id)
        likesCount = document.getElementById('comment-likescount-' +id)
    }

    fetch('/like/' + type + '/' + id)
        .then(response => response.json())
        .then(data => {
            let currentCount = 0
            
            if (data.status == 'LIKE'){
                currentCount = parseInt(likesCount.innerHTML) + 1
                el.innerText = 'unlike' 
             }else{
                currentCount = parseInt(likesCount.innerHTML) - 1
                el.innerText = 'like' 
            }

            likesCount.innerHTML = currentCount
        });
    
        return false
}