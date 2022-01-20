        <script>
          let timerInterval
          Swal.fire({
            title: '<?= $title ?>',
            text: '<?= $text ?>',
            type: '<?= $type ?>',
            timer: 5000,
            onBeforeOpen: () => {
              Swal.showLoading()
              timerInterval = setInterval(() => {
                Swal.getContent().querySelector('strong')
                  .textContent = Swal.getTimerLeft()
              }, 100)
            },
            onClose: () => {
              clearInterval(timerInterval)
            }
          }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
              <?php if ($ruta == "base") { ?>
                window.location.replace("<?= base_url() ?>");
              <?php }else { ?>
                window.location.replace(localStorage.getItem("rutaActual"));
               <?php } ?>
            }
          });
        </script>
