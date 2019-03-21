<?php
    $head = $templateData['head'];
    $header = $templateData['header'];
    $catContent = $templateData['catContent'];
    $footer = $templateData['footer'];
    $errors = $templateData['errors'] ?? [];
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
  <form class="form container" action="../login.php" method="post" <?php if(count($errors)) : ?>class="form--invalid"<?php endif; ?> >
    <h2>Вход</h2>
    <div class="form__item <?php if (array_key_exists('email', $errors)): ?>form__item--invalid<?php endif;?>"> <!-- form__item--invalid -->
      <label for="email">E-mail</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail">
      <span class="form__error"><?php if (array_key_exists('email', $errors)) {print($errors['email']);} ?></span>
    </div>
    <div class="form__item form__item--last <?php if (array_key_exists('password', $errors)): ?>form__item--invalid<?php endif;?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль">
      <span class="form__error"><?php if (array_key_exists('password', $errors)) {print($errors['password']);} ?></span>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>

<footer class="main-footer">
    <?=$footer?>
</footer>

</body>
</html>
