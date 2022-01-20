      <script>
        Swal.fire({
          title: '¡ERROR!',
          text: 'El correo electrónico que ingresaste no existe, favor de ingresar un correo existente.',
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
