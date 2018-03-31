<html>
    <body>
        User ID: <?php echo (isset($userDataArray['user_id']) ? $userDataArray['user_id'] : ''); ?><br>
        Username: <?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?><br>
        Password: <?php echo (isset($userDataArray['password']) ? $userDataArray['password'] : ''); ?><br>
        User Level: <?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?><br>
        <br>
        <a href="user-list.php">Back to User List</a>
    </body>
</html>
