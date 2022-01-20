      <script>
        Swal.fire({
          title: '¡BIENVENIDO!',
          text: '¡Has iniciado sesion!',
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
