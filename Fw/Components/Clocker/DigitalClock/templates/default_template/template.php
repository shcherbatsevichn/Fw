<?php
use Fw\Core\Page;
$pagepart = Page::getInstance();
?>
<div class = "block-clock">
    <div class ="hclocker">
        <h2>My component - Clocker</h2>
    </div>
    <div class ="pclocker">
        <p><?= $pagepart->showProperty("result-cloker")?> days project under development.</p>
    </div>
</div>
