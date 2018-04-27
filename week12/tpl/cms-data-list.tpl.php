<html>
    <body>
        <div>CMS Data - <a href="/WDV441/week12/public_html/cms-data-edit.php">Add New CMS Data</a></div>
        <div>
            <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="GET">
                Search:
                <select name="filterColumn">
                    <option value="page_title">Page Title</option>
                    <option value="header">Header</option>
                    <option value="url_key">URL Key</option>
                </select>
                &nbsp;<input type="text" name="filterText"/>
                &nbsp;<input type="submit" name="filter" value="Search"/>
            </form>
        </div>
        <div>
            <div style="clear:both;">
                <div style="float:left; border:1px solid black;">Page Title</div>
                <div style="float:left; border:1px solid black;">Header</div>
                <div style="float:left; border:1px solid black;">URL Key</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
                <div style="float:left; border:1px solid black;">&nbsp;</div>
            </div>
            <?php foreach ($cmsDataList as $cmsPageData)
            { ?>
                <div style="clear:both;">
                    <div style="float:left; border:1px solid black;"><?php echo $cmsPageData['page_title']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $cmsPageData['header']; ?></div>
                    <div style="float:left; border:1px solid black;"><?php echo $cmsPageData['url_key']; ?></div>
                    <div style="float:left; border:1px solid black;"><a href="/WDV441/week12/public_html/cms-data-edit.php?cms_data_id=<?php echo $cmsPageData['cms_data_id']; ?>">Edit</a></div>
                    <div style="float:left; border:1px solid black;"><a href="/WDV441/week12/public_html/cms-data-view.php?cms_data_id=<?php echo $cmsPageData['cms_data_id']; ?>">View</a></div>
                </div>
            <?php } ?>
            <br><br>
            <table border="1">
                <tr>
                    <th>Page Title&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=page_title&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=page_title&sortDirection=DESC">D</a></th>
                    <th>Header&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=header&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=header&sortDirection=DESC">D</a></th>
                    <th>URL Key&nbsp;-&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=url_key&sortDirection=ASC">A</a>&nbsp;<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=url_key&sortDirection=DESC">D</a></th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($cmsDataList as $cmsPageData)
                { ?>
                    <tr>
                        <td><?php echo $cmsPageData['page_title']; ?></td>
                        <td><?php echo $cmsPageData['header']; ?></td>
                        <td><?php echo $cmsPageData['url_key']; ?></td>
                        <td><a href="/WDV441/week12/public_html/cms-data-edit.php?page=<?php echo $cmsPageData['url_key']; ?>">Edit</a></td>
                        <td><a href="/WDV441/week12/public_html/cms-data-view.php?page=<?php echo $cmsPageData['url_key']; ?>">View</a></td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
