<?php
    $lotData = $templateData['lotData'];
?>   

<section class="lot-item container">
    <h2><?=safeData($lotData['lot-name'] ?? $lotData['Название']);?></h2>
    <div class="lot-item__content">
      <div class="lot-item__left">
        <div class="lot-item__image">
          <img src="<?=safeData($lotData['path'] ?? $lotData['URL картинки']);?>" width="730" height="548" alt="<?=safeData($lotData['lot-name'] ?? $lotData['Название']);?>">
        </div>
        <p class="lot-item__category">Категория: <span><?=safeData($lotData['category'] ?? $lotData['Категория']);?></span></p>
        <p class="lot-item__description"><?=safeData($lotData['message'] ?? $lotData['Название']);?></p>
      </div>
      <div class="lot-item__right">
       <?php if (isset($_SESSION['user']['name'])): ?>
        <div class="lot-item__state">
          <div class="lot-item__timer timer">
            <?=timeLeft('24:00');?>
          </div>
          <div class="lot-item__cost-state">
            <div class="lot-item__rate">
              <span class="lot-item__amount">Текущая цена</span>
              <span class="lot-item__cost"><?=addRouble(safeData($lotData['lot-rate'] ?? $lotData['Цена']));?></span>
            </div>
            <div class="lot-item__min-cost">
              Мин. ставка <span><?=addRouble(safeData($lotData['lot-rate'] ?? $lotData['Цена']) + safeData($lotData['lot-step'] ?? 50));?></span>
            </div>
          </div>
          <form class="lot-item__form" action="" method="post">
            <p class="lot-item__form-item">
              <label for="cost">Ваша ставка</label>
              <input id="cost" type="number" name="cost" step="<?=safeData($lotData['lot-step'] ?? 1)?>" min="<?=safeData($lotData['lot-rate'] ?? $lotData['Цена'])+safeData($lotData['lot-step'] ?? 50)?>" placeholder="<?=safeData($lotData['lot-rate'] ?? $lotData['Цена'])+safeData($lotData['lot-step'] ?? 50)?>">
            </p>
            <button type="submit" class="button">Сделать ставку</button>
          </form>
        </div>
        <?php endif; ?>
        <div class="history">
          <h3>История ставок (<span>10</span>)</h3>
          <table class="history__list">
            <tr class="history__item">
              <td class="history__name">Иван</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">5 минут назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Константин</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">20 минут назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Евгений</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">Час назад</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Игорь</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 08:21</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Енакентий</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 13:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Семён</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 12:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Илья</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 10:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Енакентий</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 13:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Семён</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 12:20</td>
            </tr>
            <tr class="history__item">
              <td class="history__name">Илья</td>
              <td class="history__price">10 999 р</td>
              <td class="history__time">19.03.17 в 10:20</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>