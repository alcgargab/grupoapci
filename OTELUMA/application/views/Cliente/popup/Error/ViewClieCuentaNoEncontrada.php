      <script>
        Swal.fire({
          title: '¡ERROR!',
          text: 'Esta cuenta no se encuentra registrada.',
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
