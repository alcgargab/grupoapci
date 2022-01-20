      <script>
        Swal.fire({
          title: '¡ERROR!',
          text: '¡Lo siento! Hubo un error en tu solicitud. Intentalo más tarde',
          type: 'error',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location.replace("<?= base_url()?>CallCenterAdm/Tabla/usuario");
            }
          }
        );
      </script>
