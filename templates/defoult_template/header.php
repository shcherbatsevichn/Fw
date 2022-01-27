<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Fw/init.php";
if(!defined(CORE_INIT)) {
    die();
}
$pagepart = Fw\Core\Page::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?= $pagepart->showProperty("keywords")?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pagepart->showProperty("title"); ?></title>
</head>
<body>
    <h1><?= $pagepart->showProperty("headtext"); ?></h1>
    
