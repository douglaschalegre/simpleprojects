<?php

if(isset($_POST['submit'])){

    include_once 'db.php';

    $id = mysqli_real_escape_string($connection,$_POST['id']);
    $first = mysqli_real_escape_string($connection,$_POST['first']);
    $last = mysqli_real_escape_string($connection,$_POST['last']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $uid = mysqli_real_escape_string($connection,$_POST['uid']);
    $password = mysqli_real_escape_string($connection,$_POST['pwd']);

    //Checking empty fields
    if(empty($first) || empty($last) || empty($uid) || empty($email) || empty($password)){
        header("Location: ../ulist.php?update=empty");
        exit();
    }else{
           
        //Checking if characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/",$last)){
            header("Location: ../ulist.php?update=invalidcharacters");
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
                $sql = "SELECT * FROM users WHERE user_uid = '$id'";
                $result = mysqli_query($connection,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    header("Location: ../ulist.php?update=userunavailable");
                    exit();
                }
                else{
                    $hashed = password_hash($password, PASSWORD_DEFAULT);
                    //Inserting user in db
                    $sql = "UPDATE users
                    SET user_email='$email', user_first='$first', user_last='$last', user_uid='$uid', user_pwd='$password' WHERE user_id = $id ";
                    mysqli_query($connection, $sql);
                    header("Location: ../ulist.php?update=sucess&id=".$uid);
                    exit();
                    
                }
        //    }
        }
    }
}else{
    header("Location: ../update.php");
    exit();
}