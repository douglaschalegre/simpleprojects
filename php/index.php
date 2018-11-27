<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
			if(isset($_SESSION['u_id'])){
				echo "Você está logado!</br>
				<img style=\"margin: 0 auto; display: block;\" src = img/loggedin.jpg";
			}
			if(isset($_GET['login'])){  
				if($_GET['login'] == "userorpass"){
					echo '<script>alert("Usuario ou senha incorreto!");</script>';   
				}if($_GET['login'] == "empty"){
					echo '<script>alert("Parece que algum campo ficouo vazio!");</script>';   
				}
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
