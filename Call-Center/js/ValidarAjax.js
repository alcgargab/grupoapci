$(document).ready(function() {
  function validarSeguimiento() {
    // var base = "https://callcenter.televiales.net/";
    var base = "http://127.0.0.1/CodeIgniter/Call-Center/Ejecutivo";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "ok") {
      if (tsesion == "1") {
        $.ajax({
          url: base + '/validar-seguimientos',
          success: function(seguimiento) {
            if (seguimiento > 0) {
              // console.log(seguimiento);
              Push.create('Seguimiento', {
                // body: "El dia de hoy tienes" + " " + seguimiento " " +
                // "seguimientos.",
                body: "El dia de hoy tienes seguimientos.",
                icon: "http://127.0.0.1/CodeIgniter/Call-Center/images/Icono/Call_Icon_Call.png",
                // icon: "https://callcenter.televiales.net/images/Icono/Call_Icon_Call.png",
                // vibrate: [200, 100, 200]
              });
            } else {
              // console.log('no');
            }
          }
        });
      }
    }
  }
  setInterval(validarSeguimiento, 1000);
  // setInterval(validarSeguimiento, 1800000);
});
