  <div class="text-center bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <!-- <center> <p id=""> <img id="sassper_logo_img_footer" src="<?= base_url()?>images/Logo/sassper_logo_F.webp" alt="sassper_logo_F"> </p> </center> -->
          <p id="sassper_footerinfo_tittle"> S. ASSPER SEGURIDAD PRIVADA
            <span id="sassper_footer_redes">
              <a id="sassper_footer_redes_liga" target="_blank" href="https://www.facebook.com/SASSPER_oficial-761065184238351"> <img class="sassper_FI_F" id="sassper_footer_redes_icon" src="<?= base_url()?>images/Iconos/Sassper_Face.webp" alt="Iconossassper_Icon_Face"> </a>
              <a id="sassper_footer_redes_liga" target="_blank" href="https://twitter.com/SASSPER_oficial"> <img class="sassper_FI_T" id="sassper_footer_redes_icon" src="<?= base_url()?>images/Iconos/Sassper_Tw.webp" alt="sassper_Icon_Ins"> </a>
              <a id="sassper_footer_redes_liga" target="_blank" href="https://www.instagram.com/sassper_oficial/"> <img class="sassper_FI_I" id="sassper_footer_redes_icon" src="<?= base_url()?>images/Iconos/Sassper_Ins.webp" alt="sassper_Icon_LiK"> </a>
            </span>
          </p>
          <center> <p> <img id="sassper_logo_img_footer" src="<?= base_url()?>images/Logo/sassper_logo_F.webp" alt="sassper_logo_F"> </p> </center>
        </div>
      </div>
      <!-- <div id="sassper_footer_down" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <center> <p id=""> <img id="sassper_logo_img_footer" src="<?= base_url()?>images/Logo/sassper_logo_F.webp" alt="sassper_logo_F"> </p> </center>
        </div>
      </div> -->
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $( ".sassper_FI_F" ).mouseover(function() {
      $(".sassper_FI_F").attr("src","<?= base_url()?>images/Iconos/Sassper_Face1.webp");
      }).mouseout(function() {
        $(".sassper_FI_F").attr("src","<?= base_url()?>images/Iconos/Sassper_Face.webp");
      });
    $( ".sassper_FI_T" ).mouseover(function() {
    $(".sassper_FI_T").attr("src","<?= base_url()?>images/Iconos/Sassper_Tw1.webp");
    }).mouseout(function() {
      $(".sassper_FI_T").attr("src","<?= base_url()?>images/Iconos/Sassper_Tw.webp");
    });
    $( ".sassper_FI_I" ).mouseover(function() {
    $(".sassper_FI_I").attr("src","<?= base_url()?>images/Iconos/Sassper_Ins1.webp");
    }).mouseout(function() {
      $(".sassper_FI_I").attr("src","<?= base_url()?>images/Iconos/Sassper_Ins.webp");
    });
  });
  </script>
</body>
</html>
