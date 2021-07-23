<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header2.php');
	include_once ($filepath.'/../classes/User.php');
	$usr = new User();
?>
<?php 
	if (isset($_GET['dis'])) {
		$dblid = (int)$_GET['dis'];
		$dblUser = $usr->disableUser($dblid);
	}

	if (isset($_GET['ena'])) {
		$ebllid = (int)$_GET['ena'];
		$eblUser = $usr->enableUser($ebllid);
	}

	if (isset($_GET['del'])) {
		$delid = (int)$_GET['del'];
		$delUser = $usr->deleteUser($delid);
	}


 ?>


<?php 
		if (isset($dblUser)) {
			echo $dblUser;
		}

		if (isset($eblUser)) {
			echo $eblUser;
		}

		if (isset($delUser)) {
			echo $delUser;
		}

	 ?>

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
        <br><br>
        <h1 class="header center orange-text ">Usuarios Registrados</h1>
        <br>
        </div>
    </div>


<div class="container">
    <div class="row">
        <div class="col s12">
        <table class="table striped highlight centered">
            <tr>
                <th class="center">No</th>
                <th class="center">Name</th>
                <th class="center">Username</th>
                <th class="center">Email</th>
                <th class="center">Action</th>
            </tr>
    <?php 
    $userData = $usr->getAllUser();
    if ($userData) {
        $i = 0;
        while ($result = $userData->fetch_assoc()) {
            $i++;

    ?>
            <tr>
                <td><?php 
                    if ($result['status'] == '1') {
                        echo "<span class='error'>".$i."</span>"; 
                    }else{
                        echo $i;
                    }
                

                ?></td>
                <td><?php echo $result['name'] ; ?></td>
                <td><?php echo $result['username'] ; ?></td>
                <td><?php echo $result['email'] ; ?></td>
                <td>
                    
                    <?php
                        if ($result['status'] == '0') { ?>
                            <a class="orange-text" onclick="return confirm('Are You Sure to Disable')" href="?dis=<?php echo $result['userid'];?>">Desabilitar</a>
                        <?php } else{ ?>
                            <a class="orange-text" onclick="return confirm('Are You Sure to Enable')" href="?ena=<?php echo $result['userid'];?>">Habilitar</a>
                        <?php }?>
                    ||<a class="orange-text" onclick="return confirm('Are You Sure to Remove')" href="?del=<?php echo $result['userid'];?>">Eliminar</a>
                </td>

            </tr>

        <?php }} ?>

        </table>


            <span class="flow-text">texte center</span>
        </div>
    </div>
</div>




<?php include 'inc/footer2.php'; ?>