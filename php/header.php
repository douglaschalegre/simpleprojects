<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PHP Login system!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	
</head>
<body>
	<header>
		<nav>
			<div class="main-wrapper">
				<ul>
					<li class="teste"><a href="index.php">Home</a></li>
					<?php
						if(isset($_SESSION['u_id'])){
							echo "<li><a href=\"ulist.php\">Users List</a></li>";
						}
					?>
				</ul>
				<div class="nav-login">
                    <?php
                        if(isset($_SESSION['u_id'])){
                            echo '<form action="includes/logout.inc.php" method="POST">
                                    <button type="submit" name="submit">Logout</button>
                                 </form>';
                        }else{
                            echo '<form action="includes/login.inc.php" method="POST">
                                    <input type="text" name="uid" placeholder="Username">
                                    <input type="password" name="pwd" placeholder="Password">
                                    <button type="submit" name="submit">Login</button>
                                    <a href="signup.php">Cadastrar</a>
                                </form>
                        ';
                        }
                    ?>
				</div>
			</div>
		</nav>
	</header>