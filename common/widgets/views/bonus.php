<?php if ($bonus) { ?>
    <div class="jumbotron">
        <?php if ($bonus['action']=='active') { ?>
            <div style="margin-bottom: 20px;">Нажмите кнопку для получения приза </div>
            <button class="btn btn-success">Получить бонус</button>
        <?php } else { ?>
            <div>Вами получен бонус:</div>
        <?php } ?>
    </div>
<?php } ?>

