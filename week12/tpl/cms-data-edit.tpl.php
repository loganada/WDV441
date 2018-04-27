<html>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
            <?php if (isset($cmsErrorsArray['page_title']))
            { ?>
                <div><?php echo $cmsErrorsArray['page_title']; ?>
            <?php } ?>
            page title: <input type="text" name="page_title" value="<?php echo (isset($cmsDataArray['page_title']) ? $cmsDataArray['page_title'] : ''); ?>"/><br>
            <?php if (isset($cmsErrorsArray['content']))
            { ?>
                <div><?php echo $cmsErrorsArray['content']; ?>
            <?php } ?>
            content: <textarea name="content"><?php echo (isset($cmsDataArray['content']) ? $cmsDataArray['content'] : ''); ?></textarea><br>
            <?php if (isset($cmsErrorsArray['keywords']))
            { ?>
                <div><?php echo $cmsErrorsArray['keywords']; ?>
            <?php } ?>
            keywords: <input type="text" name="keywords" value="<?php echo (isset($cmsDataArray['keywords']) ? $cmsDataArray['keywords'] : ''); ?>"/><br>
            <?php if (isset($cmsErrorsArray['url_key']))
            { ?>
                <div><?php echo $cmsErrorsArray['url_key']; ?>
            <?php } ?>
            url key: <input type="text" name="url_key" value="<?php echo (isset($cmsDataArray['url_key']) ? $cmsDataArray['url_key'] : ''); ?>"/><br>
            <?php if (isset($cmsErrorsArray['header']))
            { ?>
                <div><?php echo $cmsErrorsArray['header']; ?>
            <?php } ?>
            header: <input type="text" name="header" value="<?php echo (isset($cmsDataArray['header']) ? $cmsDataArray['header'] : ''); ?>"/><br>
            cms data image: <input type="file" name="cms_data_image"/><br>
            <input type="hidden" name="cms_data_id" value="<?php echo (isset($cmsDataArray['cms_data_id']) ? $cmsDataArray['cms_data_id'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>
        </form>
    </body>
</html>
