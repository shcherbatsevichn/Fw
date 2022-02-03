<?php
use Fw\Core\Page;
$pagepart = Page::getInstance();
?>
<div class = "block-clock-violet">
    <div class ="h-clock-violet">
        <h2>My component - Clocker</h2>
    </div>
    <div class ="p-clock-violet">
        <p><?= $this->__component["result"]["deltaday"]; ?> days project under development.<br></p>
        <p>Start of development <?= $this->__component["params"]["date"]; ?></p>
    </div>
</div>
