    $(document).on('scroll', function (e) {
        var opacity = $(document).scrollTop() / 500;
        $('.navbar').css('background-color', 'rgba(255, 255, 255,'+opacity);
        if($(document).scrollTop()==0){
            $('.navbar').css('box-shadow', '');
        }else{
            $('.navbar').css('box-shadow', '0px '+opacity+'px 10px #888888');
        }

    });
    console.log($(document).scrollTop());
    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        console.log("anchor: " + $anchor);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();

    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.fixed-top',
        offset: 51
    });

    // Collapse before action (tablets, phones)
    $(".navbar-collapse ul li .only").click(function() {
        $(".navbar-toggler:visible").click()
    });

    //scrollReveal
    window.$sr= ScrollReveal();
    $sr.reveal(".sr-icons", {
        duration: 600,
        scale: .3,
        distance: "0px"
    }, 200);
    $sr.reveal(".sr-btn",{
        duration: 1e3,
        delay: 200
    });
    
    $(document).ready(function(){
        $('.arrow').click(function(e){
            $(this).toggleClass('arrow-show arrow-show-bg').next().toggleClass('left-0');
        });
    });

    $(document).ready(function(){
        var registerForm = $("#registerForm");
        registerForm.submit(function(e){
            e.preventDefault();
            var formData = registerForm.serialize();
            $( '#register-errors-name' ).html( "" );
            $( '#register-errors-surname' ).html( "" );
            $( '#register-errors-email' ).html( "" );
            $( '#register-errors-password' ).html( "" );
            $("#register-name").removeClass("has-error");
            $("#register-surname").removeClass("has-error");
            $("#register-email").removeClass("has-error");
            $("#register-password").removeClass("has-error");

            $.ajax({
                url:'/register',
                type:'POST',
                data:formData,
                success:function(data){
                    $('#modalRegister').modal( 'hide' );
                    location.reload(true);
                },
                error: function (data) {
                    console.log(data.responseText);
                    var obj = jQuery.parseJSON( data.responseText );
                    if(obj.name){
                        $("#register-name").addClass("has-error");
                        $( '#register-errors-name' ).html( obj.name );
                    }
                    if(obj.first_surname){
                        $("#register-surname").addClass("has-error");
                        $( '#register-errors-surname' ).html( obj.first_surname );
                    }
                    if(obj.email){
                        $("#register-email").addClass("has-error");
                        $( '#register-errors-email' ).html( obj.email );
                    }
                    if(obj.password){
                        $("#register-password").addClass("has-error");
                        $( '#register-errors-password' ).html( obj.password );
                    }
                }
            });
        });

        var loginForm = $("#loginForm");
        loginForm.submit(function(e) {
            e.preventDefault();
            var formData = loginForm.serialize();
            $('#form-errors-email').html("");
            $('#form-errors-password').html("");
            $('#form-login-errors').html("");
            $("#email-div").removeClass("has-error");
            $("#password-div").removeClass("has-error");
            $("#login-errors").removeClass("has-error");
            $.ajax({
                url: '/login',
                type: 'POST',
                data: formData,
                success: function(data) {
                    $('#modalLogin').modal('hide');
                    location.reload(true);
                },
                error: function(data) {
                    console.log(data.responseText);
                    var obj = jQuery.parseJSON(data.responseText);
                    if (obj.email) {
                        $("#email-div").addClass("has-error");
                        $('#form-errors-email').html(obj.email);
                    }
                    if (obj.password) {
                        $("#password-div").addClass("has-error");
                        $('#form-errors-password').html(obj.password);
                    }
                    if (obj.error) {
                        $("#login-errors").addClass("has-error");
                        $('#form-login-errors').html(obj.error);
                    }
                }
            });
        });



    });