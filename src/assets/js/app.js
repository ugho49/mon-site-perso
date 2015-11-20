$(document).ready(function(){
    $('.btn_home').hide();
    checkScroll();

    var isDraggable = $(document).width() > 480 ? true : false;

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
        $('.percentage').hide();
        $(this).appear(function() {
            var b = $(this).data('width');
            $(this).animate({
                width: b + "%",
                opacity: 1
            }, 1000, "easeOutCirc", function() {
                $( this ).children('.percentage').show();
            });
        });
    });

    //animate formations et compétences
    $('.expe').each(function () {
        $(this).appear(function() {
            $(this).addClass('animated zoomIn');
        });
    });

    $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
        checkScroll();
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

function checkScroll(){
    //si on a défilé de plus de 550px du haut vers le bas
    if ($(window).scrollTop() > 500) {
        //on ajoute la classe "fixNavigation" à <nav id="navigation">
        $('#navigation').addClass("fixNavigation");
        $('#afterNavContainer').css('margin-top', '64px');
        // Show btn home
        $('.btn_home').show(500);
    } else {
        //sinon on retire la classe "fixNavigation" à <nav id="navigation">
        $('#navigation').removeClass("fixNavigation");
        $('#afterNavContainer').css('margin-top', 'auto');
        //hide btn home
        $('.btn_home').hide(500);
    }
}

function setFlash(type, libelle) {
    var flash = '<div class="chip col s12 z-depth-1 ' + type + '"> ' + libelle + '<i class="material-icons">close</i></div>';

    $('#title_form').after(flash);

    $('.chip').delay(3000).fadeOut(500, function() {
        $(this).remove();
    });
}
