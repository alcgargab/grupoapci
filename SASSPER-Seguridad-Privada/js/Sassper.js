$(document).ready(function() {
  // ACCION DE scrollUp
  $.scrollUp({
    scrollText: "",
    scrollSpedd: 1000,
    easinType: "easeOutQuint"
  });
  // $('[data-toggle="tooltip"]').tooltip();
  if ("geolocation" in navigator) { //check geolocation available
    //try to get user current location using getCurrentPosition() method
    navigator.geolocation.getCurrentPosition(function(position) {
      // console.log("Found your location nLat : " + position.coords.latitude +
      //   " nLang :" + position.coords.longitude);
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#sasspermensajeSASSPER").val(ubicacion);
    });
  } else {
    // console.log("Browser doesn't support geolocation!");
    var ubicacion = "" + position.coords.latitude + "" + position.coords
      .longitude;
    $("#sasspermensajeSASSPER").val(ubicacion);
  }
  $(".btn_Comando_Sector_Derecho").click(function() {
    $(".img_Comando").attr("src",
      "./images/Uniforme/Comando/Comando_Sector_Derecho.webp");
  });
  $(".btn_Comando_Sector_Centro").click(function() {
    $(".img_Comando").attr("src",
      "./images/Uniforme/Comando/Comando_Sector_Centro.webp");
  });
  $(".btn_Comando_Sector_Distintivo").click(function() {
    $(".img_Comando").attr("src",
      "./images/Uniforme/Comando/Comando_Distintivo.webp");
  });
  $(".btn_Ejecutivo_Sector_Derecho").click(function() {
    $(".img_Ejecutivo").attr("src",
      "./images/Uniforme/Comando/Comando_Sector_Derecho.webp");
  });
  $(".btn_Ejecutivo_Sector_Centro").click(function() {
    $(".img_Ejecutivo").attr("src",
      "./images/Uniforme/Comando/Comando_Sector_Centro.webp");
  });
  $(".btn_Ejecutivo_Sector_Distintivo").click(function() {
    $(".img_Ejecutivo").attr("src",
      "./images/Uniforme/Comando/Comando_Distintivo.webp");
  });
  $(".btn_Uniformes").click(function() {
    $(".img_Comando").attr("src",
      "./images/Uniforme/Comando/Comando.webp");
    $(".img_Ejecutivo").attr("src",
      "./images/Uniforme/Comando/Comando.webp");
  });
});
// VALIDAR FORMULARIO DE CONTACTO
function registroUsuario() {
  // VALIDAR CAMPO NOMBRE
  var usuario = $('#nombre').val();
  if (usuario != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(usuario)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de nombre. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // VALIDAR CAMPO EMAIL
  var correo = $('#email').val();
  if (correo != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(correo)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Escriba un correo electrónico existente. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // VALIDAR CAMPO ASUNTO
  var asunto = $('#mensaje').val();
  if (asunto != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(asunto)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de mensaje. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // VALIDAR CAMPO TELEFONO
  var telefono = $('#telefono').val();
  if (telefono != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(telefono)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de teléfono. </div>'
      );
      return false;
    }
  } else {
    // $('#errorForm').html(
    //   '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    // );
    // return false;
  }
  // VALIDAR CONTRASEÑA
  var comentarios = $('#Comment').val();
  if (comentarios != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(comentarios)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> No se permiten caracteres especiales en el campo de comentarios. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  return true;
}
