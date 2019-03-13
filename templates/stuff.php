<?php
    $stuff = $templateData['stuff'];
?>   

<ul class="lots__list">
    <?php foreach($stuff as $key => $val) : ?>
       <?php $id = $key; ?>
        <li class="lots__item lot">
            <div class="lot__image">
                <img src="<?= safeData($val['URL картинки']); ?>" width="350" height="260" alt="<?= safeData($val['Название']); ?>">
            </div>
            <div class="lot__info">
                <span class="lot__category"><?= safeData($val['Категория']); ?></span>
                <h3 class="lot__title"><a class="text-link" href="../lot.php?id=<?=$id;?>"><?= safeData($val['Название']); ?></a></h3>
                <div class="lot__state">
                    <div class="lot__rate">
                        <span class="lot__amount">Стартовая цена</span>
                        <span class="lot__cost"><?= addRouble(safeData($val['Цена'])); ?></span>
                    </div>
                    <div class="lot__timer timer"><?= timeLeft(15, 03, 2019, 00, 00, 00); ?></div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

