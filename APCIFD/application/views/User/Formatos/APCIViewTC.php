      <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
        <div class="row">
          <div id="apci_container_Prod" class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <!-- <div class="form-group">
                <label> Número de productos a agregar: </label>
                <input id="apciNP" type="text" class="form-control validanumericos" value="">
                <br>
                <span id="apciTP_alert"></span>
                <br>
                <input id="apciTP_btn" type="submit" class="btn btn-outline-danger" name="" value="Aceptar">
                <input id="totalrows" class="form-control" type="text" name="" value="">
              </div> -->
              <table class="table table-bordered">
                <thead id="apci_table_thead_Prod">
                  <tr>
                    <th> Concepto </th>
                    <th> Cantidad </th>
                    <th> Precio Unitario </th>
                    <th> Precio Total </th>
                  </tr>
                </thead>
                <tbody id="dsfsdff">
                  <tr>
                    <td> <input id="apci_Form_Prod" type="text" class="form-control" name="" value=""> </td>
                    <td> <input id="apci_Form_C" type="text" class="form-control validanumericos" name="" value=""> </td>
                    <td> <input id="apci_Form_PU" type="text" class="form-control validanumericos" name="" value=""> </td>
                    <td> <p> $ <input id="apci_Form_T" type="text" class="form-control" name="" value=""> </p> </td>
                    <!-- <td> <p> $ <span id="apci_Form_T"> </span> </p> </td> -->
                    <td> <center> <input id="apci_Form_Add" class="btn" type="submit" name="" value="Agregar Producto"> </center> </td>
                  </tr>
                  <!-- <tr>
                    <td> <input type="text" class="form-control" name="" value=""> </td>
                    <td> <input id="apci_Form_C" type="text" class="form-control validanumericos" name="" value=""> </td>
                    <td> <input id="apci_Form_PU" type="text" class="form-control validanumericos" name="" value=""> </td>
                    <td> <p> $ <span id="apci_Form_T"></span> </p> </td>
                  </tr> -->
                </tbody>
              </table>
              <br>
              <span id="apciTP_alert_Prod"></span>
              <br>
              <table class="table table-bordered">
                <thead id="apci_table_thead_Prod">
                  <tr>
                    <th> Concepto </th>
                    <th> Cantidad </th>
                    <th> Precio Unitario </th>
                    <th> Precio Total </th>
                  </tr>
                </thead>
                <tbody id="apci_Total_Productos">
                </tbody>
              </table>
              <input id="apci_Crear_Formato" type="submit" class="btn btn-outline-primary" name="" value="Crear formato">
            </div>
          </div>
        </div>
        <!-- <img src="<?=base_url()?>images/Iconos/apci_close.png" alt="apci_close"> -->
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#apci_table_apci").click(function(){
            $("#apci_table_tr").hide();
          });
          // $("#apciTP_btn").click(function () {
          //   var totalrows = $("#totalrows").val();
          //   var total = $("#apciNP").val();
          //   if (total == "") {
          //     $("#apciTP_alert").html('<div class="alert alert-danger alert-dismissible fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Alerta!</strong> Debes ingresar una cantidad de productos. </div>')
          //   }else{
          //     // if (total != totalrows) {
          //       for (var i = 1; i <= total; i++){
          //         var ii= 1;
          //         $("#dsfsdff").append('<tr> <td> <input type="text" class="form-control" name="" value=""> </td> <td> <input id="apci_Form_C'+i+'" type="text" class="form-control validanumericos" name="" value=""> </td> <td> <input id="apci_Form_PU'+i+'" type="text" class="form-control validanumericos" name="" value=""> </td> <td> <p> $ <span id="apci_Form_T'+i+'"></span> </p> </td> <button type="button" class="btn btn-outline-danger"> Eliminar <i class="fas fa-times"></i> </button> </td> </tr>');
          //         ii++;
          //         var totalrows = i;
          //         $("#totalrows").val(totalrows);
          //       }
          //     // }
          //     // alert(totalrows);
          //   }
          // });
          $('.validanumericos').keypress(function(e) {
          	if(isNaN(this.value + String.fromCharCode(e.charCode)))
               return false;
          }).on("cut copy paste",function(e){
          	 e.preventDefault();
            });
              $("#apci_Form_PU").keyup(function () {
                var PreU = $(this).val();
                var Cantidad = $("#apci_Form_C").val();
                $("#apci_Form_T").val(PreU * Cantidad);
              });
              $("#apci_Form_C").keyup(function () {
                var Cantidad = $(this).val();
                // var NumProd = $("#apciNP").val();
                var PreU = $("#apci_Form_PU").val();
                $("#apci_Form_T").val(Cantidad * PreU);
              });
            // var NumProd = $("#apciNP").val();
            // for (var i = 1; i <= NumProd ; i++) {
            //   $("#apci_Form_PU"+i).keyup(function () {
            //     var PreU = $(this).val();
            //     var Cantidad = $("#apci_Form_C"+i).val();
            //     $("#apci_Form_T"+i).html(PreU * Cantidad);
            //   });
            //   $("#apci_Form_C"+i).keyup(function () {
            //     var Cantidad = $(this).val();
            //     var NumProd = $("#apciNP").val();
            //     var PreU = $("#apci_Form_PU"+i).val();
            //     $("#apci_Form_T"+i).html(Cantidad * PreU);
            //   });
            // }
          $("#apci_Form_Add").click(function(){
            var NomProd = $("#apci_Form_Prod").val();
            var CantProd = $("#apci_Form_C").val();
            var PreUProd = $("#apci_Form_PU").val();
            var PreTProd = $("#apci_Form_T").val();
            // var kjl = document.getElementById("apci_Form_T").html();
            if (NomProd == "" || CantProd == "" || PreUProd == "" || PreTProd == "") {
              $("#apciTP_alert_Prod").html('<div class="alert alert-danger alert-dismissible fade show"> <button type="button" class="close" data-dismiss="alert">&times;</button> <strong>Alerta!</strong> Debes ingresar los valores. </div>')
            }else{
              $("#apci_Total_Productos").append('<tr> <td> '+NomProd+' </td> <td> '+CantProd+' </td> <td> '+PreUProd+' </td> <td> '+PreTProd+' </td> </tr>')
            }
          });
          $("#apci_Crear_Formato").click(function(){
            // $(this).parents("tr").find("td").each(function(){
            var dato = $(this).find('td:first').html();
              // valores+=$(this).html()+"\n";
            // });
            // console.log(primeraColumna.attr('id'));
            console.log(dato);
          });
        });
      </script>
