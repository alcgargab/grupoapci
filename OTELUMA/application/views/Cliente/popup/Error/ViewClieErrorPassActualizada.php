      <script>
        Swal.fire({
          title: 'ERROR!',
          text: 'Tu contraseña no se pudo actualizar. Por favor intentalo más tarde. Gracias.',
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
