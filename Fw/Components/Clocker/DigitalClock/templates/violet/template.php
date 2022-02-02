<?php
use Fw\Core\Page;
$pagepart = Page::getInstance();
?>
<div class = "block-clock-violet">
    <div class ="hclocker-violet">
        <h2>My component - Clocker</h2>
    </div>
    <div class ="pclocker-violet">
        <p><?= $pagepart->showProperty("result-cloker")?> days project under development.</p>
    </div>
</div>
