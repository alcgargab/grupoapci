      <script>
        Swal.fire({
          title: '¡Oops!',
          text: 'Te informamos que esta cuenta ya esta activada.',
          type: 'info',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location.replace("<?= base_url()?>");
            }
          }
        );
      </script>
