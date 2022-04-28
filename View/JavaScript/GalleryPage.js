// create references to the modal...
const modal = document.getElementById('myModal');
// to all images -- note I'm using a class!
const images = document.getElementsByClassName('card');
// the image in the modal
const modalImg = document.getElementById("img01");
// and the caption in the modal
const captionText = document.getElementById("caption");

// Go through all of the images with our custom class
for (let i = 0; i < images.length; i++) {
    let img = images[i];
    // and attach our click listener for this image.
    img.onclick = function(evt) {
        console.log(evt);
        modal.style.display = "block";
        let style = window.getComputedStyle(img);
        let source = style.backgroundImage.slice(4, -1).replace(/"/g, "");
        modalImg.src = source;
        captionText.innerHTML = document.getElementsByClassName('card-name').item(0).textContent;
    }
}

let span = document.getElementsByClassName("close")[0];

span.onclick = function() {
    modal.style.display = "none";
}

let request;
let user;
$(document).ready(function(){
    request = $.ajax({
        url: '../../Controller/SessionHolder.php'
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        user = JSON.parse(response);
        if (jQuery.isEmptyObject(user)){
            return;
        }
        $("#loginText").empty();
        $("#loginText").append("Logout");
        $("#loginText").attr("href", "../../Controller/LogOutController.php")

        $("#name-text").empty();
        $("#name-text").append(user.userName);
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });
});
