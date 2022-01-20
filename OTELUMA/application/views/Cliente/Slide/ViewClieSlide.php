    <div id="Slide" class="container-fluid">
      <div class="row d-block">
        <!-- DIAPOSITIVAS -->
        <ul>
          <?php foreach ($slide as $row) {
            $estiloImgProducto = json_decode($row -> estiloImgProducto);
            $estiloTextoSlide = json_decode($row -> estiloTextoSlide);
            $titulo = json_decode($row -> titulo);
            $subtitulo = json_decode($row -> subtitulo);
            $texto = json_decode($row -> texto);
            // print_r($estiloImgProducto -> top); die(); ?>
            <li>
              <input type="hidden" name="" value="<?= $row -> idSlide?>">
              <?php if ($row -> imgFondo != ""){ ?>
                <img src="<?= base_url()?>images/Slide/<?= $row -> imgFondo ?>" alt="<?= $row -> imgFondo?>">
              <?php } ?>
              <div class="slideOpciones <?= $row -> tipoSlide?>">
                <?php if ($row -> imgProducto != "") { ?>
                  <img class="imgProducto" src="<?= base_url()?>images/Slide/<?= $row -> imgProducto?>" alt="<?= $row -> imgProducto?>" style="top: <?= $estiloImgProducto -> top?>; right: <?= $estiloImgProducto -> right?>; width: <?= $estiloImgProducto -> width?>; left: <?= $estiloImgProducto -> left?>">
                <?php } ?>
                <?php if ($estiloTextoSlide != ""){ ?>
                  <div class="textoSlide" style="top: <?= $estiloTextoSlide -> top?>; right: <?= $estiloTextoSlide -> right?>; width: <?= $estiloTextoSlide -> width?>; left: <?= $estiloTextoSlide-> left?>">
                <?php } ?>
                <?php if ($titulo != ""){ ?>
                  <h1 style="color:<?= $titulo -> color?>"> <?= $titulo -> texto?> </h1>
                <?php } ?>
                <?php if ($subtitulo != ""){?>
                  <h2 style="color:<?= $subtitulo -> color?>"> <?= $subtitulo -> texto?> </h2>
                <?php } ?>
                <?php if ($texto != ""){ ?>
                  <h3 style="color:<?= $texto -> color?>"> <?= $texto -> texto?> </h3>
                <?php } ?>
                <?php if ($row -> botonProducto != ""){ ?>
                  <a href="<?= $row -> ruta?>">
                    <?= $row -> botonProducto?>
                  </a>
                <?php } ?>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
        <!-- PAGINACION -->
        <ol id="paginacion">
          <?php
          for ($i=1; $i <= count($slide) ; $i++) { ?>
            <li item="<?= $i;?>"> <i class="fas fa-circle"> </i> </li>
          <?php } ?>
        </ol>
        <!-- FLECHAS -->
        <div id="previus" class="flechas"> <i class="fas fa-chevron-left"> </i>  </div>
        <div id="next" class="flechas"> <i class="fas fa-chevron-right"> </i>  </div>
      </div>
    </div>
    <center>
      <button id="btnSlide" class="Oteluma_Color" type="button" name="button">
        <i class="fas fa-chevron-up"> </i>
      </button>
    </center>
