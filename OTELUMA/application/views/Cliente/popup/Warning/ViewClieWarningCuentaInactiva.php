      <script>
        Swal.fire({
          title: 'NO HA VERIFICADO SU CORREO',
          text: '¡Por favor revise la bandeja de entrada o la carpet de SPAM de su correo para verificar la dirección de correro electrónico!',
          type: 'warning',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              window.location = localStorage.getItem("rutaActual");
            }
          }
        );
      </script>
