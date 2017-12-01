<?php include ROOT . '/views/layouts/header.php'; ?>
    
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Warning!</strong> <? echo $data['msg']; ?>
        <? echo '<br><a href="/">На главную</a>', PHP_EOL; ?>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>