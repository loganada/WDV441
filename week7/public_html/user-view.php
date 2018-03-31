<?php
// usage: http://localhost:8080/WDV441_2018/week05/public_html/article-view.php?articleID=1
require_once('../inc/Users.class.php');

$users = new Users();

$userDataArray = array();

// load the article if we have it
if (isset($_REQUEST['userID']) && $_REQUEST['userID'] > 0)
{
    $users->load($_REQUEST['userID']);
    $userDataArray = $users->userData;
}

require_once('../tpl/user-view.tpl.php');
?>
