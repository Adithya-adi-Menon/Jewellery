<?php
include('security.php');

$connection = mysqli_connect("localhost","root","","adminpanel");

if(isset($_POST['registerbtn']))
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirmpassword'];
  $usertype = $_POST['usertype'];

  if($password === $confirm_password)
  {
      $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
      $query_run = mysqli_query($connection, $query);

      if($query_run)
      {

          $_SESSION['success'] =  "Admin is Added Successfully";
          header('Location: register.php');
      }
      else
      {

          $_SESSION['status'] =  "Admin is Not Added";
          header('Location: register.php');
      }
  }
  else
  {

      $_SESSION['status'] =  "Password and Confirm Password Does not Match";
      header('Location: register.php');
  }

}

//Data update
if(isset($_POST['update_btn']))
{
  $id=$_POST['edit_id'];
  $username=$_POST['edit_name'];
  $email=$_POST['edit_email'];
  $password=$_POST['edit_password'];
  $usertypeupdate=$_POST['update_usertype'];
  $query="UPDATE register SET username='$username',email='$email',password='$password',usertype='$usertypeupdate' WHERE id='$id'";

  $query_run =mysqli_query($connection,$query);

  if($query_run)
  {
    $_SESSION['success'] = "Your data is updated";
    header("Location:register.php");
  }
  else {
    $_SESSION['status'] = "Your data is not updated";
    header("Location:register.php");
  }
}

// deletw
if(isset($_POST['delete_btn']))
{
  $id=$_POST['delete_id'];

  $query="DELETE FROM register WHERE id='$id'";

  $query_run = mysqli_query($connection,$query);

  if($query_run)
  {
    $_SESSION['success'] = "Your data is Deleted";
    header("Location:register.php");
  }
  else {
    $_SESSION['status'] = "Your data is not Deleted";
    header("Location:register.php");
  }
}




?>
