<?php
include('security.php');
 //session_start();
 //require 'dbconfig.php';


if(isset($_POST['login_btn']))
{
  $email_login = $_POST['email'];
  $passwd_login = $_POST['password'];

  $query = "SELECT * FROM register WHERE email = '$email_login' AND password='$passwd_login' ";
  $query_run = mysqli_query($connection,$query);
  $usertypes = mysqli_fetch_array($query_run);


  if($usertypes['usertype'] == "Admin")
  {

    $_SESSION['username'] = $email_login;
    header('Location: index.php');
  }
  elseif($usertypes['usertype'] == 'User')
  {
    $_SESSION['username'] = $email_login;
    header('Location:  ');
  }
  else
  {
    $_SESSION['status'] = 'Email id / Password is Invalid';
    header('Location: login.php ');
  }





}


 ?>
