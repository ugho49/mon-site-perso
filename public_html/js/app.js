$(document).ready(function(){
  //Google Maps
  $('#gmap').gmap3({
    marker:{address:"Nantes, France", options:{icon: "img/location1.png"}},
    map:{
      options:{
        zoom: 14,
        scrollwheel: false
      }
    }
  });
});

$(function(){
	$(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
	if ($(this).scrollTop() > 500) { //si on a défilé de plus de 550px du haut vers le bas
		$('#navigation').addClass("fixNavigation"); //on ajoute la classe "fixNavigation" à <nav id="navigation">
    $('#afterNavContainer').css('margin-top', '64px');
    $('#logo').css('opacity', '0').css('transition', 'opacity 0.5s');
    $('#logocenter').css('opacity', '1');
    $('#btn_home').show();

	} else {
		$('#navigation').removeClass("fixNavigation"); //sinon on retire la classe "fixNavigation" à <nav id="navigation">
    $('#logo').removeClass("brand-logo center"); //On place le logo de nouveau à gauche
    $('#afterNavContainer').css('margin-top', 'auto');
    $('#btn_home').hide();
    $('#logo').css('opacity', '1');
    $('#logocenter').css('opacity', '0').css('transition', 'opacity 0.5s');
	}
	});
});
