var validarEmail = false;
$(document).ready(function() {
  // CARTURAR RUTAS
  var rutaActual = location.href;
  $(
    '#btnIngreso, #btnRegistro, #btnCerrarSesion, .facebook, .google, #btnPassword'
  ).click(
    function() {
      localStorage.setItem("rutaActual", rutaActual);
    });
  // FORMATEAR ALERTAS
  $("input").focus(function() {
    $(".alert").remove();
  });
  // VALIDAR EMAIL REPETIDO
  $('#regCorreo').change(function() {
    var base = "http://127.0.0.1/OTELUMA/";
    var email = $('#regCorreo').val();
    var emailmd5 = $.md5(email);
    if (email != "") {
      $.ajax({
        url: base + 'Usuario/ValidarCorreo/' + emailmd5,
        success: function(respuesta) {
          if (respuesta == "false") {
            $(".alert").remove();
            // console.log(respuesta);
            validarEmail = false;
          } else {
            var modo = JSON.parse(respuesta).RModo;
            // console.log(modo);
            if (modo == 1) {
              modo = "la pagína de OTELUMA";
            } else if (modo == 2) {
              modo = "Facebook";
            } else {
              modo = "Google";
            }
            $('#errorForm').html(
              '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> El correo ya se encuentra registrado. Fue registrado a través de ' +
              modo +
              ', por favor intente con otro correo.</div>'
            );
            validarEmail = true;
            return false;
          }
        }
      });
    }
  });
});
// VALIDAR EL REGISTRO DE USUARIOS
function registroUsuario() {
  // VALIDAR CAMPO NOMBRE
  var usuario = $('#regUsuario').val();
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
  // VALIDAR CAMPO APELLIDO
  var usuarioA = $('#regUsuarioA').val();
  if (usuarioA != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(usuarioA)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido. </div>'
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
  var correo = $('#regCorreo').val();
  if (correo != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(correo)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Escriba un correo electrónico existente. </div>'
      );
      return false;
    }
    if (validarEmail) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> El correo ya se encuentra registrado, por favor intente con otro correo.</div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // VALIDAR CONTRASEÑA
  var password = $('#regPassword').val();
  if (password != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(password)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> No se permiten caracteres especiales en el campo de contraseña. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // POLÍTICAS DE PRIVACIDAD
  var politicas = $('#regTerminos:checked').val();
  if (politicas != "on") {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Para registrarse usted debe aceptar nuestras condiciones de uso y políticas de privacidad. </div>'
    );
    return false;
  }
  return true;
}
