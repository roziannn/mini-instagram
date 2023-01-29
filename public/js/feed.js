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
function like(id) {
    const el = document.getElementById('post-btn-' + id)
    fetch('/like/' + id)
        .then(response => response.json())
        .then(data => {
            el.innerText = (data.status == 'LIKE') ? 'unlike' : 'like'
        });
}