<?php

session_start();

if(isset($_POST['submit'])){

    include 'db.php';

    $uid = mysqli_real_escape_string($connection, $_POST['uid']);
    $password = mysqli_real_escape_string($connection, $_POST['pwd']);

    //empty inputs
    if(empty($uid) || empty($password)){
        header("Location: ../index.php?login=empty");
        exit();
    } else{
        $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
        $result = mysqli_query($connection,$sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            header("Location: ../index.php?login=userorpass");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)){
                $hasedPwdCheck = password_verify($password,$row['user_pwd']);
                if($hasedPwdCheck == false){
                    header("Location: ../index.php?login=userorpass");
                    exit();
                } elseif ( $hasedPwdCheck == true){
                    //Log in
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_id'] = $row['user_first'];
                    $_SESSION['u_id'] = $row['user_last'];
                    $_SESSION['u_id'] = $row['user_email'];
                    $_SESSION['u_id'] = $row['user_uid'];
                    header("Location: ../index.php?signup=sucess");
                    exit();
                }
            }
        }
    }
}else{
    header("Location: ../index.php?login=error");
    exit();
}