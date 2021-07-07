
<?php
include 'inc/header2.php'; 
Session::checkSession();
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/Taller.php');
$ta = new Taller();

//there have no need if condition because we are passing values using ajaz
if ($_SERVER['REQUEST_METHOD'] == 'POST') {        
        //$_FILES['fichero_usuario']['name'] El nombre original del fichero en la máquina del cliente.
        $original_name =$_FILES['image']['name'];
        //$_FILES['fichero_usuario']['type'] El tipo MIME del fichero, si el navegador proporcionó esta información. Un ejemplo sería "image/gif". Este tipo MIME, sin embargo, no se comprueba en el lado de PHP y por lo tanto no se garantiza su valor.
        $file_tipe=$_FILES['image']['type'];
        //$_FILES['fichero_usuario']['size'] El tamaño, en bytes, del fichero subido.
        $file_zise=$_FILES['image']['size'];
        //$_FILES['fichero_usuario']['tmp_name'] El nombre temporal del fichero en el cual se almacena el fichero subido en el servidor.
        $temp_name=$_FILES['image']['tmp_name'];
        //$_FILES['fichero_usuario']['error'] El código de error asociado a esta subida.
        $error_num=$_FILES['image']['error'];
        //$extensions = preg_split("/;/",$adminted_exte);
        //print_r($extensions);
        $result_save = $ta->saveFile($temp_name,$original_name,$file_zise,$file_tipe);        
        $_resultado="";
        if ($result_save=="OK")
        {
               $nombre_taller             = $_POST['taller'];
               $mensaje_taller            = $_POST['mensaje'];
               $taller_link_acceso        = $_POST['linkacceso'];
               $taller_codigo_acceso      = $_POST['codigoacceso'];
               $estado_descripcion        = $_POST['selestado'];               
               $taller_tipo               = $_POST['tipotaller'];
               $name_file_saved = $ta->getSavedNameFile();
               $upd = $ta->createTaller($nombre_taller,$mensaje_taller,$taller_link_acceso,$taller_codigo_acceso,$estado_descripcion,$name_file_saved,$taller_tipo);
               
               $_resultado=$upd;
               
        }
        else
        {
              $_resultado =$result_save;
        }


        if ($_resultado=="success")
        {
          // todo ok
          ?> </br></br>
          <div class="row center">
          <div class="col s12 m6 offset-l3">
            <div class="card light-blue white medium ">
              <div class="card-content green-text">
                <h3 class="card-title">Exito!.. </h3>
                    </br>
                    <h5 class="center">Se genero un nuevo taller! </h5>
              </div>
              <div class="row center">
                    <a class="waves-effect waves-light btn-large pulse" href="index2.php">Aceptar</a>
              </div>        
            </div>
          </div>
        </div>
        <?php
        }else{// error
          ?>
          </br>
          </br>
          <div class="row center">
          <div class="col s12 m6 offset-l3 ">
            <div class="card light-blue white medium">
              <div class="card-content red-text ">
                <h3>Error!.. </h1>
                    </br>                    
                    <h5>No fue posible resitrar un nuevo taller! </h5>
                    <p> <?php echo $_resultado; ?> </p>
                                    
              </div>
              <div class="row center">
                    <a class="waves-effect waves-light red btn-large pulse" href="javascript: history.go(-1);">Aceptar</a>
              </div>        
            </div>
          </div>
        </div>
        <?php 
        }
?>
</br>
</br>

  </br>
<?php

        
 }

?>





<?php
include 'inc/footer2.php'; 
?>
