<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
  $host_name = 'localhost';
  $database = 'glyko';
  $user_name = 'root';
  $password = 'root';
  $connect = mysql_connect($host_name, $user_name, $password, $database);

  if($username !== "" && $password !== "")
  {
      $requete = "SELECT count(*) FROM users where 
            Username = '".$username."' and Password = '".$password."' ";
      $exec_requete = mysqli_query($db,$requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];
      if($count!=0) 
      {
         $_SESSION['username'] = $username;
         header('Location: index.php');
      }
      else
      {
         header('Location: login.php?erreur=1');
      }
  }
}
else
{
 header('Location: login.php');
}
?>
