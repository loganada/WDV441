<?php
// usage: http://localhost:8080/WDV441_2018/week05/public_html/article-edit.php?articleID=1
// usage new: http://localhost:8080/WDV441_2018/week05/public_html/article-edit.php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleDataArray = array();
$articleErrorsArray = array();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0)
{
    $newsArticle->load($_REQUEST['articleID']);
    $articleDataArray = $newsArticle->articleData;
}

// apply the data if we have new data
if (isset($_POST['Save']))
{
    $articleDataArray = $_POST;
    // sanitize
    $articleDataArray = $newsArticle->sanitize($articleDataArray);
    $newsArticle->set($articleDataArray);

    // validate
    if ($newsArticle->validate())
    {
      $isValid = true;

      // if an error, store to errors using column name as key

      // validate the data elements in articleData property
      if (empty($articleDataArray['articleTitle']))
      {
          $this->errors['articleTitle'] = "Please enter a title";
          $isValid = false;
      }
      if (empty($articleDataArray['articleContent']))
      {
          $this->errors['articleContent'] = "Please enter Content";
          $isValid = false;
      }
      if (empty($articleDataArray['articleAuthor']))
      {
          $this->errors['articleAuthor'] = "Please enter an author";
          $isValid = false;
      }
      if (empty($articleDataArray['articleDate']))
      {
          $this->errors['articleDate'] = "Please enter a Date";
          $isValid = false;
      }


        // save
        if ($newsArticle->save())
        {
            header("location: article-save-success.php");
            exit;
        }
        else
        {
            $articleErrorsArray[] = "Save failed";
        }
    }
    else
    {
        $articleErrorsArray = $newsArticle->errors;
        $articleDataArray = $newsArticle->articleData;
    }

}
?>
<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($articleErrorsArray['articleTitle']))
            { ?>
                <div><?php echo $articleErrorsArray['articleTitle'];?>
            <?php } ?>
            <br>

            title: <input type="text" name="articleTitle" value="<?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?>"/><br>
            content: <textarea name="articleContent"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?></textarea><br>
            <?php if (isset($articleErrorsArray['articleContent']))
            { ?>
                <div><?php echo $articleErrorsArray['articleContent'];?>
            <?php } ?>
            <br>

            author: <input type="text" name="articleAuthor" value="<?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?>"/><br>
            <?php if (isset($articleErrorsArray['articleAuthor']))
            { ?>
                <div><?php echo $articleErrorsArray['articleAuthor'];?>
            <?php } ?>
            <br>

            date: <input type="text" name="articleDate" value="<?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?>"/><br>
            <?php if (isset($articleErrorsArray['articleDate']))
            { ?>
                <div><?php echo $articleErrorsArray['articleDate'];?>
            <?php } ?>
            <br>

            <input type="hidden" name="articleID" value="<?php echo (isset($articleDataArray['articleID']) ? $articleDataArray['articleID'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>
        </form>
    </body>
</html>
