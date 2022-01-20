      <script>
        Swal.fire({
          title: '<?= $title ?>',
          text: '<?= $text ?>',
          type: '<?= $type ?>',
          confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
        }).then(
          result => {
            if (result.value) {
              <?php if ($ruta == "base") { ?>
                window.location.replace("<?= base_url()?>");
              <?php }else { ?>
                window.location = localStorage.getItem("rutaActual");
              <?php }?>
            }
          }
        );
      </script>
