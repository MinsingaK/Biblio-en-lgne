/*********************page principale index.html***************** */
//traitement du bouton de recherche

const widget = document.querySelector(".widget")

const btn = document.querySelector(".btn")

const input = document.querySelector(".input")

btn.addEventListener('click', () => {
    widget.classList.toggle("active")
    input.focus()
})


//traitement de la sidebar
let boutton = document.querySelector("#btn")
let sidebar= document.querySelector(".sidebar")

boutton.onclick = function(){
  sidebar.classList.toggle("active")
}
