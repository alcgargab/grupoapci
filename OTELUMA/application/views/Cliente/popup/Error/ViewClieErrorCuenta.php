      <script>
        Swal.fire({
          title: '¡ERROR!',
          text: 'No se pudo verificar tu cuenta. Intenta más tarde.',
          type: 'error',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location.replace("<?= base_url()?>");
            }
          }
        );
      </script>
