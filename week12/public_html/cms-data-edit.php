<?php
session_start();

// usage: http://localhost:8080/WDV441_2018/week05/public_html/cms-edit.php?cmsID=1
// usage new: http://localhost:8080/WDV441_2018/week05/public_html/cms-edit.php
require_once('../inc/cmsData.class.php');

$cmsData = new cmsData();

$cmsDataArray = array();
$cmsErrorsArray = array();

// load the cms if we have it
if (isset($_REQUEST['page']) )
{
    $cmsData->load($_REQUEST['page']);
    $cmsDataArray = $cmsData->data;
}

if (isset($_POST['Cancel']))
{
    header("location: cms-data-list.php");
    exit;
}

// apply the data if we have new data
if (isset($_POST['Save']))
{
    $cmsDataArray = $_POST;
    // sanitize
    $cmsDataArray = $cmsData->santinize($cmsDataArray);
    $cmsData->set($cmsDataArray);

    // validate
    if ($cmsData->validate())
    {
        // save
        if ($cmsData->save())
        {
            $cmsData->saveImage($_FILES['cms_data_image']);

            header("location: cms-data-save-success.php");
            exit;
        }
        else
        {
            $cmsErrorsArray[] = "Save failed";
        }
    }
    else
    {
        $cmsErrorsArray = $cmsData->errors;
        $cmsDataArray = $cmsData->data;
    }
}

require_once('../tpl/cms-data-edit.tpl.php');
?>
