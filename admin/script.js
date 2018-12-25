function displayModal(x){
    var modal = document.getElementById("editModal");
    var index = document.getElementById("indexno");
    modal.style.display = "block";
    index.value = x;
}

function closeModal(){
    var modal = document.getElementById("editModal");
    modal.style.display = "none";
}

window.onclick = function(event) {
    var modal = document.getElementById("editModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}