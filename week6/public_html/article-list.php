<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleList = $newsArticle->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($articleList);

?>
<html>
    <body>
        <div>News Articles - <a href="/WDV441_2018/week06/public_html/article-edit.php">Add New Article</a></div>        
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Search: 
                <select name="filterColumn">
                    <option value="articleTitle">Article Title</option>
                    <option value="articleAuthor">Article Author</option>
                    <option value="articleDate">Article Date</option>
                    <option value="articleContent">Article Content</option>                    
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="filter" value="Search"/>
            </form>
        </div>
        <div>
            <div style="clear:both;">
                <div style="float:left; border:1px solid black;">Article Title</div>
                <div style="float:left; border:1px solid black;">Article Author</div>
                <div style="float:left; border:1px solid black;">Article Date</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
            </div>
            <?php foreach ($articleList as $articleData) 
            { ?>
                <div style="clear:both;">
                    <div style="float:left; border:1px solid black;"><?php echo $articleData['articleTitle']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $articleData['articleAuthor']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $articleData['articleDate']; ?></div>
                    <div style="float:left; border:1px solid black;"><a href="/WDV441_2018/week06/public_html/article-edit.php?articleID=<?php echo $articleData['articleID']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="/WDV441_2018/week06/public_html/article-view.php?articleID=<?php echo $articleData['articleID']; ?>">View</a></div>
                </div>
            <?php } ?>                
            <br><br>
            <table border="1">
                <tr>
                    <th>Article Title&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=DESC">D</a></th>
                    <th>Article Author&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a></th>
                    <th>Article Date&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC">D</a></th> 
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($articleList as $articleData) 
                { ?>
                    <tr>
                        <td><?php echo $articleData['articleTitle']; ?></td>                
                        <td><?php echo $articleData['articleAuthor']; ?></td>                
                        <td><?php echo $articleData['articleDate']; ?></td>
                        <td><a href="/WDV441_2018/week06/public_html/article-edit.php?articleID=<?php echo $articleData['articleID']; ?>">Edit</a></td>
                        <td><a href="/WDV441_2018/week06/public_html/article-view.php?articleID=<?php echo $articleData['articleID']; ?>">View</a></td>
                            
                    </tr>
                <?php } ?>                
            </table>
        </div>
    </body>
</html>