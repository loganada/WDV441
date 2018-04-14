<html>
    <body>
      <div>Admin - <a href="/wdv441/week8/public_html/login.php">Login here</a></div>

        <div>Users - <a href="/wdv441/week8/public_html/user-edit.php">Add New User</a></div>
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Search:
                <select name="filterColumn">
                    <option value="userID">User ID</option>
                    <option value="username">Username</option>
                    <option value="password">Password</option>
                    <option value="userLevel">User Level</option>
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="filter" value="Search"/>
            </form>
        </div>

            <table border="1">
                <tr>

                    <th>User ID&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userID&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userID&sortDirection=DESC">D</a></th>
                    <th>User Picture&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userFile&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userFile&sortDirection=DESC">D</a></th>
                    <th>Username&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=username&sortDirection=DESC">D</a></th>
                    <th>Password&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=password&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=password&sortDirection=DESC">D</a></th>
                    <th>User Level&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userLevel&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userLevel&sortDirection=DESC">D</a></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($userList as $userData)
                { ?>
                    <tr>
                        <td><?php echo $userData['user_id']; ?></td>
                        <td><?php echo "<img width='30px' src='images/".$userData['user_file'] . "'/>" ?></td>
                        <td><?php echo $userData['username']; ?></td>
                        <td><?php echo $userData['password']; ?></td>
                          <td><?php echo $userData['user_level']; ?></td>
                        <td><a href="/wdv441/week8/public_html/user-edit.php?userID=<?php echo $userData['user_id']; ?>">Edit</a></td>
                        <td><a href="/wdv441/week8/public_html/user-view.php?userID=<?php echo $userData['user_id']; ?>">View</a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
