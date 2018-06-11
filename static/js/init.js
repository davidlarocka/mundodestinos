$(document).ready(function(){
    $('.slider').slider({full_width: true, transition: 700, height: 600, indicators: false, interval: 3000} );
    $('.zona').slider('pause');
    $('.scrollspy').scrollSpy();
    $('.modal').modal();
    $(".button-collapse").sideNav();
    $('.parallax').parallax();
    $('select').material_select();
    $('#textarea1').trigger('autoresize');
    $('.materialboxed').materialbox();
});

function nextSlider(id){
  $('#' + id).parent().slider('next');
}
function prevSlider(id){
  $('#' + id).parent().slider('prev');
}

// NOTE: destacamos el que corresponde
console.log("Destacando destino");
console.log(window.location.hash);
$('#destinos').addClass(window.location.hash);
let destinos = document.querySelectorAll('#destino');
console.log(destinos);
for (var i = 0; i < destinos.length; i++) {
  // console.log(destinos[i].className);
  if (destinos[i].className === 'destino-' + window.location.hash.replace('#', '')) {
    console.log(destinos[i].className);
    $('.' + destinos[i].className).addClass('destinoBack');
    break;
  }
}

