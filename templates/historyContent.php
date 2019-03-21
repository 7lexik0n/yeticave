<?php
    $head = $templateData['head'];
    $header = $templateData['header'];
    $catContent = $templateData['catContent'];
    $footer = $templateData['footer'];
    $lots = $templateData['lots'];
    $lotsID = $templateData['lotsID'];
    $visitedLots = [];
    foreach ($lotsID as $key => $value) {
        array_push($visitedLots, $lots[$value]);
        $visitedLots[$key]['id'] = $value;
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?=$head?>
</head>
<body>

<header class="main-header">
    <?=$header?>
</header>

<main>
  <nav class="nav">
    <?=$catContent?>
  </nav>
  <div class="container">
    <section class="lots">
      <h2>Просмотренные ранее лоты</h2>
      <ul class="lots__list">
       <?php foreach($visitedLots as $key => $val) : ?>
        <li class="lots__item lot">
          <div class="lot__image">
            <img src="<?=safeData($val['path'] ?? $val['URL картинки']);?>" width="350" height="260" alt="<?=safeData($val['lot-name'] ?? $val['Название']);?>">
          </div>
          <div class="lot__info">
            <span class="lot__category"><?=safeData($val['category'] ?? $val['Категория']);?></span>
            <h3 class="lot__title"><a class="text-link" href="../lot.php?id=<?= safeData($val['id']); ?>"><?=safeData($val['lot-name'] ?? $val['Название']);?></a></h3>
            <div class="lot__state">
              <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?=addRouble(safeData($val['lot-rate'] ?? $val['Цена']));?></span>
              </div>
              <div class="lot__timer timer"><?=timeLeft('24:00');?></div>
            </div>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
    </section>
    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <li class="pagination-item pagination-item-active"><a>1</a></li>
      <li class="pagination-item"><a href="#">2</a></li>
      <li class="pagination-item"><a href="#">3</a></li>
      <li class="pagination-item"><a href="#">4</a></li>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
  </div>
</main>

<footer class="main-footer">
  <?=$footer?>
</footer>

</body>
</html>
