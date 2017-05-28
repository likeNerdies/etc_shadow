$(document).on('scroll', function (e) {

    // If there's no background-image, we don't want to keep the opacity transition
    if ($('.background-image').length == 0) {
      var opacity = 1;
      $('.navbar').css('background-color', 'rgba(255, 255, 255,' + 8);
    } else {
      var opacity = $(document).scrollTop() / 500;
      $('.navbar').css('background-color', 'rgba(255, 255, 255,' + opacity);
    }

    if ($(document).scrollTop() == 0) {
        $('.navbar').css('box-shadow', '');
    } else {
        $('.navbar').css('box-shadow', '0px ' + opacity + 'px 10px #888888');
    }

});
console.log($(document).scrollTop());
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(document).on('click', 'a.page-scroll', function (event) {
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
$(".navbar-collapse ul li .only").click(function () {
    $(".navbar-toggler:visible").click()
});

//scrollReveal
window.$sr = ScrollReveal();
$sr.reveal(".sr-icons", {
    duration: 600,
    scale: .3,
    distance: "0px"
}, 200);
$sr.reveal(".sr-btn", {
    duration: 1e3,
    delay: 200
});

$(document).ready(function (event) {
    ///////////////////////////////////////////////////////////////CAROUSEL
    $('#image').carousel({
        interval: 4000
    });

    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        var id = id_selector.substr(id_selector.length - 1);
        var id = parseInt(id);
        $('#image').carousel(id);
    });

    ////////////////////////////////////////////////////////////////////ARROW SLIDER

    $('.arrow').click(function (e) {
        $(this).toggleClass('arrow-show arrow-show-bg').next().toggleClass('left-0');
    });


    //////////////////////////////////////////////////////////////////FUNCTION MEDIA QUERY
    function mediaQuery() {

        $(document).on('click', '#hamburger', function () {
            if ($('.profile-content-show').is(':visible')) {
                $('.profile-content').toggleClass('profile-content-show');
            }
            $('#navbarTogglerDemo02').slideToggle();
        });

        $(document).on('click', 'span#tog-profile', function () {
            if ($('#navbarTogglerDemo02').is(':visible') && window.matchMedia('(max-width:860)').matches) {
                $('#navbarTogglerDemo02').slideToggle();
            }
            $('.profile-content').toggleClass('profile-content-show');
        });

    }


    $(document).ready(mediaQuery);


    //////////////////////////////////////////////////////////////////////SIDEBAR
    $('#title-categories, #title-brands, #title-diets').click(function (e) {
        $(this).toggleClass('filter-title-toggled');
        var idParent = $(this)[0].id;
        var idChildren = $(this).children()[1].id;

        $('#' + idChildren).toggleClass('rotate-45');

        if ('#' + idParent == '#title-categories') $('#categories').slideToggle();
        else if ('#' + idParent == '#title-brands') $('#brands').slideToggle();
        else $('#diets').slideToggle();

    });

    //////////////////////////////////////////////SEE MORE SIDEBAR FILTER
    $(document).on('click', '.tog-more,.tog-less', function () {
        var parent = $(this).parent()[0].id;

        var togElement = $(this).parent().parent()[0].id;

        $(this).hide().fadeOut(function () {
            $('#sm-' + togElement).slideToggle(500, 'easeOutSine', function () {

                if ($(this).is(':visible')) {
                    var see = '<span class="tog-less pt-3"><i class="fa fa-minus ml-2rem toggle" aria-hidden="true"></i>See Less</span>';
                } else {
                    var see = '<span class="tog-more pt-3"><i class="fa fa-plus ml-2rem toggle" aria-hidden="true"></i>See More</span>';
                }

                $('#' + parent).append($(see).hide().fadeIn());
            });
        });
    });

    /*$('.tog-more').click(function () {
     $(this).fadeOut(500,'easeInOutExpo',function () {
     $('#sm-diets').slideToggle(700,'easeInOutQuart');
     });
     });*/

    /* $(document).on('click','.tog-less', function () {
     $(this).remove();
     $('#sm-diets').slideToggle(function () {

     $('#content-diets').append(see)
     });
     });*/


    ////////////////////////////////////////////////////////SEARCH FILTER

    $('#filter_submit_btn').on('click', function (e) {
        var filter_form = $("#filter_form");
        filter_form.submit(function (e) {
            e.preventDefault();
            var formData = filter_form.serialize();

            $.ajax({
                url: '/products/search/dynamic',
                type: 'GET',
                data: formData,
                success: function (data) {
                    console.log(data)
                    $('#products').empty();

                    var products="";
                    if(data.length==0){
                        products+="<h2>no result</h2>";
                    }else{
                        for(var i=0;i<data.length;i++){
                            products+='<div class="card-wrapper mx-2">';
                            products+=' <a href="/products/'+data[i].id+'">';
                            products+=' <div class="card p-2">';
                            if(data[i].images.length==0 || data[i].images==null){
                                products+=' <img src="/img/user_products/no_image_available.png" class="rounded product-img card-img-top img-fluid" alt="No image available">';
                            }else{
                                products+=' <div class="mt-2"><img class="rounded product-img card-img-top img-fluid" src="/products/'+data[i].id+'/image/'+0+'"></div>';
                            }
                            products+='   <div class="card-block pt-1"><h4 class="card-title"> '+data[i].name+'</h4></div>';
                            products+=' <div class="card-footer">';

                            if(data[i].vegan==1){
                                products+=' <p class="d-inline diet card-text"><i class="fa fa-check mx-1" aria-hidden="true"></i>Vegan</p>';
                            }
                            if(data[i].vegetarian==1){
                                products+=' <p class="d-inline diet"><i class="fa fa-check mx-1" aria-hidden="true"></i>Vegetarian</p>';
                            }
                            if(data[i].organic==1){
                                products+='  <p class="d-inline diet"><i class="fa fa-check mx-1" aria-hidden="true"></i>Organic</p>';
                            }

                            products+='</div></div></a></div>';
                        }
                    }

                    $('#products').html(products);
                },
                error: function (data) {
                    console.log(data.responseText);
                }
            });

        });
    });

    ///////////////////////////////////////////////////////END SEARXH FILTER


    ////////////////////////////////////////////LANG CHANGE

    $('#changelang').on('change', function (e) {
        var valueSelected = this.value;
        this.form.submit();
    });

    /////////////////////////////////////////////END LANG CHANGE


});

$(document).ready(function () {
    var registerForm = $("#registerForm");
    registerForm.submit(function (e) {
        e.preventDefault();
        var formData = registerForm.serialize();
        $('#register-errors-name').html("");
        $('#register-errors-surname').html("");
        $('#register-errors-email').html("");
        $('#register-errors-password').html("");
        $("#register-name").removeClass("has-error");
        $("#register-surname").removeClass("has-error");
        $("#register-email").removeClass("has-error");
        $("#register-password").removeClass("has-error");

        $.ajax({
            url: '/register',
            type: 'POST',
            data: formData,
            success: function (data) {
                $('#modalRegister').modal('hide');
                location.reload(true);
            },
            error: function (data) {
                console.log(data.responseText);
                var obj = jQuery.parseJSON(data.responseText);
                if (obj.name) {
                    $("#register-name").addClass("has-error");
                    $('#register-errors-name').html(obj.name);
                }
                if (obj.first_surname) {
                    $("#register-surname").addClass("has-error");
                    $('#register-errors-surname').html(obj.first_surname);
                }
                if (obj.email) {
                    $("#register-email").addClass("has-error");
                    $('#register-errors-email').html(obj.email);
                }
                if (obj.password) {
                    $("#register-password").addClass("has-error");
                    $('#register-errors-password').html(obj.password);
                }
            }
        });
    });

    var loginForm = $("#loginForm");
    loginForm.submit(function (e) {
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
            success: function (data) {
                $('#modalLogin').modal('hide');
                location.reload(true);
            },
            error: function (data) {
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
