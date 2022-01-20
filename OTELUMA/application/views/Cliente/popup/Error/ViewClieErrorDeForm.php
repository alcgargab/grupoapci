      <script>
        Swal.fire({
          title: '¡ERROR!',
          text: 'Error al registrar el usuario, no se permiten caracteres especiales',
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
