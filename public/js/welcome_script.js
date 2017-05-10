    $(document).on('scroll', function (e) {
        var opacity = $(document).scrollTop() / 500;
        $('.navbar').css('background-color', 'rgba(255, 255, 255,'+opacity);
    });

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
