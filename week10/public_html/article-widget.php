<?php
require ('../inc/NewsArticles.class.php');

$newsArticles = new NewsArticles();

$articleList = $newsArticles->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : "articleDate"),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : "desc"),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

// var_dump($articleList);
require_once ("../tpl/article-widget.tpl.php");

 ?>
