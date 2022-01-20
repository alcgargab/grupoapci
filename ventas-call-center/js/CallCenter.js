$(document).ready(function() {
  // --------------- OBTENEMOS UBICACION DEL USUARIO --------------- //
  if ("geolocation" in navigator) { //check geolocation available
    //try to get user current location using getCurrentPosition() method
    navigator.geolocation.getCurrentPosition(function(position) {
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#CallUbicacion").val(ubicacion);
    });
  } else {
    var ubicacion = "" + position.coords.latitude + "" + position.coords
      .longitude;
    $("#CallUbicacion").val(ubicacion);
  }
});
