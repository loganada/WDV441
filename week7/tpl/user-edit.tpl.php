<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($userErrorsArray['username']))
            { ?>
                <div><?php echo $userErrorsArray['username']; ?>
            <?php } ?>
            Username: <input type="text" name="username" value="<?php echo (isset($userDataArray['username']) ? $userDataArray['username'] : ''); ?>"/><br>
            Password: <textarea name="password"><?php echo (isset($userDataArray['password']) ? $userDataArray['password'] : ''); ?></textarea><br>
            User Level: <input type="text" name="userLevel" value="<?php echo (isset($userDataArray['user_level']) ? $userDataArray['user_level'] : ''); ?>"/><br>
            <input type="hidden" name="userID" value="<?php echo (isset($userDataArray['user_id']) ? $userDataArray['user_id'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>
        </form>
    </body>
</html>
