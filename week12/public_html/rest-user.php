<?php
require_once('../inc/Users.class.php');

$users = new Users();

$userData = "";
$userList = "";

if (isset($_GET['userID']) && $_GET['userID'] > 0)
{
    if ($users->load($_GET['userID']))
    {

        $userDataArray = $users->userData;

        $userDataArray = json_encode($userDataArray);

    }
    echo "Current User:  " . $userDataArray;
}
else
{
    // web service to pull a list of users
    $userList = $users->getList(
        null, null,
        (isset($_GET['filterColumn']) && isset($_GET['filterText']) ? $_GET['filterColumn'] : null),
        (isset($_GET['filterColumn']) && isset($_GET['filterText']) ? $_GET['filterText'] : null)
    );

    if (is_array($userList))
    {
        $userList = json_encode($userList);
    }

    echo $userList;
}
?>
