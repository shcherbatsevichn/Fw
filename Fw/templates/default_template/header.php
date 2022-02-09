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
    <link type="image/x-icon" href="Fw/templates/default_template/img/Group 1.svg" rel="shortcut icon">
    <?= $pagepart->showHead();?> 
    <title><?= $pagepart->showProperty("title"); ?></title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class ="logo">
                <img src="Fw/templates/default_template/img/Group 1.svg" alt="">
            </div>
            <div class="header-title">
                <h1><?=$pagepart->showProperty("headtext"); ?></h1>
            </div>
        </div>
    </header>
    
    
