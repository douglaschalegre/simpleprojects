<?php
    include_once 'header.php';
    include_once 'includes/db.php';
    
    if(empty($_GET['id'])){ 
        header('Location: ulist.php');
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE user_id = $id";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_num_rows($query);
    
    if($result > 0){
        while($data = mysqli_fetch_array($query)){
            $user_id = $data['user_id'];
            $user_first = $data['user_first'];
            $user_last = $data['user_last'];
            $user_email = $data['user_email'];
            $user_uid = $data['user_uid'];
            $user_pwd = $data['user_pwd'];
        }
    }
?>

<section class="main-container">
	<div class="main-wrapper">
        <h2>Atualizar usuario</h2>
        
        <form class="signup-form" action="includes/update.inc.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="first" placeholder="First Name" value="<?php echo $user_first; ?>">
            <input type="text" name="last" placeholder="Last Name" value="<?php echo $user_last; ?>">
            <input type="text" name="email" placeholder="Email" value="<?php echo $user_email; ?>">
            <input type="text" name="uid" placeholder="Username" value="<?php echo $user_uid; ?>">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="submit"> Atualizar </button>
            <?php 
                 if(isset($_GET['update'])){
                    if($_GET['update'] == "sucess"){
                        echo '<script>alert("Dados cadastrados!");</script>';   
                    }if($_GET['update'] == "userunavailable"){
                        echo '<script>alert("Usuario indisponivel!");</script>';   
                    }if($_GET['update'] == "invalidcharacters"){
                        echo '<script>alert("Caracteres invalidos no nome ou sobrenome!");</script>';   
                    }if($_GET['update'] == "empty"){
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
