<?php
    session_start();

    require_once 'functions.php';
    require_once 'lots.php'; 

    $categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

    $catContent = getTemplate('templates/categories.php', [
        'categories' => $categories
    ]);

    $lots = getTemplate('templates/stuff.php', [
        'stuff' => $stuff
    ]);

    $main_content = getTemplate('templates/index.php', [
        'lots' => $lots
    ]);

      if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $layout_content = getTemplate('templates/layout.php', [
            'title' => 'YetiCave Главная',
            'catContent' => $catContent,
            'content' => $main_content,
            'user' => $user
        ]);
      } else {
          $layout_content = getTemplate('templates/layout.php', [
            'title' => 'YetiCave Главная',
            'catContent' => $catContent,
            'content' => $main_content
        ]);
      }

    

    print($layout_content);
?>