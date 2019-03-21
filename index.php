<?php
    session_start();

    require_once 'categories.php';
    require_once 'lots.php';
    require_once 'functions.php';    

    $head = getTemplate('templates/head.php', [
        'title' => 'YetiCave Главная'
    ]);    

    $lots = getTemplate('templates/stuff.php', [
        'stuff' => $stuff
    ]);    

    $main_content = getTemplate('templates/index.php', [
        'lots' => $lots,
        'categories' => $categories
    ]);

    $catContent = getTemplate('templates/categories.php', [
        'categories' => $categories
    ]);

    $footer = getTemplate('templates/footer.php', [
        'catContent' => $catContent
    ]);

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $header = getTemplate('templates/header.php', [
            'user' => $user
        ]);
        $layout_content = getTemplate('templates/layout.php', [
            'head' => $head,
            'header' => $header,
            'content' => $main_content,
            'footer' => $footer,
            'user' => $user
        ]);
    } else {
        $header = getTemplate('templates/header.php', []);
        $layout_content = getTemplate('templates/layout.php', [
            'head' => $head,
            'header' => $header,
            'content' => $main_content,
            'footer' => $footer
        ]);
    }

    print($layout_content);
?>