/*document.getElementById("send-btn").addEventListener("click", function showFileSize() {
    // (Can't use `typeof FileReader === "function"` because apparently it
    // comes back as "object" on some browsers. So just see if it's there
    // at all.)
    if (!window.FileReader) { // This is VERY unlikely, browser support is near-universal
        console.log("The file API isn't supported on this browser yet.");
        return;
    }

    var input = document.getElementById('image');
    if (!input.files) { // This is VERY unlikely, browser support is near-universal
        console.error("This browser doesn't seem to support the `files` property of file inputs.");
    } else if (!input.files[0]) {
        addPara("Please select a file before clicking 'Load'");
    } else {
        var file = input.files[0];
        if (file.size > 1024) {
            addPara();
        }
    }
});

function addPara() {
    alert('Tiedosto on liian iso.');
    window.location.href = 'intra.php';
}*/