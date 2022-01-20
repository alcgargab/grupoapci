      <script>
        Swal.fire({
          title: '¡LISTO!',
          text: 'Tu contraseña se actualizo exitosamente. Se te ha enviado un correo electrónico con tu nueva contraseña.',
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
