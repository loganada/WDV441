<?php

class NewsArticles
{
    var $articleData = array();
    var $errors = array();

    var $db = null;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=wdv441_2018;charset=utf8', 'root', '');
    }

    function set($dataArray)
    {
        $this->articleData = $dataArray;
    }

    function sanitize($dataArray)
    {
        // sanitize data based on rules

        return $dataArray;
    }

    function load($articleID)
    {
        $isLoaded = false;

        // load from database
        $stmt = $this->db->prepare("SELECT * FROM newsarticles WHERE articleID=?");
        $stmt->execute(array($articleID));

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
        if (empty($this->articleData['articleID']))
        {
            $stmt = $this->db->prepare(
                "INSERT INTO newsarticles
                    (articleTitle, articleContent, articleAuthor, articleDate)
                 VALUES (?, ?, ?, ?)");

            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate']
                )
            );

            if ($isSaved)
            {
                $this->articleData['articleID'] = $this->db->lastInsertId();
            }
        }
        else
        {
            $stmt = $this->db->prepare(
                "UPDATE newsarticles SET
                    articleTitle = ?,
                    articleContent = ?,
                    articleAuthor = ?,
                    articleDate = ?
                WHERE articleID = ?"
            );

            $isSaved = $stmt->execute(array(
                    $this->articleData['articleTitle'],
                    $this->articleData['articleContent'],
                    $this->articleData['articleAuthor'],
                    $this->articleData['articleDate'],
                    $this->articleData['articleID']
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
        if (empty($this->articleData['articleTitle']))
        {
            $this->errors['articleTitle'] = "Please enter a title";
            $isValid = false;
        }
        if (empty($this->articleData['articleContent']))
        {
            $this->errors['articleContent'] = "Please enter Content";
            $isValid = false;
        }
        if (empty($this->articleData['articleAuthor']))
        {
            $this->errors['articleAuthor'] = "Please enter an author";
            $isValid = false;
        }
        if (empty($this->articleData['articleDate']))
        {
            $this->errors['articleDate'] = "Please enter a Date";
            $isValid = false;
        }

        return $isValid;
    }

    function getList()
    {
        $articleList = array();

        $stmt = $this->db->query("SELECT * FROM newsarticles");

        if ($stmt)
        {
            $articleList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $articleList;
    }
}
?>
