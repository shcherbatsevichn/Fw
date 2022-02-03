<?php

?>
<div class = "block-clock">
    <div class ="h-clock">
        <h2>My component - Clocker</h2>
    </div>
    <div class ="p-clock">
        <p><?= $this->__component["result"]["deltaday"];?> days project under development.<br></p>
        <p>Start of development <?= $this->__component["params"]["date"]; ?></p>
    </div>
</div>
