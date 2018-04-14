<?php
session_start();
require_once('../inc/Users.class.php');
$user = new Users();

//print "<h1> $message</h1>";
if (isset($_POST['submitLogin']))
{
    $userData = $_POST;
    // sanitize
    $userData = $user->santinize($userData);
    $user->set($userData);
    //$user->authorizeUser($_POST['username'], $_POST['password']);
    if ($user_id = $user->authorizeUser($_POST['username'], $_POST['password']))
    {
      $_SESSION["userID"] = $user_id;
      header("location: article-list.php");
      exit;
    }
    else
    {
        echo "Login failed";
    }
}

require_once('../tpl/login.tpl.php');
?>
