<html>
    <head>
        <meta name="keyword" value="<?php echo (isset($cmsDataArray['keywords']) ? $cmsDataArray['keywords'] : ''); ?>"/>
        <title><?php echo (isset($cmsDataArray['page_title']) ? $cmsDataArray['page_title'] : ''); ?></title>
    </head>
    <body>
      <?php require_once('../public_html/article-list.php'); ?>
        <?php if (file_exists(dirname(__FILE__) . "/../public_html/images/cms_data_" . $cmsDataArray['cms_data_id'] . ".jpg"))
        { ?>
            <div id="banner">
                <img src="images/cms_data_<?php echo $cmsDataArray['cms_data_id'] . ".jpg"; ?>" width="600"/>
            </div>
        <?php }?>
        <h1><?php echo (isset($cmsDataArray['header']) ? $cmsDataArray['header'] : ''); ?></h1>
        <div>
            <?php echo (isset($cmsDataArray['content']) ? $cmsDataArray['content'] : ''); ?>
        </div>
        <br>
    </body>
</html>
