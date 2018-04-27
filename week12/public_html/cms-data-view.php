<?php
require_once('../inc/cmsData.class.php');

$cmsData = new cmsData();

$cmsDataArray = array();

if (isset($_REQUEST['page']))
{

    $cmsData->load($_REQUEST['page']);
//var_dump($_REQUEST['url_key']);die;
    $cmsDataArray = $cmsData->data;

}
//var_dump($cmsDataArray);die;
require_once('../tpl/cms-data-view.tpl.php');
?>
