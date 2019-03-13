<?php
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

    $layout_content = getTemplate('templates/layout.php', [
        'title' => 'YetiCave Главная',
        'catContent' => $catContent,
        'content' => $main_content
    ]);

    print($layout_content);
?>