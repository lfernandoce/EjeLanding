<?php include 'inc/header2.php'; ?>
<?php
Session::checkSession();
if (isset($_GET['id'])) {
	$number = (int) $_GET['id'];
}else{
	header("Location:Principal.php");
}
$talleres = $exm->getTaller($number);
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
            
              <form action="" method="post" class="col s12 offset-s3">
                <div class="input-field">                      
                        <input placeholder="Taller" name="taller" type="text" id="taller" class="validate">
                        <label for="taller">Taller</label>
                </div>

                <div class="input-field">                      
                        <input placeholder="Definicion" name="nombre" type="text" id="nombre" class="validate">
                        <label for="nombre">Definicion</label>
                </div>
                <div class="input-field">                      
                        <input placeholder="Link de acceso" name="linkacceso" type="text" id="linkacceso" class="validate">
                        <label for="linkacceso">Link de acceso</label>
                </div>
                <div class="input-field">                      
                        <input placeholder="Codigo de acceso" name="codigoacceso" type="text" id="codigoacceso" class="validate">
                        <label for="codigoacceso">Codigo de acceso</label>
                </div>
                <div class="input-field">
                    <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    </select>
                    <label>Materialize Select</label>
                </div>

                <div class="input-field">                                              
                        <label for="imagen">Imagen</label>
                        <br></br>
                        <input placeholder="Imagen" name="imagen" type="file" id="imagen" class="validate">
                </div>
       




                <div class="row center">
                        <input type="submit" id="loginsubmit" value="Login" class="btn-large waves-effect waves-light orange">
                </div>  
              </form>
			    

			</div>		
		</div>
  	</div>         
</div>






  
<?php include 'inc/footer2.php'; ?>

<!-- <?php include 'inc/header.php'; ?>
<?php include 'inc/footer.php'; ?>
-->
