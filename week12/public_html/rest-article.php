<?php
require_once('../inc/NewsArticles.class.php');

$newsArticles = new NewsArticles();

$newsArticleData = "";
$newsArticleList = "";

if (isset($_GET['articleID']) && $_GET['articleID'] > 0)
{
    if ($newsArticles->load($_GET['articleID']))
    {
        $newsArticleData = $newsArticles->articleData;

        $newsArticleData = json_encode($newsArticleData);

    }
    echo $newsArticleData;
}
else
{
    // web service to pull a list of articles
    $newsArticleList = $newsArticles->getList(
        null, null,
        (isset($_GET['filterColumn']) && isset($_GET['filterText']) ? $_GET['filterColumn'] : null),
        (isset($_GET['filterColumn']) && isset($_GET['filterText']) ? $_GET['filterText'] : null)
    );

    if (is_array($newsArticleList))
    {
        $newsArticleList = json_encode($newsArticleList);
    }

    echo $newsArticleList;
}
?>
