<?php
    $stuff = $templateData['stuff'];
?>   

<ul class="lots__list">
    <?php foreach($stuff as $key => $val) : ?>
        <li class="lots__item lot">
            <div class="lot__image">
                <img src="<?=$val['URL картинки']?>" width="350" height="260" alt="<?=$val['Название']?>">
            </div>
            <div class="lot__info">
                <span class="lot__category"><?=$val['Категория']?></span>
                <h3 class="lot__title"><a class="text-link" href="lot.html"><?=$val['Название']?></a></h3>
                <div class="lot__state">
                    <div class="lot__rate">
                        <span class="lot__amount">Стартовая цена</span>
                        <span class="lot__cost"><?=addRouble($val['Цена'])?></span>
                    </div>
                    <div class="lot__timer timer">

                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
</ul>

