<?php include 'inc/header2.php';
    $estados= $exm->getEstados();
    $tipos_taller = $exm->getTiposTaller();
?>
	<div class="section no-pad-bot" id="index-banner">
    	        <div class="container">
      		        <br><br>			
              		<h2 class="header center   orange-text ">Nuevo Taller</h1>			
    	        </div>
  	</div>

<div class="container">
    <div class="row">
        <div class="col s8 m8">
        <form id="formulario" action="CreateTallerPst.php" method="post" class="col s12 offset-s3" enctype="multipart/form-data">
                <div class="input-field">                      
                    <input placeholder="Taller" name="taller" type="text" id="taller" class="validate" value="">
                    <label for="taller">Nombre del taller</label>
                </div>
                <div class="input-field">                      
                        <input placeholder="Definicion" name="mensaje" type="text" id="mensaje" class="validate" value="">
                        <label for="mensaje">Mensje descriptivo</label>
                </div>
                <div class="input-field">                      
                        <input placeholder="Link de acceso" name="linkacceso" type="text" id="linkacceso" class="validate"value="">
                        <label for="linkacceso">Link de acceso</label>
                </div>
                <div class="input-field">                      
                        <input placeholder="Codigo de acceso" name="codigoacceso" type="text" id="codigoacceso" class="validate"value="">
                        <label for="codigoacceso">Codigo de acceso</label>
                </div>
                <div class="input-field">
                        <select id="tipotaller" name="tipotaller">
                        <option value="" disabled selected>Definir Tipo</option>
                        <?php 
                                while ($result_tipo = $tipos_taller->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $result_tipo['id_tipo'];?>"><?php echo $result_tipo['tipo_descripcion'];?></option>
                        
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
                        <option value="<?php echo $result['estado_id'];?>"><?php echo $result['estado_descripcion'];?></option>                        
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
            </form>
        </div>  
    </div>
</div>

<?php include 'inc/footer2.php';?>



