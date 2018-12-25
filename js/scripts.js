var show = document.getElementsByClassName("show_more")[0];
var body = document.getElementById("hidden");
var arrow = document.getElementById("show_more_text");
show.addEventListener("click", () => {
    if (body.classList.contains("hidden_table")) {
        body.classList.remove("hidden_table");
        arrow.classList.remove("fa-angle-down");
        arrow.classList.add("fa-angle-up");
    }
    else {
        body.classList.add("hidden_table");
        arrow.classList.remove("fa-angle-up");
        arrow.classList.add("fa-angle-down");
    }
});