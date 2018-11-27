<?php
    include_once 'header.php';
    include_once 'includes/db.php';
    
    if(!empty($_POST)){
        $user = $_POST['id_douser'];
        
        $sql = "DELETE FROM `users` WHERE user_id = $user";
        $query = mysqli_query($connection, $sql);
        if($query){
            header("Location: ulist.php");
        }else{
            echo "Erro ao deletar usuario";
        }
    }

    if(empty($_REQUEST['id'])){
        header("Location: ulist.php");
    }else{
        
        $id = $_REQUEST['id'];
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
        }else{
            header("Location: ulist.php");
        }
    }
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Deletar usuario</h2>
        <div class="data-delete">
            <h3>Está certo que deseja deletar o usuário?</h3>
            
            <p>Nome: <span><?php echo $user_first?></span></p>
            <p>Sobrenome: <span><?php echo $user_last?></span></p>
            <p>Email: <span><?php echo $user_email?></span></p>
            <p>Username: <span><?php echo $user_uid?></span></p>

            <form method="post" action="">
                <input type="hidden" name="id_douser" value="<?php echo $id; ?>">
                <a href="ulist.php" class="btnCancelar">Cancelar</a>
                <input type="submit" value="Aceitar" class="btnDeletar">
            </form>
        </div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
