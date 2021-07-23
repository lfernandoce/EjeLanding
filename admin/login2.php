<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/loginheader2.php');
	include_once ($filepath.'/../classes/Admin.php');
	$ad = new Admin();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$adminData = $ad->getAdminData($_POST);
}

  ?>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text ">Login</h1>
    </div>
  </div>

<div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s8 m8">                   
              <form action="" method="post" class="col s12 offset-s3">
                <div class="input-field">                                              
						<input placeholder="Username" id="adminUser" type="text" name="adminUser" class ="validate"/>
						<label for="adminUser">Username</label>
                </div>
                <div class="input-field">                                            
                        <input placeholder="Contraseña" name="adminPass" type="password" id="adminPass" class="validate">
                        <label for="adminPass">Contraseña</label>					
                </div>
                <div class="row center">
                        <input type="submit" name="login" value="Login" id="login" class="btn-large waves-effect waves-light orange">
						<!-- <input type="submit" name="login" value="Login"/> -->
                </div>       				
				<div class="input-field">                                            
					<div class="row center red-text">                  
					<?php 
						if (isset($adminData)) {
							echo $adminData;
						}
						?>                  
					</div>
                </div>   
              </form>                          
        </div>    
      </div>
    </div>
    <br><br>
  </div>








<?php include 'inc/footer2.php'; ?>