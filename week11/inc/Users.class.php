<?php
class Users
{
    var $userData = array();
    var $errors = array();

    var $db = null;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2018;charset=utf8', 'root', '');
    }

    function set($dataArray)
    {
        $this->userData = $dataArray;
    }

    function santinize($dataArray)
    {
        // sanitize data based on rules

        return $dataArray;
    }
    function load($userID)
    {
        $isLoaded = false;

        // load from database
        $stmt = $this->db->prepare("SELECT * FROM user_table WHERE user_id=?");
        $stmt->execute(array($userID));

        if ($stmt->rowCount() == 1)
        {
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            $this->set($dataArray);

            $isLoaded = true;
        }

        //var_dump($stmt->rowCount());

        return $isLoaded;
    }

    function save()
    {
        $isSaved = false;

        // determine if insert or update based on articleID
        // save data from articleData property to database
        if (empty($this->userData['userID']))
        {


            $stmt = $this->db->prepare(
                "INSERT INTO user_table
                    (username, password,user_level, user_file)
                 VALUES (?, ?, ?,?)");

            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                      $this->userData['userLevel'],
                      $this->userData['userFile']
                )
            );

            if ($isSaved)
            {
                $this->userData['user_id'] = $this->db->lastInsertId();
            }
        }
        else
        {
            $stmt = $this->db->prepare(
                "UPDATE user_table SET
                    username = ?,
                    password = ?,
                    user_level = ?,
                    user_file = ?
                WHERE user_id = ?"
            );

            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['userLevel'],
                    $this->userData['userFile'],
                    $this->userData['userID']
                )
            );
        }

        return $isSaved;
    }

    function validate()
    {
        $isValid = true;

        // if an error, store to errors using column name as key

        // validate the data elements in articleData property
        if (empty($this->userData['username']))
        {
            $this->errors['username'] = "Please enter a username";
            $isValid = false;
        }

        return $isValid;
    }

    function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null)
    {
        $userList = array();

        $sql = "SELECT * FROM user_table ";

        if (!is_null($filterColumn) && !is_null($filterText))
        {
            $sql .= " WHERE " . $filterColumn . " LIKE ?";
        }

        if (!is_null($sortColumn))
        {
            $sql .= " ORDER BY " . $sortColumn;

            if (!is_null($sortDirection))
            {
                $sql .= " " . $sortDirection;
            }
        }

        $stmt = $this->db->prepare($sql);

        if ($stmt)
        {
            $stmt->execute(array('%' . $filterText . '%'));

            $userList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $userList;
    }

function authorizeUser($inUsername, $inPassword){
  $user_id=null;
  $checkUsersql="SELECT user_id, username, password, user_level
                FROM user_table
                WHERE username = :username
                AND password = :password";
                $query= $this->db->prepare($checkUsersql);
                                    $query->bindParam('username', $inUsername, PDO::PARAM_STR);
                                    $query->bindValue('password', $inPassword, PDO::PARAM_STR);
                                    $query->execute();

                                    $count = $query->rowCount();
                                    $row   = $query->fetch(PDO::FETCH_ASSOC);

if ($row!=false) {
  $user_id = $row["user_id"];
}
  return $user_id;
}
}
?>
