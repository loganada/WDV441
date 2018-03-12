<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();
$i=1;
$articleList = $newsArticle->getList();
echo"<br><br><a href='article-edit.php'>Add New Article</a><br><br><br>";

foreach ($articleList as $key => $value) {
  echo $articleList[$key]['articleTitle'] . "<br>";
  echo"<a href='article-edit.php?articleID=$i'>Edit Article</a><br>";
  echo"<a href='article-view.php?articleID=$i'>View Article</a><br><br>";
  $i++;
}

?>
