function goBack() {
    window.history.back();
}

function copyLink() {
    var linkUrl = document.getElementById("linkUrl").innerText;
     navigator.clipboard.writeText(linkUrl)
         .then(function() {
             var copyFeedback = document.getElementById("copyFeedback");
             copyFeedback.innerText = "Link copied to clipboard!";
             copyFeedback.style.display = "block";
         })
         .catch(function(error) {
             console.error("Failed to copy link: ", error);
         });
 }

 function copyMessage () {
     var message = document.getElementById("message").innerText;
     navigator.clipboard.writeText(message)
         .then(function() {
             var copyFeedback = document.getElementById("copyFeedback");
             copyFeedback.innerText = "Message copied to clipboard!";
             copyFeedback.style.display = "block";
         })
         .catch(function(error) {
             console.error("Failed to copy message: ", error);
         });
 }