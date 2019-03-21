<?php 
    session_start();

    require_once 'functions.php';
    require_once 'lots.php';
    require_once('categories.php');

    $head = getTemplate('templates/head.php', [
        'title' => 'История просмотров'
    ]);
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $header = getTemplate('templates/header.php', [
            'user' => $user
        ]);
    } else {
        $header = getTemplate('templates/header.php', []);
    }
    $catContent = getTemplate('templates/categories.php', [
        'categories' => $categories
    ]);
    $footer = getTemplate('templates/footer.php', [
        'catContent' => $catContent
    ]);
    $options = [
        'head' => $head,
        'header' => $header,
        'catContent' => $catContent,
        'footer' => $footer
    ];

    $cookieName = 'visitedLots';
    if (isset($_COOKIE[$cookieName])) {
        $lotsID = json_decode($_COOKIE[$cookieName]);
        $addOptions = [
            'lots' => $stuff,
            'lotsID' => $lotsID
        ];
        $options += $addOptions;
        $content = getTemplate('templates/historyContent.php', $options);
        print($content);
    }
    else {
        $mainContent = 'Нет просмотренных лотов!';
        $addOptions = [
            'mainContent' => $mainContent
        ];
        $options += $addOptions;
        $content = getTemplate('templates/commonTemplate.php', $options);
        print($content);
    }
?>