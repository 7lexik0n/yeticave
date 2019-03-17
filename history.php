<?php 
    $cookieName = 'visitedLots';
    if (isset($_COOKIE[$cookieName])) {
        $lotsID = json_decode($_COOKIE[$cookieName]);
        require_once 'functions.php';
        require_once 'lots.php';
        $content = getTemplate('templates/historyContent.php', [
            'lots' => $stuff,
            'lotsID' => $lotsID
        ]);
        print($content);
    }
    else {
        print('Нет просмотренных лотов!');
    }
?>