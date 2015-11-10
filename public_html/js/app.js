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
