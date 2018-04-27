<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleList = $newsArticle->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : "articleDate"),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : "desc"),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

$articleList = array_slice($articleList, 0, ((isset($_GET['numberOfArticles']) ? $_GET['numberOfArticles'] : 5)));

require_once("../tpl/article-widget.tpl.php");
?>
