<?php
require_once('Base.class.php');

class Users extends Base
{   
    function __construct() 
    {
        // still run parent functionality
        parent::__construct();
        
        $this->tableName = "users";
        $this->keyField = "user_id";
        $this->columnNames = array
        (
           "username",
           "password",
           "user_level"            
        );
    }
        
    function santinize($dataArray)
    {
        // sanitize data based on rules
        
        return $dataArray;
    }
    
    function validate()
    {
        $isValid = true;
        
        // if an error, store to errors using column name as key
        
        // validate the data elements in userData property
        if (empty($this->data['username']))
        {
            $this->errors['username'] = "Please enter a username";
            $isValid = false;
        }        
                        
        return $isValid;
    }    
    
    function validateUser($username, $password)
    {
        $user_id = null;
        //$_SESSION['user_id'] = $user_id;
        
        $sql = "SELECT " . $this->keyField . 
            " FROM " . $this->tableName . " WHERE username = ? AND password = ?";
                
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute(array($username, $password));
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
     
        if (is_array($data))
        {
            $user_id = $data[$this->keyField];
        }
    
        return $user_id;
    }
    
    function checkUserRights($user_id, $check_level)
    {
        $hasRights = false;
        
        if ($this->load($user_id))
        {
            $user_level = $this->data['user_level'];            
            $hasRights = ($user_level >= $check_level);
        } 
        else 
        {
            $hasRights = ($check_level == 100);
        }
        
        
        return $hasRights;
    }
    
}


class Users2 
{
    var $userData = array();
    var $errors = array();

    var $db = null;

    function __construct() 
    {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2018;charset=utf8', 'wdv441', 'wdv4412018');        
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
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_id=?");
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
        // save data from userData property to database
        if (empty($this->userData['user_id']))
        {
            $stmt = $this->db->prepare(
                "INSERT INTO users 
                    (username, password, user_level) 
                 VALUES (?, ?, ?)");
               
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['user_level']
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
                "UPDATE users SET 
                    username = ?,
                    password = ?,
                    user_level = ?
                WHERE user_id = ?"
            );
                    
            $isSaved = $stmt->execute(array(
                    $this->userData['username'],
                    $this->userData['password'],
                    $this->userData['user_level'],
                    $this->userData['user_id']
                )
            );            
        }
                        
        return $isSaved;
    }
    
    function validate()
    {
        $isValid = true;
        
        // if an error, store to errors using column name as key
        
        // validate the data elements in userData property
        if (empty($this->userData['username']))
        {
            $this->errors['username'] = "Please enter a username";
            $isValid = false;
        }        
                        
        return $isValid;
    }
    
    function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null)
    {
        $articleList = array();
        
        $sql = "SELECT * FROM users ";

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
            
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                
        return $articleList;        
    }
}
?>