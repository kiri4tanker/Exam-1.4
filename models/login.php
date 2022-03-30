<?php
   require_once __DIR__ . "/database/database.php";

   session_start();

   if(isset($_POST['submit'])){

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass = md5($_POST['password']);
      $user_type = $_POST['user_type'];

      $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

      $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){

         $row = mysqli_fetch_array($result);

         if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            header('location: /admin.php');

         }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            header('location: /user.php');

         }
      
      }else{
         $error[] = 'incorrect email or password!';
      }

   };