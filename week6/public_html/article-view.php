<?php
// usage: http://localhost:8080/WDV441_2018/week05/public_html/article-view.php?articleID=1
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleDataArray = array();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) 
{
    $newsArticle->load($_REQUEST['articleID']);
    $articleDataArray = $newsArticle->articleData;
}
?>
<html>
    <body>
        title: <?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?><br>
        content: <?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?><br>
        author: <?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?><br>
        date: <?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?><br>
    </body>
</html>