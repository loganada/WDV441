<?php

class Base
{
    var $data = array();
    var $errors = array();

    var $tableName = null;
    var $keyField = null;
    var $columnNames = array();

    var $db = null;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2018;charset=utf8', 'root', '');
    }

    function set($dataArray)
    {
        $this->data = $dataArray;
    }

    function santinize($dataArray)
    {
        // sanitize data based on rules

        return $dataArray;
    }

    function load($id)
    {
        $isLoaded = false;

        // load from database
        $stmt = $this->db->prepare("SELECT * FROM " . $this->tableName . " WHERE " . $this->keyField . "=?");

        $stmt->execute(array($id));

        if ($stmt->rowCount() == 1)
        {
            $dataArray = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($dataArray);
            $this->set($dataArray);

            $isLoaded = true;
        }

      //var_dump($stmt->rowCount());die;

        return $isLoaded;
    }

    function save()
    {
        $isSaved = false;

        // determine if insert or update based on articleID
        // save data from data property to database
        if (empty($this->data[$this->id]))
        {
            $sql = "INSERT INTO " . $this->tableName . "
                    (" . implode(', ', $this->columnNames) . ")
                 VALUES (";

            for ($i = 0; $i < count($this->columnNames); $i++)
            {
                $sql .= ($i > 0 ? ', ?' : '?');
            }

            $sql .= ")";

            $stmt = $this->db->prepare($sql);

            $dataArray = array();

            foreach ($this->columnNames as $columnName)
            {
                $dataArray[] = $this->data[$columnName];
            }

            $isSaved = $stmt->execute(array_values($dataArray));

            if ($isSaved)
            {
                $this->data[$this->keyField] = $this->db->lastInsertId();
            }
        }
        else
        {
            $sql = "UPDATE " . $this->tableName . " SET ";

            foreach ($this->columnNames as $columnName)
            {
                $sql .= $columnName . " = ?,";
            }

            // remove trailing comma
            $sql = substr($sql, 0, strlen($sql) - 1);

            $sql .= " WHERE " . $this->keyField . " = ?";

            $stmt = $this->db->prepare($sql);

            $dataArray = array();

            foreach ($this->columnNames as $columnName)
            {
                $dataArray[] = $this->data[$columnName];
            }

            $dataArray[] = $this->data[$this->keyField];
/*
var_dump("UPDATE users SET
                    username = ?,
                    password = ?,
                    user_level = ?
                WHERE user_id = ?", $sql, $dataArray);die;
*/
            $isSaved = $stmt->execute($dataArray);
        }

        return $isSaved;
    }

    function validate()
    {
        $isValid = true;

        return $isValid;
    }

    function getList($sortColumn = null, $sortDirection = null, $filterColumn = null, $filterText = null)
    {
        $articleList = array();

        $sql = "SELECT * FROM " . $this->tableName . " ";

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
