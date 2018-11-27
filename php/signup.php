<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
        <h2>Signup</h2>
        
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="first" placeholder="First Name">
            <input type="text" name="last" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit"> Cadastrar </button>
            <?php 
                 if(isset($_GET['signup'])){
                    if($_GET['signup'] == "sucess"){
                        echo '<script>alert("Dados cadastrados!");</script>';   
                    }if($_GET['signup'] == "userunavailable"){
                        echo '<script>alert("Usuario indisponivel!");</script>';   
                    }if($_GET['signup'] == "invalidcharacters"){
                        echo '<script>alert("Caracteres invalidos no nome ou sobrenome!");</script>';   
                    }if($_GET['signup'] == "empty"){
                        echo '<script>alert("Parece que algum campo ficouo vazio!");</script>';   
                    }
                }
            ?>
        </form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
