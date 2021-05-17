<div>
    <h1>Client layout</h1>
    <?=logout()?>
</div>
<div style="clear: right"></div>
<?php \app\core\Controller::view('blocks/header', ['title' => 'Header']); ?>
<?= $viewContent ?>
<?php \app\core\Controller::view('blocks/footer', ['title' => "Footer"]); ?>
