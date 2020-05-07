<?php

require_once "model/connect.php";

require "model/form.php";

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
    <title>Ejemplos</title>
  </head>
  <body>
     <header style="height: 70px">
     </header>
    <div style="height: 30px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="card shadow-lg p-3 mb-5 bg-white ">
        <div class="card-header">Registro de Transferencia</div>
        <div class="card-body">

        <form id="form1" action="model/procesar.php" method="post" class="needs-validation" novalidate>
                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="nombre">Nombre del cliente</label>
                      <input name="nombre_cliente" type="text" class="form-control" id="nombre" placeholder="" value="" required>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>


                    <div class="col-md-4 mb-3">
                      <label for="apellido">DNI del cliente</label>
                      <input onchange="return buscar_id();"name="dni_cliente" type="text" class="form-control" id="dni" placeholder="" value="" required autocomplete="off">
                      <div id="list_dni"></div>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label>Seleccione cuenta destino</label>
                        <select onchange="return buscar();" name="num_cuenta" id="num_cuenta" class="form-control">
                        <?php foreach ($result as $key => $value) {
	?>
                        <option value=<?php echo $value['id_cuenta'] ?>> <?php echo $value['num_cuenta'] ?> </option>
                        <?php

	# code...
}

?>

                      </select>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="nombre_titular">Nombre del titular</label>
                      <?php if (isset($result1)) {?>
                      <div class="input-group">
                      <input type="text" name="nombre_titular" value="<?php echo $result1[0]['nombre_titular_cuenta'] ?>" class="form-control"/>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                      </div>
                      <?php
} else {?>
                      <div class="input-group">
                        <input name="nombre_titular" type="text" class="form-control" id="usuario" placeholder="" aria-describedby="inputGroupPrepend" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                      </div>
                    </div>
                      <?php }?>
                    </div>
          <!--------------------- BORRAR ---------------------------------------->

          <div class="col-md-4 mb-3">
                      <label for="nombre_titular">Cedula del titular</label>
                      <?php if (isset($result1)) {?>
                      <div class="input-group">
                      <input type="text" name="cedula" value="<?php echo $result1[0]['cedula_titular_cuenta'] ?>" class="form-control"/>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                      </div>
                      <?php
} else {?>
                      <div class="input-group">
                        <input name="nombre_titular" type="text" class="form-control" id="usuario" placeholder="" aria-describedby="inputGroupPrepend" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                      </div>
                    </div>
                      <?php }?>
                    </div>




<!---------------------------------------NO BORRAR -------------------------------------------------
                    <div class="col-md-4 mb-3">
                      <label for="cedula">Cedula del Titular</label>
                      <div class="input-group">
                        <input name="cedula" type="text" class="form-control" id="cedula" placeholder="" aria-describedby="inputGroupPrepend" required>
                      </div>
                    </div>
                  </div>  END SECOND ROW !-->


                    <div class="col-md-4 mb-3">
                      <label for="nombre_titular">Banco</label>
                      <?php if (isset($result1)) {?>
                      <div class="input-group">
                      <input type="text" name="tipo_banco" value="<?php echo $result1[0]['tipo_banco'] ?>" class="form-control"/>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                      </div>
                      <?php
} else {?>
                      <div class="input-group">
                        <input name="nombre_titular" type="text" class="form-control" id="usuario" placeholder="" aria-describedby="inputGroupPrepend" required>
                        <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                      </div>
                    </div>
                      <?php }?>
                    </div>



                    <div class="col-md-4 mb-3">
                      <label for="usuario">Tasa actual</label>
                      <div class="input-group">
                        <input name="tasa" type="text" class="form-control" id="tasa" placeholder="" aria-describedby="inputGroupPrepend" value="1210" required>
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="importe_pesos">Importe en pesos</label>
                      <div class="input-group">
                        <input name="importe_pesos" type="text" class="form-control" id="usuario" placeholder="" aria-describedby="inputGroupPrepend" required>
                        <span class="input-group-text">.00</span>
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label>Metodo de Pago </label>
                        <select name="tipo_pago" class="form-control">
                          <option>Mercado Pago</option>
                          <option>UALA</option>
                          <option>Santander</option>
                          <option>Efectivo</option>
                          <option>Frances</option>
                        </select>
                      <div class="valid-feedback">¡Ok válido!</div>
                      <div class="invalid-feedback">Complete el campo.</div>
                    </div>

                  </div>
                </div>

                  <div class="form-group">
                    <div class="form-check">
                      <div class="valid-feedback">¡Aceptado!</div>
                    </div>

                  <button class="btn btn-primary" type="submit">Generar Solicitud</button>
                  <button type="button" class="btn btn-primary"> Agregar Nuevo Cliente</button>
                </form>
        </div>
    </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
    <script src="jquery/codigo.js"></script>

    <script>


 $(document).ready(function(){
  $('#dni').keyup(function(){
      var query = $(this).val();
  if(query != '')
  {
    $.ajax({
      url:"search.php",
      method:"POST",
      data:{query:query},
      success: function(data)
      {
        $('#list_dni').fadeIn();
        $('#list_dni').html(data);
      }
    });
  }else{
    $('#list_dni').fadeOut();
    $('#list_dni').html("");
  }
});

  $(document).on('click', 'li',function(){
      $('#dni').val($(this).text());
      $('#list_dni').fadeout();
  });
});

        function buscar_id(){

          var option = document.getElementById("dni").value;

          /*
          alert(option);
          */
        }


        function buscar() {
          var option = document.getElementById("num_cuenta").value;

          window.location.href = "http://localhost/form_validation/formulario.php?option="+option;
          /*
          alert(option);
          */
        }
    </script>





  </body>
</html>