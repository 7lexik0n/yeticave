<?php
    session_start();

    require_once('functions.php');
    require_once 'categories.php';
    require_once('lots.php');

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
        'header' => $header,
        'catContent' => $catContent,
        'footer' => $footer
    ];    

    $lot = null;
    $lot = $_GET['id'];

    if (!isset($_GET['id'])) {
        http_response_code(404);
        $head = getTemplate('templates/head.php', [
            'title' => 'Error: 404'
        ]);        
        $mainContent = 'Ошибка! Запрос не обнаружен!';
        $addOptions = [
            'head' => $head,
            'mainContent' => $mainContent
        ];
        $options += $addOptions;
    }
    if (!array_key_exists($lot, $stuff)) {
        http_response_code(404);
        $head = getTemplate('templates/head.php', [
            'title' => 'Неизвестный лот'
        ]);        
        $mainContent = 'Данного лота не существует!';
        $addOptions = [
            'head' => $head,
            'mainContent' => $mainContent
        ];
        $options += $addOptions;
    } else {
        $lotData = $stuff[$lot]; 
        $cookieName = 'visitedLots';
        $expire = strtotime("24:00");
        $path = "/";
        
        $head = getTemplate('templates/head.php', [
            'title' => $lotData['Название']
        ]);        
        $mainContent = getTemplate('templates/lotContent.php', [
            'lotData' => $lotData
        ]);
        $addOptions = [
            'head' => $head,
            'mainContent' => $mainContent
        ];
        $options += $addOptions;
        
        if (isset($_COOKIE[$cookieName])) {
            $cookieValue = json_decode($_COOKIE[$cookieName]);
            $matches = 0;
            foreach ($cookieValue as $key => $value) {
                if ($value == $lot) $matches++;
            }
            if ($matches == 0) {
                array_push($cookieValue, $lot);
                $cookieValue = json_encode($cookieValue);
                setcookie($cookieName, $cookieValue, $expire, $path);
            }
        }
        else {
            $cookieValue = [];
            array_push($cookieValue, $lot);
            $cookieValue = json_encode($cookieValue);
            setcookie($cookieName, $cookieValue, $expire, $path);
        }
    }

    $content = getTemplate('templates/lot.php', $options);
    print($content);
?>