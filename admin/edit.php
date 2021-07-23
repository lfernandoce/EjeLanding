<?php include 'inc/header2.php'; ?>
<?php
//Session::checkSession();
if (isset($_GET['id'])) {
	$number = (int) $_GET['id'];
}else{
	header("Location:index2.php");
}
$talleres = $exm->getTaller($number);
$estados= $exm->getEstados();
$tipos_taller = $exm->getTiposTaller();
?>
	<div class="section no-pad-bot" id="index-banner">
    	        <div class="container">
      		        <br><br>
      		        <h2 class="header center   orange-text "><?php echo $talleres["taller_nombre"]; ?></h1>
    	        </div>
  	</div>
	<div class="container">
	  	<div class="row">			
  			<div class="col s8 m8">
            
                                <form id="formulario" action="editPst.php" method="post" class="col s12 offset-s3" enctype="multipart/form-data">
                                        <div class="input-field">                      
                                                <input placeholder="Taller" name="taller" type="text" id="taller" class="validate" value="<?php echo $talleres["taller_nombre"]; ?>">
                                                <label for="taller">Taller</label>
                                        </div>
                                        <div class="input-field">                      
                                                <input placeholder="Definicion" name="mensaje" type="text" id="mensaje" class="validate" value="<?php echo $talleres["taller_mensaje"]; ?>">
                                                <label for="mensaje">Mensje descriptivo</label>
                                        </div>
                                        <div class="input-field">                      
                                                <input placeholder="Link de acceso" name="linkacceso" type="text" id="linkacceso" class="validate"value="<?php echo $talleres["taller_link_acceso"]; ?>">
                                                <label for="linkacceso">Link de acceso</label>
                                        </div>
                                        <div class="input-field">                      
                                                <input placeholder="Codigo de acceso" name="codigoacceso" type="text" id="codigoacceso" class="validate"value="<?php echo $talleres["taller_codigo_acceso"]; ?>">
                                                <label for="codigoacceso">Codigo de acceso</label>
                                        </div>
                                        

                                        <div class="input-field">                                        
                                                <select id="tipotaller" name="tipotaller">
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
                                                <label>Tipo</label>
                                        </div>       

                                        <div class="input-field">                                        
                                                <select id="selestado" name="selestado">
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
                                                <label>Estado</label>
                                        </div>       

                                        <div class="input-field">                                                     
                                                <div class="row center">    
                                                        <div class="file-upload">
                                                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Agregar Imagen</button>
                                                                <div class="image-upload-wrap">
                                                                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                                                                        <input id="image" name="image" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                                                        <div class="drag-text">
                                                                                <h4>Soltar Imagen</h4>
                                                                        </div>
                                                                </div>
                                                                <div class="file-upload-content">
                                                                        <img style="width=150px; height=150px;" class="file-upload-image" src="#" alt="your image" />
                                                                        <div class="image-title-wrap">
                                                                                <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">Uploaded Image</span></button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>



                                        <div class="input-field"> 
                                                <div class="row center">
                                                        <input type="submit" name="tallerupdate" id="tallerupdate" class="waves-effect waves-light btn-large orange modal-trigger"data-target="modal1" value="Aceptar">                                                        
                                                </div>  
                                        </div>
                                        <div id="hidenZone">
                                                <input id="taller_id" name="taller_id" type="hidden" value="<?php echo $talleres['taller_id'];?>">
                                        </div>

                                        <div class="input-field">
                                                <div class="row center">
                                                        <h1 id="response">

                                                        </h1>
                                                </div>
                                        </div>
                                </form>


                                  <!-- Modal Trigger -->
  


			</div>		
		</div>
  	</div>      
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
        </div>   
</div>
<?php include 'inc/footer2.php'; ?>

<!-- <?php include 'inc/header.php'; ?>
<?php include 'inc/footer.php'; ?>
-->
