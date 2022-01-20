      <script>
        Swal.fire({
          title: '¡LISTO! TERMINAMOS',
          text: '¡Muchas gracias! Has terminado la verificación de tu cuenta. Apartir de ahora puedes disfrutar de nuestros servicios.',
          type: 'success',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location.replace("<?= base_url()?>");
            }
          }
        );
      </script>
