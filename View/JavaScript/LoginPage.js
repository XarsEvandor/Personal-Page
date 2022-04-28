//NOTE TO EXAMINER: Please dont use autofill every time. I worked hard on these color changes.

class User {
    userName;
    userEmail;
    userPassword;

    constructor(userName, userEmail, userPassword) {
        this.userEmail = userEmail;
        this.userName = userName;
        this.userPassword = userPassword;
    }

}

$(document).ready(function(){

    $('.signup-slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000
    });

    $("img").height($(".main-box").height());

    $(".to-signin").on("click", function () {
        $(this)
            .addClass("top-active-button")
            .siblings()
            .removeClass("top-active-button");
        $(".form-signup").slideUp(500);
        $(".form-signin").slideDown(500);
    });

    $(".to-signup").on("click", function () {
        $(this)
            .addClass("top-active-button")
            .siblings()
            .removeClass("top-active-button");
        $(".form-signin").slideUp(500);
        $(".form-signup").slideDown(500);
    });

    $(".to-signin-link").on("click", function () {
        $(".to-signin")
            .addClass("top-active-button")
            .siblings()
            .removeClass("top-active-button");
        $(".form-signup").slideUp(200);
        $(".form-signin").slideDown(200);
    });

    $(".to-signup-link").on("click", function () {
        $(".to-signup")
            .addClass("top-active-button")
            .siblings()
            .removeClass("top-active-button");
        $(".form-signin").slideUp(200);
        $(".form-signup").slideDown(200);
    });

    function checkFilled(JQueryElement, field){
        let boxValue = JQueryElement.val();

        if (boxValue.length === 0){
            JQueryElement.css("border-color", "palevioletred");
            JQueryElement.attr("placeholder", "Please enter "+field);
            return true;
        }
    }


    let request;
    $("#signUpForm").submit(function(event) {
        event.preventDefault();

        if(checkFilled($("#signUp-name"), "username")) return;
        if(checkFilled($("#signUp-email"), "email")) return;
        if(checkFilled($("#signUp-password"), "password")) return;

        if (!($("#terms-box").is(":checked"))){
            $(".terms").css("color", "palevioletred");
            $(".terms .lined-link").css("color", "palevioletred");
            alert("You must accept the terms and conditions.");
            return;
        }


        let user = new User($("#signUp-name").val(), $("#signUp-email").val(), $("#signUp-password").val());
        const JsonString = JSON.stringify(user);


        let credsExist = false;

        $.ajax({
            url: '../../Controller/credsCheckController.php',
            data: {'Json': JsonString},
            type: 'POST',
            success: function(output) {
                let credentials = JSON.parse(output);
                console.log(credentials);
                if (credentials.emailExists){
                    $("#signUp-email").css("color", "palevioletred");
                    alert("Email already exists!");
                    credsExist = true;
                }

                if (credentials.userNameExists){
                    $("#signUp-name").css("color", "palevioletred");
                    alert("Username already exists!");
                    credsExist = true;
                }

                if (!credsExist){
                    request = $.ajax({
                        url: '../../Controller/SignUpController.php',
                        data: {'Json': JsonString},
                        type: 'POST'
                    });

                    // Callback handler that will be called on success
                    request.done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked!");
                    });

                    // Callback handler that will be called on failure
                    request.fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error(
                            "The following error occurred: "+
                            textStatus, errorThrown
                        );
                    });
                }
            }
        });

    });

    $("#signUp-name").keydown(function (event){
        $(this).css("color", "white");
    });

    $("#signUp-email").keydown(function (event){
        $(this).css("color", "white");
    });

    $("#signIn-email").keydown(function (event){
        $(this).css("color", "white");
    });

    $("#signIn-password").keydown(function (event){
        $(this).css("color", "white");
    });


    let requestSignIn;
    $("#signInForm").submit(function(event){
        event.preventDefault();

        let user = new User("", $("#signIn-email").val(), $("#signIn-password").val());
        const JsonString = JSON.stringify(user);

        requestSignIn = $.ajax({
            url: '../../Controller/SignInController.php',
            data: {'Json': JsonString},
            type: 'POST'
        });

        // Callback handler that will be called on success
        requestSignIn.done(function (output, textStatus, jqXHR){
            if (output === "success"){
                alert("Welcome");
            }
            else if (output === "not_found"){
                alert("Email not found");
                $("#signIn-email").css("color", "palevioletred");
            }
            else if (output === "wrong_pass"){
                alert("Wrong Password");
                $("#signIn-password").css("color", "palevioletred");
            }
        });

        // Callback handler that will be called on failure
        requestSignIn.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    });


});
