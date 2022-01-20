$(document).ready(function() {
  // --------------- obtenemos el buscador que utilizamos --------------- //
  var getBrowserInfo = function() {
    var ua = navigator.userAgent,
      tem,
      M = ua.match(
        /(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if (/trident/i.test(M[1])) {
      tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
      return 'IE ' + (tem[1] || '');
    }
    if (M[1] === 'Chrome') {
      tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
      if (tem != null) return tem.slice(1).join(' ').replace('OPR',
        'Opera');
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion,
      '-?'
    ];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);
    return M.join(' ');
  };
  $('#navegador').val(getBrowserInfo());
  // --------------- obtenemos la hora local --------------- //
  var horalocal = new Date();
  hora = horalocal.getHours() + ":" + horalocal.getMinutes() + ":" +
    horalocal.getSeconds();
  $("#horaLocal").val(hora);
  $("#hora").val(hora);
  $("#CallHoraCS").val(hora);
  // --------------- obtenemos la ubicación del usuario --------------- //
  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#ubicacion").val(ubicacion);
    });
  } else {
    var ubicacion = " " + position.coords.latitude + " " + position.coords.longitude;
    $("#ubicacion").val(ubicacion);
  }
  // --------------- capturamos las rutas --------------- //
  var rutaActual = location.href;
  $('.btnRuta').click(
    function() {
      localStorage.setItem("rutaActual", rutaActual);
    });
  // --------------- buscador del empleado --------------- //
  $("#SearchSeg").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaSeguimientos tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) >
        -1)
    });
  });
  $("#crm-sidebar").mCustomScrollbar({
    theme: "minimal"
  });
  $('#crm-dismiss, .overlay').on('click', function() {
    $('#crm-sidebar').removeClass('active');
    $('.overlay').removeClass('active');
  });
  $('#sidebarCollapse').on('click', function() {
    $('#crm-sidebar').addClass('active');
    $('.overlay').addClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });
  // --------------- BUSCADOR --------------- //
  $("#crmSearch").on("keyup", function() {
    // alert($(this).val().toLowerCase());
    var value = $(this).val().toLowerCase();
    $("#crmbody div.col-3 div.card").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) >
        -1)
    });
  });
});
