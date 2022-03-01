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
    <link type="image/x-icon" href="Fw/templates/default_template/img/icon.svg" rel="shortcut icon">
    <?= $pagepart->showHead();?> 
    <title><?= $pagepart->showProperty("title"); ?></title>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="icon-svg" width="40" height="40" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="64" height="64" rx="15" fill="black"/>
            <path d="M14.64 23.92V32.17H25.5V34.09H14.64V43H12.42V22H26.82V23.92H14.64ZM54.2609 27.22L48.2909 43H46.2809L41.3009 30.07L36.3209 43H34.3109L28.3709 27.22H30.4109L35.3609 40.63L40.4309 27.22H42.2609L47.3009 40.63L52.3109 27.22H54.2609Z" fill="white"/>
        </svg>
            <span class="fs-4"><?= $pagepart->showProperty("headtext")?></span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        </ul>
        </header>
    </div>
    
    
