$(document).ready(function() {
  // BUSCADOR
  $("#searchContainer input").change(function() {
    var busqueda = $("#searchContainer input").val();
    var expresion = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]*$/;
    if (!expresion.test(busqueda)) {
      alert(
        'Caracteres no aceptados, Favor de introducir un valor correcto'
      );
      $("#searchContainer input").val("");
    } else {
      console.log(busqueda);
      var evaluarBusqueda = busqueda.replace(/[ñÑáéíóúÁÉÍÓÚ ]/g, "-");
      var rutaBuscador = $("#searchContainer a").attr("href");
      if ($("#searchContainer input").val() != "") {
        $("#searchContainer a").attr("href", rutaBuscador + '/' +
          evaluarBusqueda);
      }
    }
  });
  //  BUSCADOR CON ENTER
  $("#searchContainer input").focus(function() {
    $(document).keyup(function() {
      event.preventDefault();
      if (event.keyCode == 13 && $("#searchContainer input").val() !=
        "") {
        var rutaBuscador = $("#searchContainer a").attr("href");
        window.location.href = rutaBuscador;
      }
    });
  });
});
