<?php 
require_once $_SERVER['DOCUMENT_ROOT']."/Fw/init.php";
if(!defined(CORE_INIT)) {
    die();
}
$pagepart = Fw\Core\Page::getInstance();
?>

<p><?= $pagepart->showProperty("footertrtext"); ?></p>

</body>
</html>