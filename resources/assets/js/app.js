$(document).ready(function () {

    $('.btn_home').hide();

    var isDraggable = true;
    var isMobile = false;
    var offset = 0.8;
    var timelineBlocks = $('.cd-timeline-block');

    if (isMobileAndTablet()) {
        isDraggable = false;
        isMobile = true;
    }

    //Google Maps
    $('#gmap').gmap3({
        address: "Nantes, France", // center
        zoom: 14,
        scrollwheel: false,
        draggable: isDraggable,
        mapTypeId : google.maps.MapTypeId.ROADMAP
    })
    .marker([
        {
            address: "Nantes, France",
            icon: $('#gmap').data('icon-url')
        }
    ]);

    //animate skills bar
    $('.skills').each(function () {
        $(this).children('.percentage').hide();
        $(this).appear(function () {
            var width = $(this).data('width');
            $(this).animate({
                width: width + '%'
            }, function () {
                $(this).children('.percentage').show();
            });
        });
    });

    //hide timeline blocks which are outside the viewport
    hideBlocks(timelineBlocks, offset);

    //on scolling, show/animate timeline blocks when enter the viewport
    $(window).on('scroll', function () {
        if (!window.requestAnimationFrame) {
            setTimeout(function () {
                showBlocks(timelineBlocks, offset);
            }, 100);
        } else {
            showBlocks(timelineBlocks, offset);
        }
    });

    checkScroll($(window).scrollTop());

    $(window).scroll(function () { //Au scroll dans la fenetre on déclenche la fonction
        checkScroll(this.scrollY);
    });

    // Navbar for movile
    if (is_touch_device()) {
        $('#nav-mobile').css({
            overflow: 'auto'
        });
    }

    // Set checkbox on forms.html to indeterminate
    var indeterminateCheckbox = document.getElementById('indeterminate-checkbox');
    if (indeterminateCheckbox !== null) {
        indeterminateCheckbox.indeterminate = true;
    }

    // Plugin initialization
    $('.scrollspy').scrollSpy();
    $('.button-collapse').sideNav({
        edge: 'left',
        closeOnClick: true // Closes side-nav on <a> clicks
    });
    $('textarea#message').characterCounter();

    if (!isMobile) {
        $('.parallax').parallax();
    } else {
        $('.parallax img').css("display", "block").css("left", "40%").css("bottom", "-170px");
    }
});

(function() {
    $('#formulaire').submit(function (e) {
        // Stop form from submitting normally
        e.preventDefault();

        var recaptchaResponse = $('#g-recaptcha-response').val();
        var message = $('#message').val();
        var email = $('#email').val();
        var lastname = $('#last_name').val();
        var firstname = $('#first_name').val();

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: {
                "firstname": firstname,
                "lastname": lastname,
                "email": email,
                "message": message,
                "recaptcha": recaptchaResponse
            },
            dataType: "json",
            complete: function (response) {
                if (!response.responseJSON.error) {
                    setFlash("success", response.responseJSON.message);
                    document.getElementById("formulaire").reset();
                } else {
                    setFlash("danger", response.responseJSON.message);
                }
            }
        });
    });
})();

(function() {
    $('.language_flag').click(function () {
        if (!$(this).hasClass('active')) {
            $.ajax({
                url: $(this).data('url'),
                type: 'GET',
                success: function (result) {
                    location.reload();
                }
            });
        }
    });
})();

function isMobileAndTablet() {
    var check = false;
    (function (a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
}

function is_touch_device() {
    try {
        document.createEvent("TouchEvent");
        return true;
    } catch (e) {
        return false;
    }
}

function checkScroll(pos) {
    //si on a défilé de plus de 550px du haut vers le bas
    if (pos > document.getElementById('home').offsetHeight) {
        //on ajoute la classe "fixNavigation" à <nav id="navigation">
        $('#navigation').addClass("fixNavigation");
        $('#about').css('margin-top', '64px');
        // Show btn home
        $('#btn_home').fadeIn(500);
    } else {
        //sinon on retire la classe "fixNavigation" à <nav id="navigation">
        $('#navigation').removeClass("fixNavigation");
        $('#about').css('margin-top', 'auto');
        //hide btn home
        $('#btn_home').fadeOut(500);
    }
}

function hideBlocks(blocks, offset) {
    blocks.each(function () {
        ($(this).offset().top > $(window).scrollTop() + $(window).height() * offset) && $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
    });
}

function showBlocks(blocks, offset) {
    blocks.each(function () {
        ($(this).offset().top <= $(window).scrollTop() + $(window).height() * offset && $(this).find('.cd-timeline-img').hasClass('is-hidden')) && $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
    });
}

function setFlash(type, libelle) {
    var flash = '<div class="delete"><div class="chip col s12 z-depth-1 ' + type + '"> ' + libelle + '</div><br></div>';

    $('#ancre_flash').after(flash);

    $('html, body').animate({
        scrollTop: $("#formulaire").offset().top - 64
    }, 200);

    $('.delete').delay(3000).fadeOut(500, function () {
        $(this).remove();
    });
}