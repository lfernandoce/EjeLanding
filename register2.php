<?php include 'inc/header2.php'; ?>


    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br><br>
            <h1 class="header center   orange-text ">Registro</h1>
        </div>
  </div>

    <div class="container">
        <div class="section">
        <!--   Icon Section   -->
            <div class="row">
                <div class="col s8 m8">                  
                    <form action="" method="post" class="col s12 offset-s3">

                        <div class="input-field">                                              
                            <input placeholder="Nombre" type="text" name="name" id="name" class ="validate">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field">                        
                            <input placeholder="Usuario"name="username" type="text" id="username" class="validate">
                            <label for="username">Usuario</label>
                        </div>


                        <div class="input-field">                                                
                            <input type="password" name="password" id="password" placeholder="Contraseña" class="validate">
                            <label for="password">Contraseña</label>
                        </div>

                        <div class="input-field">                                                                        
                            <input name="email" type="text" id="email" placeholder="Correo electrónico" class="validate">
                            <label for="email">Correo electrónico</label>
                        </div>

                        <div class="row center">                    
                            <input type="submit" id="regsubmit" value="Signup" class="btn-large waves-effect waves-light orange">                                               
                        </div>
                    </form>
                    <div class="row center col s12 offset-s3">
                        <p>Ya estas registrado ? <a href="index2.php">Inicia Sessión</a> Aquí</p>            
                        <span id="state"></span>
                    </div>            
                </div>
            </div>
            <br><br>
        </div>
    </div>

    <?php include 'inc/footer2.php'; ?>

