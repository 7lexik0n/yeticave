<?php
    $cookieName = 'visitedLots';
    unset($_COOKIE['$cookieName']);
    setcookie($cookieName, null, -1, '/');
    if (!isset($_COOKIE[$cookieName])) {
        print('Куки очищены');
    } else {
        print('Куки живы!<br>');
        print_r($_COOKIE[$cookieName]);
    }
?>