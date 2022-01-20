      <script>
        Swal.fire({
          title: '¡ERROR!',
          text: 'Escriba un correo existente, no se permiten caracteres especiales.',
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
