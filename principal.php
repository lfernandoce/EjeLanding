<?php include 'inc/header2.php';
$filepath = realpath(dirname(__FILE__)); 
include_once ($filepath.'/config/Parametros.php');
 $rutaim=DIR_IMAGE; 
 ?>
<?php
Session::checkSession();
$talleres = $exm->getTalleres();

 
?>

	<div class="section no-pad-bot" id="index-banner">
    	<div class="container">
      		<br><br>
			<a href="CreateTaller.php" class="btn-floating right btn-large waves-effect waves-light orange"><i class="material-icons">add</i></a>
      		<h2 class="header center   orange-text ">Talleres</h1>			
    	</div>
  	</div>
	<div class="container">
	  	<div class="row">	
		<?php 
			while ($result = $talleres->fetch_assoc()) {
				$imagen= "";
				$imagen= $rutaim .$result['taller_imagen'];
				 
		?>
  			<div class="col s12 m3">
				<div class="card small" >
					<div class="card-image waves-effect waves-block waves-light">
						<img class="activator" src=<?php
							 if (file_exists($imagen))
							 {
								 echo $imagen;
							 }
							 else {
								 echo "img/eje1.jpg";
							 }						
						?>>
					</div>
					
					<div class="card-content transparent">
						<span class="card-title activator grey-text text-darken-4 transparent"><?php echo $result['taller_nombre']; ?><i class="material-icons right">more_vert</i></span>						
						<p><a href="editPreview.php?id=<?php echo $result['taller_id']?>">Detalles</a></p>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4"><?php echo $result['taller_nombre']; ?><i class="material-icons right">close</i></span>
						<p><?php echo $result['taller_mensaje']; ?></p>
						
						<a href="<?php echo $result['taller_link_acceso']; ?>" target="_blank"><?php echo $result['taller_link_acceso']; ?></a>
						<br></br>
						<p>Codigo de acceso: <?php echo $result['taller_codigo_acceso']; ?></p>
						
						
						<!-- ELEMENTOS HOVER-->
						<div class="fixed-action-btn">
						<a class="btn-floating btn-large red" >
							<i class="large material-icons">mode_edit</i>
							
						</a>
						<ul>
							
							<li>
							<a class="btn-floating red" href="edit.php?id=<?php echo $result['taller_id']?> "><i class="material-icons Tiny">border_color</i></a></li>
							<li><a class="btn-floating yellow darken-1"><i class="material-icons"><?php if($result['estado']=="1")
																										{
																											echo "lock";
																										
																										}else
																										{ 
																											echo "lock_open";
																										}?>
																										 </i></a></li>
							<li><a class="btn-floating green"><i class="material-icons">delete</i></a></li>
							
						</ul>
						</div>
					</div>					
				</div>

			    

			</div>		


		<?php
			}
		?>
			
	  </div>
  	</div>


  



  
<?php include 'inc/footer2.php'; ?>

<!-- <?php include 'inc/header.php'; ?>
<?php include 'inc/footer.php'; ?>
-->
