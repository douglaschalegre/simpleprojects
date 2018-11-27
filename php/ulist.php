<?php
    include_once 'header.php';
    include_once 'includes/db.php'
?>

<section class="main-container">
	<div class="main-wrapper">
        <h2>Lista de usuarios</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Username</th>
                <th>Ação</th>
            </tr>
            <?php
                $sql = 'SELECT * FROM `users`';
                $query = mysqli_query($connection, $sql);

                $result = mysqli_num_rows($query);
                if($result > 0){
                    while($data = mysqli_fetch_array($query)){
                        echo '
                        <tr>
                            <td>'.$data['user_id'].'</td>
                            <td>'.$data['user_first'].'</td>
                            <td>'.$data['user_last'].'</td>
                            <td>'.$data['user_email'].'</td>
                            <td>'.$data['user_uid'].'</td>
                            <td>
                                <a class="edit" href="update.php?id='.$data['user_id'].'"><i class="material-icons">
                                edit
                                </i></a>
                                <a class="delete" href="delete.php?id='.$data['user_id'].'"><i class="material-icons">
                                delete_sweep
                                </i></a>
                            </td>
                        </tr>';
                    }
                }

            ?>

        </table>
		
	</div>
</section>

<?php
	include_once 'footer.php';
?>
