      <script>
        Swal.fire({
          title: '¡LISTO!',
          text: 'Tu registro ha sido Editado.',
          type: 'success',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location.replace("<?= base_url()?>CallCenterAdm/Tabla/usuario");
            }
          }
        );
      </script>
