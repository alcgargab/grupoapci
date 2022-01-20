$(document).ready(function() {
  // CARROUSEL
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: true,
    animationLoop: false,
    slideshow: false,
    itemWidth: 100,
    itemMargin: 5
  });
  $(".flexslider ul li img").click(function() {
    var capturaIndice = $(this).attr("value");
    $(".infoProducto figure.visor img").hide();
    $("#lupa" + capturaIndice).show();
  });
  // EFECTO LUPA
  $(".infoProducto figure.visor img").mouseover(function(event) {
    var capturaImg = $(this).attr("src");
    $(".lupa img").attr("src", capturaImg);
    $(".lupa").fadeIn("fast");
    $(".lupa").css({
      "height": $(".visorImg").height() + "px",
      "width": "100%"
    });
  });
  $(".infoProducto figure.visor img").mouseout(function(event) {
    $(".lupa").fadeOut("fast");
  });
  $(".infoProducto figure.visor img").mousemove(function(event) {
    var posX = event.offsetX;
    var posY = event.offsetY;
    $(".lupa img").css({
      "margin-left": -posX + "px",
      "margin-top": -posY + "px"
    });
  });
});
