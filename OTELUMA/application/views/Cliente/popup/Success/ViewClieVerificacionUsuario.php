      <script>
        Swal.fire({
          title: '¡LISTO! CASI TERMINAMOS',
          text: '¡Para continuar con el registro, hemos enviado un correo electrónico para verificación de su cuenta, favor de revisar su bandeja de entrada o la carpeta de SPAM de su correo!',
          type: 'success',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location = localStorage.getItem("rutaActual");
            }
          }
        );
      </script>
