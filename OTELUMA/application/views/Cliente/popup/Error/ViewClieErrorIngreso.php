      <script>
        Swal.fire({
          title: '¡ERROR AL INGRESAR!',
          text: '¡Por favor verifica que el correo electrónico exista o la contraseña coincida con la registrada!',
          type: 'error',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location = localStorage.getItem("rutaActual");
            }
          }
        );
      </script>
