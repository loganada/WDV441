<?php
require_once('../inc/cmsData.class.php');

$cmsData = new cmsData();

$cmsDataList = $cmsData->getList(
    (isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
    (isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
    (isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
    (isset($_GET['filterText']) ? $_GET['filterText'] : null)
);

//var_dump($cmsDataList);

require_once("../tpl/cms-data-list.tpl.php");
?>