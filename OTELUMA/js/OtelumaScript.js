$(document).ready(function() {
  // VARIABLES
  var item = 0;
  var itemPaginacion = $("#paginacion li");
  var interrumpirCiclo = false;
  var imgProducto = $(".imgProducto");
  var t1 = $("#Slide h1");
  var t2 = $("#Slide h2");
  var t3 = $("#Slide h3");
  var btnVerProducto = $("#Slide button")
  var stopIntervalo = false;
  var toogle = false;
  var btnList = $(".btnList");
  $("#Slide ul li").css({
    "width": 100 / $("#Slide ul li").length + "%"
  });
  $("#Slide ul").css({
    "width": $("#Slide ul li").length * 100 + "%"
  });
  //  HERRAMIENTA TOOLTIP
  // $('[data-toggle="tooltip"]').tooltip();
  // HERRAMIENTA POPOVER
  $('[data-toggle="popover"]').popover();
  // ANIMACION INICIAL
  // IMAGENES
  $(imgProducto[item]).animate({
    "top": -10 + "%",
    "opacity": 0
  }, 500);
  $(imgProducto[item]).animate({
    "top": 1 + "%",
    "opacity": 1
  }, 1000);
  // TITULOS
  $(t1[item]).animate({
    "top": -10 + "%",
    "opacity": 0
  }, 500);
  $(t1[item]).animate({
    "top": -30 + "px",
    "opacity": 1
  }, 1000);
  // SUBTITULOS
  $(t2[item]).animate({
    "top": -10 + "%",
    "opacity": 0
  }, 500);
  $(t2[item]).animate({
    "top": -30 + "px",
    "opacity": 1
  }, 1000);
  // TEXTO
  $(t3[item]).animate({
    "top": -10 + "%",
    "opacity": 0
  }, 500);
  $(t3[item]).animate({
    "top": -30 + "px",
    "opacity": 1
  }, 1000);
  // BOTON
  $(btnVerProducto[item]).animate({
    "top": -10 + "%",
    "opacity": 0
  }, 500);
  $(btnVerProducto[item]).animate({
    "top": -30 + "px",
    "opacity": 1
  }, 1000);
  // MOSTRAR CATEGORIAS
  $("#btn_Categorias").click(function() {
    if (window.matchMedia("(max-width:767px)").matches) {
      $("#btn_Categorias").after($("#categorias").slideToggle("slow"));
    } else {
      $("#header_Down").after($("#categorias").slideToggle("slow"));
    }
  });
  // PAGINACION DEL SLIDE
  $("#paginacion li").click(function() {
    item = $(this).attr("item") - 1;
    movimientoSlide(item);
    // console.log(item);
  });
  // FLECHA DE AVANZAR
  function avanzar() {
    if (item == $("#Slide ul li").length - 1) {
      item = 0;
    } else {
      item++;
    }
    interrumpirCiclo = true;
    movimientoSlide(item);
  }
  $("#Slide #next").click(function() {
    avanzar();
  });
  // FLECHA DE RETROCEDER
  $("#Slide #previus").click(function() {
    if (item == 0) {
      item = $("#Slide ul li").length - 1;
    } else {
      item--;
    }
    movimientoSlide(item);
  });
  // FUNCION DEL MOVIMIENTO DEL SLIDE
  function movimientoSlide(item) {
    $("#Slide ul").animate({
      "left": item * -100 + "%"
    }, 1000);
    $("#paginacion li").css('opacity', '.5');
    $(itemPaginacion[item]).css('opacity', '1');
    interrumpirCiclo = true;
    // ANIMACION INICIAL
    //  IMAGENES
    $(imgProducto[item]).animate({
      "top": -10 + "%",
      "opacity": 0
    }, 500);
    $(imgProducto[item]).animate({
      "top": 1 + "%",
      "opacity": 1
    }, 1000);
    // TITULOS
    $(t1[item]).animate({
      "top": -10 + "%",
      "opacity": 0
    }, 500);
    $(t1[item]).animate({
      "top": -30 + "px",
      "opacity": 1
    }, 1000);
    // SUBTITULOS
    $(t2[item]).animate({
      "top": -10 + "%",
      "opacity": 0
    }, 500);
    $(t2[item]).animate({
      "top": -30 + "px",
      "opacity": 1
    }, 1000);
    // textos
    $(t3[item]).animate({
      "top": -10 + "%",
      "opacity": 0
    }, 500);
    $(t3[item]).animate({
      "top": -30 + "px",
      "opacity": 1
    }, 1000);
    // BOTON
    $(btnVerProducto[item]).animate({
      "top": -10 + "%",
      "opacity": 0
    }, 500);
    $(btnVerProducto[item]).animate({
      "top": -30 + "px",
      "opacity": 1
    }, 1000);
  }
  // INTERVALO DE TIEMPO
  setInterval(function() {
    if (interrumpirCiclo) {
      interrumpirCiclo = false;
    } else {
      if (!stopIntervalo) {
        avanzar();
      }
    }
  }, 3000);
  // MOSTRAT FLECHAS
  $("#Slide").mousemove(function() {
    $("#Slide #previus").css({
      'opacity': 1
    });
    $("#Slide #next").css({
      'opacity': 1
    });
    stopIntervalo = true;
  });
  $("#Slide").mouseout(function() {
    $("#Slide #previus").css({
      'opacity': 0
    });
    $("#Slide #next").css({
      'opacity': 0
    });
    stopIntervalo = false;
  });
  // ESCONDER SLIDE
  $("#btnSlide").click(function() {
    if (!toogle) {
      toogle = true;
      $("#Slide").slideUp("slow");
      $("#btnSlide").html('<i class="fas fa-chevron-down"></i>');
    } else {
      toogle = false;
      $("#Slide").slideDown("slow");
      $("#btnSlide").html('<i class="fas fa-chevron-up"></i>');
    }
  });
  // ACTIVAR BOTONES DE GRID Y LIST
  for (var i = 0; i < btnList.length; i++) {
    var base_url = "http://127.0.0.1/OTELUMA/";
    $("#btnGrid" + i).click(function() {
      var numero = $(this).attr("id").substr(-1);
      $(".grid" + numero).show();
      $(".list" + numero).hide();
      $("#btnGrid" + numero).addClass('Oteluma_Color');
      $("#btnIconG" + numero).attr("src",
        base_url + "images/Iconos/Oteluma_Icon_MG1.png");
      $("#btnList" + numero).removeClass('Oteluma_Color');
      $("#btnIconL" + numero).attr("src",
        base_url + "images/Iconos/Oteluma_Icon_L.png");
    });
    $("#btnList" + i).click(function() {
      var numero = $(this).attr("id").substr(-1);
      $(".grid" + numero).hide();
      $(".list" + numero).show();
      $("#btnList" + numero).addClass('Oteluma_Color');
      $("#btnIconL" + numero).attr("src",
        base_url + "images/Iconos/Oteluma_Icon_L1.png");
      $("#btnGrid" + numero).removeClass('Oteluma_Color');
      $("#btnIconG" + numero).attr("src",
        base_url + "images/Iconos/Oteluma_Icon_MG.png");
    });
  }
  // EFECTOS CON EL SCROLL
  $(window).scroll(function() {
    var scrollY = window.pageYOffset;
    if (window.matchMedia("(min-width:768px)").matches) {
      if ($(".banner").html() != null) {
        if (scrollY < ($(".banner").offset().top) - 200) {
          $(".banner img").css({
            "margin-top": -scrollY / 3 + "px"
          });
        } else {
          scrollY = 0;
        }
      }
    }
  });
  // ACCION DE scrollUp
  $.scrollUp({
    scrollText: "",
    scrollSpedd: 1000,
    easinType: "easeOutQuint"
  });
  /* PAGINACIÓN DE HOJAS VISITADAS */
  var pagActual = $(".pagActual").html();
  if (pagActual != null) {
    var regPagActual = pagActual.replace(/-/g, " ");
    $(".pagActual").html(regPagActual);
  }
  // OBTENER UBICACIÓN DEL USUARIO
  if ("geolocation" in navigator) { //check geolocation available
    //try to get user current location using getCurrentPosition() method
    navigator.geolocation.getCurrentPosition(function(position) {
      // console.log("Found your location nLat : " + position.coords.latitude +
      //   " nLang :" + position.coords.longitude);
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#OTELUMAmensajeOTELUMA").val(ubicacion);
      $("#OTELUMAmensajeOTELUMA1").val(ubicacion);
      $("#OTELUMAmensajeOTELUMA2").val(ubicacion);
      $("#OTELUMAmensajeOTELUMA3").val(ubicacion);
    });
  } else {
    // console.log("Browser doesn't support geolocation!");
    var ubicacion = "" + position.coords.latitude + "" + position.coords
      .longitude;
    $("#OTELUMAmensajeOTELUMA").val(ubicacion);
    $("#OTELUMAmensajeOTELUMA1").val(ubicacion);
    $("#OTELUMAmensajeOTELUMA2").val(ubicacion);
    $("#OTELUMAmensajeOTELUMA3").val(ubicacion);
  }
  $('[data-toggle="tooltip"]').tooltip();
  $("#SearchUser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaUserBody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) >
        -1)
    });
  });
});
