<?php foreach ($positions as $value): ?>
    <div data-key="<?= $value['key'] ?>" class="draggable"
         style="background-color: #ffe31d;position: absolute;top: <?= $value['top'] . "px"; ?>;left: <?= $value['left'] . "px" ?>"></div>
<?php endforeach; ?>
<input type="hidden" id="baseurl" value="/test3/">

