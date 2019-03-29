<?php
    $head = $templateData['head'];
    $header = $templateData['header'];
    $catContent = $templateData['catContent'];
    $footer = $templateData['footer'];
    $errors = $templateData['errors'] ?? [];
    $info = [
        'email' => $templateData['info']['email'] ?? '',
        'password' => $templateData['info']['password'] ?? '',
        'name' => $templateData['info']['name'] ?? '',
        'contacts' => $templateData['info']['contacts'] ?? '',
        'path' => $templateData['info']['path'] ?? ''
    ];
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
  <form class="form container" action="../signUp.php" method="post" <?php if(count($errors)) : ?>class="form--invalid"<?php endif; ?> enctype="multipart/form-data">
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?php if (array_key_exists('email', $errors)): ?>form__item--invalid<?php endif;?>">
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?=safeData($info['email']);?>">
      <span class="form__error"><?php if (array_key_exists('email', $errors)) {print($errors['email']);} ?></span>
    </div>
    <div class="form__item <?php if (array_key_exists('password', $errors)): ?>form__item--invalid<?php endif;?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль">
      <span class="form__error"><?php if (array_key_exists('password', $errors)) {print($errors['password']);} ?></span>
    </div>
    <div class="form__item <?php if (array_key_exists('name', $errors)): ?>form__item--invalid<?php endif;?>">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="name" placeholder="Введите имя" value="<?=safeData($info['name']);?>">
      <span class="form__error"><?php if (array_key_exists('name', $errors)) {print($errors['name']);} ?></span>
    </div>
    <div class="form__item <?php if (array_key_exists('contacts', $errors)): ?>form__item--invalid<?php endif;?>">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="contacts" placeholder="Напишите как с вами связаться" value="<?=safeData($info['contacts']);?>"></textarea>
      <span class="form__error"><?php if (array_key_exists('contacts', $errors)) {print($errors['contacts']);} ?></span>
    </div>
    <div class="form__item form__item--file form__item--last <?php if (array_key_exists('avatar', $errors)): ?>form__item--invalid<?php endif;?>">
      <label>Аватар</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="../img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" name="avatar" type="file" id="photo2" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <span class="form__error"><?php if (array_key_exists('avatar', $errors)) {print($errors['avatar']);} ?></span>
    </div>
    <span class="form__error form__error--bottom"><?php if(count($errors)) : ?>Пожалуйста, исправьте ошибки в форме!<?php endif; ?></span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="../login.php">Уже есть аккаунт</a>
  </form>
</main>

<footer class="main-footer">
    <?=$footer?>
</footer>

</body>
</html>