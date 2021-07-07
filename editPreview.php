<?php include 'inc/header2.php'; 
      $filepath = realpath(dirname(__FILE__)); 
      include_once ($filepath.'/config/Parametros.php');
       $rutaim=DIR_IMAGE;       
?>
<?php
    Session::checkSession();
    if (isset($_GET['id'])) {
	    $number = (int) $_GET['id'];
    }else{
	    header("Location:Principal.php");
    }
    $talleres = $exm->getTaller($number);
    $estados= $exm->getEstados();
    $tipos_taller = $exm->getTiposTaller();

    $imagen= "";
	$imagen= $rutaim .$talleres['taller_imagen'];
?>
	<div class="section no-pad-bot" id="index-banner">
    	<div class="container">
      		<br><br>
      		<h2 class="header center   orange-text "><?php echo $talleres["taller_nombre"]; ?></h1>
    	</div>
  	</div>

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-l3">            
                <div class="card x-large white">
                    <div class="card-content black-text">
                        <div class="row">                            
                            <div class="input-field"> Taller:
                                <input disabled id="taller" type="text" class="validate" value="<?php echo $talleres["taller_nombre"]; ?>">
                            </div>
                            <div class="input-field ">Mensaje:
                                <input disabled id="mensaje" type="text" class="validate" value="<?php echo $talleres["taller_mensaje"]; ?>">
                            </div>                            
                            <div class="input-field">Link de acceso:
                                <input disabled id="taller_link" type="text" class="validate" value="<?php echo $talleres["taller_link_acceso"]; ?>">
                            </div>
                            <div class="input-field">Codigo de acceso:
                                    <input disabled id="taller_codigo" type="text" class="validate" value="<?php echo $talleres["taller_codigo_acceso"]; ?>">                            
                            </div>
                            <div class="input-field">Tipo Taller:
                                <select disabled id="tipotaller" name="tipotaller">
                                    <option value="" disabled selected>Definir Tipo</option>
                                            <?php 
                                                    while ($result_tipo = $tipos_taller->fetch_assoc()) {
                                            ?>
                                    <option <?php if($talleres["taller_tipo"]==$result_tipo['id_tipo'])
                                                                            {
                                                                                    echo 'selected';
                                                                            }                                                                                
                                                            ?> value="<?php echo $result_tipo['id_tipo'];?>"><?php echo $result_tipo['tipo_descripcion'];?></option>
                                            
                                            <?php } ?>
                                </select>
                            </div>       

                            <div class="input-field">Estado Actual
                                <select disabled id="selestado" name="selestado">
                                <option value="" disabled selected>Definir estado</option>
                                <?php 
                                        while ($result = $estados->fetch_assoc()) {                                                        
                                ?>
                                <option <?php if($talleres["estado"]==$result['estado_id'])
                                                                {
                                                                        echo 'selected';
                                                                }
                                                                
                                                ?> value="<?php echo $result['estado_id'];?>"><?php echo $result['estado_descripcion'];?></option>
                                
                                <?php } ?>
                                </select>                                                
                            </div>       
                        </div>                       
                                                
                            <img 
                            class="materialboxed file-center-image" 
                            width="250" 
                            src="<?php
                                    if (file_exists($imagen))
                                    {
                                        echo $imagen;
                                    }
                                    else {
                                        echo "img/eje1.jpg";
                                    }
						    ?>">
                    </div>
                     <div class="card-action center">
                        <a class="waves-effect waves-light btn-large orange" href="edit.php?id=<?php echo $number; ?>" >Modificar</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'inc/footer2.php'; ?>