<?php 
$pagepart = $this->pager;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?= $pagepart->showProperty("keywords")?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $pagepart->showHead();?> 
    <title><?= $pagepart->showProperty("title"); ?></title>
</head>
<body>
    <h1><?=$pagepart->showProperty("headtext"); ?></h1>
    
