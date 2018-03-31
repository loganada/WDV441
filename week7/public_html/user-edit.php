<?php
// usage: http://localhost:8080/WDV441_2018/week05/public_html/article-edit.php?articleID=1
// usage new: http://localhost:8080/WDV441_2018/week05/public_html/article-edit.php
require_once('../inc/Users.class.php');


$users = new Users();

$userDataArray = array();
$userErrorsArray = array();

// load the user if we have it
if (isset($_REQUEST['userID']) && $_REQUEST['userID'] > 0)
{
    $users->load($_REQUEST['userID']);
    $userDataArray = $users->userData;
}

if (isset($_POST['Cancel']))
{
    header("location: user-list.php");
    exit;
}

// apply the data if we have new data
if (isset($_POST['Save']))
{
    $userDataArray = $_POST;
    // sanitize
    $userDataArray = $users->santinize($userDataArray);
    $users->set($userDataArray);

    // validate
    if ($users->validate())
    {
        // save
        if ($users->save())
        {
            header("location: user-save-success.php");
            exit;
        }
        else
        {
            $userErrorsArray[] = "Save failed";
        }
    }
    else
    {
        $userErrorsArray = $users->errors;
        $userDataArray = $users->userData;
    }
}

require_once('../tpl/user-edit.tpl.php');
?>
