<a href="http://local.test.com/site/logout" style="float: right" class="btn btn-default btn-lg active" role="button">Logout</a>

<?php foreach ($positions as $value): ?>
    <div data-key="<?= $value['id'] ?>" class="draggable"
         style="background-color: <?= $value['color'] ?>;position: absolute;top: <?= $value['top'] . "px"; ?>;left: <?= $value['left'] . "px" ?>"></div>
<?php endforeach; ?>
<input type="hidden" id="baseurl" value="/test3/">

