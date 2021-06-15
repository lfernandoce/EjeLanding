<?php include 'inc/header2.php'; ?>
<?php
Session::checkLogin();
?>


  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center   orange-text ">Login</h1>
    </div>
  </div>

  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s8 m8">                   
              <form action="" method="post" class="col s12 offset-s3">
                <div class="input-field">                      
                        <input placeholder="Email" name="email" type="text" id="email" class="validate">
                        <label for="email">Email</label>
                </div>
                <div class="input-field">                                            
                        <input placeholder="Contraseña" name="password" type="password" id="password" class="validate">
                        <label for="password">Contraseña</label>
                </div>
                <div class="row center">
                        <input type="submit" id="loginsubmit" value="Login" class="btn-large waves-effect waves-light orange">
                </div>                
              </form>
                <div class="row center col s12 offset-s3">
                  <p>Nuevo Usuario ? <a href="register2.php">Registrarse</a> Gratis</p>
                  <span class="empty" style="display: none;">Field must not be empty !</span>
                  <span class="error" style="display: none;">Email or Password not matched !</span>
                  <span class="disable" style="display: none;">User Id disabled !</span>
                </div>          
        </div>    
      </div>
    </div>
    <br><br>
  </div>
  <?php include 'inc/footer2.php'; ?>  
