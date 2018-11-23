<?php

if(isset($_POST['submit'])){

    include_once 'db.php';

    $first = mysqli_real_escape_string($connection,$_POST['first']);
    $last = mysqli_real_escape_string($connection,$_POST['last']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $uid = mysqli_real_escape_string($connection,$_POST['uid']);
    $password = mysqli_real_escape_string($connection,$_POST['pwd']);

    //Checking empty fields
    if(empty($first) || empty($last) || empty($uid) || empty($email) || empty($password)){
        header("Location: ../signup.php?signup=empty");
        exit();
    }else{
           
        //Checking if characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/",$last)){
            header("Location: ../signup.php?signup=invalidcharacters");
            exit();
        }
        else{
            //verify email
            // if(!filter_var($email, FILTER_VALIDADE_EMAIL)){
            //     var_dump(filter_var($email, FILTER_VALIDADE_EMAIL));
            //     header("Location: ../signup.php?signup=invalidemail");
            //     exit();
            // }
            //else{
                
                //checking if user is available
                $sql = "SELECT * FROM users WHERE user_uid = '$uid'";
                $result = mysqli_query($connection,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    header("Location: ../signup.php?signup=userunavailable");
                    exit();
                }
                else{
                    $hashed = password_hash($password, PASSWORD_DEFAULT);
                    //Inserting user in db
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first','$last','$email','$uid','$hashed');";
                    mysqli_query($connection, $sql);
                    header("Location: ../signup.php?signup=sucess");
                    exit();
                }
        //    }
        }
    }
}else{
    header("Location: ../signup.php");
    exit();
}