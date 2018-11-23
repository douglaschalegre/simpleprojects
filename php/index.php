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
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
