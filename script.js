function goBack() {
    window.history.back();
}

function copyLink() {
    var linkUrl = document.getElementById("linkUrl").innerText;
    var linkValue = document.getElementById("linkUrl").getAttribute("href");
    var generatedLink = "<?php echo $linkUrl; ?>";
    navigator.clipboard.writeText(generatedLink)
        .then(function() {
            var copyFeedback = document.getElementById("copyFeedback");
            copyFeedback.innerText = "Link copied to clipboard!";
            copyFeedback.style.display = "block";
        })
        .catch(function(error) {
            console.error("Failed to copy link: ", error);
        });
}