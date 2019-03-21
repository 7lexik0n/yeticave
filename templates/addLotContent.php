<?php
    $errors = $templateData['errors'];
    $info = [
        'lot-name' => $templateData['info']['lot-name'] ?? '',
        'category' => $templateData['info']['category'] ?? 'Выберите категорию',
        'message' => $templateData['info']['message'] ?? '',
        'lot-rate' => $templateData['info']['lot-rate'] ?? '',
        'lot-step' => $templateData['info']['lot-step'] ?? '',
        'lot-date' => $templateData['info']['lot-date'] ?? ''
    ];    
?>

<form class="form form--add-lot container form--invalid <?php if(count($errors)) : ?> form--invalid<?php endif; ?>" action="../add.php" method="POST" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item <?php if(array_key_exists('lot-name', $errors)) : ?> form__item--invalid<?php endif; ?>">
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?=safeData($info['lot-name']);?>">
        <span class="form__error"><?php if (array_key_exists('lot-name', $errors)) print($errors['lot-name']) ?></span>
      </div>
      <div class="form__item <?php if (array_key_exists('category', $errors)) : ?> form__item--invalid<?php endif;?>">
        <label for="category">Категория</label>
        <select id="category" name="category">
          <option disabled>Выберите категорию</option>
          <option>Доски и лыжи</option>
          <option>Крепления</option>
          <option>Ботинки</option>
          <option>Одежда</option>
          <option>Инструменты</option>
          <option>Разное</option>
        </select>
        <span class="form__error"><?php if (array_key_exists('category', $errors)) print($errors['category']) ?></span>
      </div>
    </div>
    <div class="form__item form__item--wide <?php if (array_key_exists('message', $errors)) : ?> form__item--invalid<?php endif;?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота"><?=safeData($info['message']);?></textarea>
      <span class="form__error"><?php if (array_key_exists('message', $errors)) print($errors['message']) ?></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="picture" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small <?php if (array_key_exists('lot-rate', $errors)) : ?> form__item--invalid<?php endif;?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?=safeData($info['lot-rate']);?>">
        <span class="form__error"><?php if (array_key_exists('lot-rate', $errors)) print($errors['lot-rate']) ?></span>
      </div>
      <div class="form__item form__item--small <?php if (array_key_exists('lot-step', $errors)) : ?> form__item--invalid<?php endif;?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?=safeData($info['lot-step']);?>">
        <span class="form__error"><?php if (array_key_exists('lot-step', $errors)) print($errors['lot-step']) ?></span>
      </div>
      <div class="form__item <?php if (array_key_exists('lot-date', $errors)) : ?> form__item--invalid<?php endif;?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="datetime-local" name="lot-date" value="<?=safeData($info['lot-date']);?>">
        <span class="form__error"><?php if (array_key_exists('lot-date', $errors)) print($errors['lot-date']) ?></span>
      </div>
    </div>
    <span class="form__error form__error--bottom"><?php if(count($errors)) print('Пожалуйста, исправьте ошибки в форме!'); ?> </span>
    <button type="submit" class="button">Добавить лот</button>
  </form>