// ============BACKGROUND PARTICLES=================
particlesJS("particles-js", {
    "particles": {
        "number": {
            "value": 80,
            "density": {
                "enable": true,
                "value_area": 700 } },

        "color": {
            "value": "#ffffff" },

        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000" },

            "polygon": {
                "nb_sides": 5 } },


        "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
                "enable": false,
                "speed": 0.1,
                "opacity_min": 0.1,
                "sync": false } },


        "size": {
            "value": 3,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 10,
                "size_min": 0.1,
                "sync": false } },


        "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#28D7B2",
            "opacity": 0.4,
            "width": 1 },

        "move": {
            "enable": true,
            "speed": 2,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 1200 } } },



    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": true,
                "mode": "grab" },

            "onclick": {
                "enable": true,
                "mode": "push" },

            "resize": true },

        "modes": {
            "grab": {
                "distance": 140,
                "line_linked": {
                    "opacity": 1 } },


            "bubble": {
                "distance": 400,
                "size": 40,
                "duration": 2,
                "opacity": 8,
                "speed": 3 },

            "repulse": {
                "distance": 200,
                "duration": 0.4 },

            "push": {
                "particles_nb": 4 },

            "remove": {
                "particles_nb": 2 } } },

    "retina_detect": true });

$(document).ready(function(){
    let request;
    let user;
    $(document).ready(function(){
        request = $.ajax({
            url: '../../Controller/InitController.php'
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            console.log("Welcome");
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

});


