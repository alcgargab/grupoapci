$(document).ready(function() {
  // BOTON DE FACEBOOK
  $('.facebook').click(function() {
    FB.login(function(response) {
      validarUsuario();

    }, {
      scope: 'public_profile,email'
    });
  });

  function validarUsuario() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  // VALIDAMOS EL CAMBIO DE ESTADO DE FACEBOOK
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      testApi();
    } else {
      Swal.fire({
        title: '¡ERROR AL INGRESAR!',
        text: 'Error al iniciar sesión en Facebook, vuelva a intentarlo por favor.',
        type: 'error',
        confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
      }).then(
        result => {
          if (result.value) {
            window.location = localStorage.getItem("rutaActual");
          }
        }
      );
    }
  }
  // INGRESAMOS A LA API DE FACEBOOK
  function testApi() {
    FB.api('/me?fields=id,name,email,picture', function(response) {
      if (response.email == null) {
        Swal.fire({
          title: '¡ERROR AL INGRESAR!',
          text: '¡Para poder ingresar al sistema debe de proporcionar la información del correo electronico! Para modificar la configuración entra a tu facebook en configuración en la opción de Apps y sitios web, elimina este sitio web y vuelve a intentar.',
          type: 'error',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location = localStorage.getItem("rutaActual");
            }
          }
        );
      } else {
        var ubicacion = $("#OTELUMAmensajeOTELUMA1").val();
        var base = "http://localhost/OTELUMA/";
        var email = response.email;
        var nombre = response.name;
        var foto = "http://graph.facebook.com/" + response.id +
          "/picture?type=large";
        var datos = {
          "email": email,
          "nombre": nombre,
          "foto": foto,
          "ubicacion": ubicacion
        };
        // alert(datos);
        $.ajax({
          url: base + 'Usuario/RegistroFacebook',
          method: "POST",
          data: datos,
          success: function(respuesta) {
            if (respuesta == "sesionIniciada") {
              // console.log(respuesta);
              Swal.fire({
                title: '¡BIENVENIDO!',
                text: '¡Has iniciado sesion!',
                type: 'success',
                confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
              }).then(
                result => {
                  if (result.value) {
                    window.location = localStorage.getItem(
                      "rutaActual");
                  }
                }
              );
            } else if (respuesta == "errorDeIniciarSesion") {
              Swal.fire({
                title: '¡ERROR!',
                text: 'Error al iniciar sesión, intentalo más tarde.',
                type: 'error',
                confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
              }).then(
                result => {
                  if (result.value) {
                    window.location = localStorage.getItem(
                      "rutaActual");
                  }
                }
              );
            } else {
              var modo = JSON.parse(respuesta).RModo;
              // console.log(modo);
              if (modo == 1) {
                modoRegistro = "la pagína de OTELUMA";
              } else if (modo == 2) {
                modoRegistro = "Facebook";
              } else {
                modoRegistro = "Google";
              }
              Swal.fire({
                title: '¡ERROR!',
                text: 'El correo ya se encuentra registrado. Fue registrado a través de ' +
                  modoRegistro +
                  ', por favor intente con otro correo.',
                type: 'error',
                confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
              }).then(
                result => {
                  if (result.value) {
                    FB.getLoginStatus(function(response) {
                      if (response.status === 'cennected') {
                        FB.logout(function(response) {
                          deleteCookie(
                            "fblo_131737410786111");
                          setTimeout(function() {

                          }, 500)
                        });

                        function deleteCookie(name) {
                          document.cookie = name +
                            '=; Path=/; Expires = Thu, 01 Jan 1970 00:00:01 GTM;';
                        }
                      }
                    });
                    window.location = localStorage.getItem(
                      "rutaActual");
                  }
                }
              );
            }
          }
        });
      }
    })
  }
  // CERRAR SESION CON FACEBOOK
  $("#btnCerrarSesion").click(function() {
    e.preventDefault();
    FB.getLoginStatus(function(response) {
      if (response.status === 'cennected') {
        FB.logout(function(response) {
          deleteCookie(
            "fblo_2449706668591715");
          setTimeout(function() {

          }, 500)
        });

        function deleteCookie(name) {
          document.cookie = name +
            '=; Path=/; Expires = Thu, 01 Jan 1970 00:00:01 GTM;';
        }
      }
    });
  });
  // RUTA PARA REGISTRO DE GOOGLE
  // var base = "http://localhost/OTELUMA/";
  // $.ajax({
  //   url: base + 'Registro',
  //   success: function(respuesta) {
  //     console.log(respuesta);
  //   }
  // });
});
