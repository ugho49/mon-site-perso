$(document).ready(function(){
    $('.btn_home').hide();

    var isDraggable = $(document).width() > 480 ? true : false;
    var isMobile = $(document).width() <= 480 ? true : false;

    //Google Maps
    $('#gmap').gmap3({
        marker:{address:"Nantes, France", options:{icon: "img/location.png"}},
        map:{
            options:{
                zoom: 14,
                scrollwheel: false,
                draggable: isDraggable
            }
        }
    });

    //animate skills bar
    $('.skills').each(function () {
        $(this).children('.percentage').hide();
        $(this).appear(function() {
            var width = $(this).data('width');
            $(this).animate({
                width: width + '%'
            }, function() {
                $(this).children('.percentage').show();
            });
        });
    });

    //animate each parcours
    $('.timeline-element').each(function () {
        $(this).appear(function() {

            if (!isMobile) {
                $(this).addClass('animated slideInRight');

                $(this).animate({
                    opacity: 1
                }, 10, function() {
                    // Animation complete.
                });
            } else {
                $(this).css("opacity", 1);
            }
        });
    });

    checkScroll($(window).scrollTop());
    $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
        checkScroll(this.scrollY);
    });


    $('#formulaire').submit(function( event ) {
        // Stop form from submitting normally
        event.preventDefault();

        var recaptchaResponse = $('#g-recaptcha-response').val();
        var message = $('#message').val();
        var email = $('#email').val();
        var nom = $('#last_name').val();
        var prenom = $('#first_name').val();

        $.ajax({
    		type: "POST",
    		url: "ajax.php",
            data: {"prenom" : prenom, "nom" : nom, "email" : email, "message" : message, "recaptcha" : recaptchaResponse},
    		dataType: "json",
    		success: function(data) {
    			if(data.status == 'success') {
                    setFlash(data.status, data.libelle);
                    document.getElementById("formulaire").reset();
                } else {
                    setFlash(data.status, data.libelle);
                }
    		}
    	});
    });
});

function checkScroll(pos){
    //si on a défilé de plus de 550px du haut vers le bas
    if (pos > 500) {
        //on ajoute la classe "fixNavigation" à <nav id="navigation">
        $('#navigation').addClass("fixNavigation");
        $('#afterNavContainer').css('margin-top', '64px');
        // Show btn home
        $('#btn_home').fadeIn(500);
    } else {
        //sinon on retire la classe "fixNavigation" à <nav id="navigation">
        $('#navigation').removeClass("fixNavigation");
        $('#afterNavContainer').css('margin-top', 'auto');
        //hide btn home
        $('#btn_home').fadeOut(500);
    }
}

function setFlash(type, libelle) {
    var flash = '<div class="chip col s12 z-depth-1 ' + type + '"> ' + libelle + '<i class="material-icons">close</i></div>';

    $('#ancre_flash').after(flash);

    $('.chip').delay(3000).fadeOut(500, function() {
        $(this).remove();
    });
}
