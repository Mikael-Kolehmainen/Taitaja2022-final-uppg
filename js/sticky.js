if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {

    var top = document.getElementById("sticky");

    top.classList.add("sticky");
}