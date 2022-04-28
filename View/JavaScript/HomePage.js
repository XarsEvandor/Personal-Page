let request;
let user;
$(document).ready(function(){
    request = $.ajax({
        url: '../../Controller/SessionHolder.php'
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        //This will throw an error when you are not logged in. It does not affect functionality.
        try {
            user = JSON.parse(response);
        } catch (e) {
            return;
        }
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

class Typewriter {
    constructor({ text, time = 300 }) {
        this.texts = text.split(",");
        this.sT = document.querySelector(".secondary__title");
        this.realTime = time;
        this.wait = time + 1000;
        this.changeTime = 0;
        this.length = this.texts.length;
        this.countChar = 0;
        this.current = 0;
        this.flag = false;

        this.cutText();
    }

    cutText() {
        const text = this.texts[this.current];
        const tLength = this.texts[this.current].length;

        if (this.countChar === tLength){
            this.changeTime = this.wait;
        }

        if (this.flag && this.countChar === tLength - 1){
            this.changeTime = this.realTime / 4;
        }

        if (this.countChar === 0) {
            this.changeTime = this.realTime;
        }

        this.drawText(text.substr(0, this.countChar));

        if (!this.flag) {
            this.countChar++;
            if (this.countChar === tLength) {
                this.flag = true;
            }

        } else if (this.flag) {
            this.countChar--;
            if (this.countChar === 0) {
                this.flag = false;
                this.current = ++this.current % this.length;
            }
        }

        setTimeout(() => this.cutText(), this.changeTime);
    }

    drawText(chars) {
        this.sT.innerHTML = chars;
    }
}

new Typewriter({
    text: "developer,designer,musician,Yakuza: Like a dragon enjoyer",
    time: 200
});

//========================= OBSERVER ================================
const observer = new IntersectionObserver(entries => {
    // Loop over the entries
    entries.forEach(entry => {
        let element = entry.target;

        // If the element is visible
        if (entry.isIntersecting) {

            if (element.id === 'lineOne'){
                // Add the animation class
                entry.target.classList.add('lineOne-animation');
            }

            if (element.id === 'lineTwo'){
                // Add the animation class
                entry.target.classList.add('lineTwo-animation');
            }

            if (element.id === 'lineThree'){
                // Add the animation class
                entry.target.classList.add('lineThree-animation');
            }

            if (element.id === 'lineFour'){
                // Add the animation class
                entry.target.classList.add('lineFour-animation');
            }
        }

    });
});

document.getElementsByClassName("lineOne")[0].id = "lineOne";
document.getElementsByClassName("lineTwo")[0].id = "lineTwo";
document.getElementsByClassName("lineThree")[0].id = "lineThree";
document.getElementsByClassName("lineFour")[0].id = "lineFour";

observer.observe(document.querySelector('.lineOne'));
observer.observe(document.querySelector('.lineTwo'));
observer.observe(document.querySelector('.lineThree'));
observer.observe(document.querySelector('.lineFour'));
//========================= OBSERVER ================================


/*================================== CARDS / STORE ==============================*/

var $cards = $('.card-object'),
    $faceButtons = $('.face');

$faceButtons.on('click', flipCard);

function flipCard(event) {
    event.preventDefault();

    var $btnFace = $(this),
        $card = $btnFace.parent('.card-object');

    if( $card.hasClass('flip-in') ) {
        closeCards();
    } else {
        closeCards();
        openCard($card);
    }

}

function closeCards() {
    $cards.each( function() {
        $(this)
            .filter('.flip-in')
            .removeClass('flip-in')
            .queue( function() {
                // Force reflow hack
                var reflow = this.offsetHeight;
                $(this)
                    .addClass('flip-out')
                    .dequeue();
            })

    });
}

function openCard($card) {
    $card
        .removeClass('flip-out')
        .queue( function() {
            // Force reflow hack
            var reflow = this.offsetHeight;
            $(this)
                .addClass('flip-in')
                .dequeue();
        });

}
/*================================== CARDS / STORE ==============================*/