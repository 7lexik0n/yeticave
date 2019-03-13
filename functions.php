<?php
    function getTemplate($templatePath, $templateData) {
        if (!file_exists($templatePath)) return('');
        else {
            ob_start();
            require_once $templatePath;
            $html = ob_get_clean();
            return $html;
        }
    }

    function addRouble($sum) {
        $sum = number_format(ceil($sum), 0, '', ' ') . ' ₽';
        return $sum;
    };

    function safeData($str) {
        $str = htmlspecialchars($str);
        return $str;
    }

    function timeLeft($day, $month, $year, $hour, $minutes, $seconds) {
        date_default_timezone_set('Europe/Moscow');
        $timeStr = $year . "-" . $month . "-" . $day . "T" . $hour . ":" . $minutes . ":" . $seconds;
        $finishTime = strtotime($timeStr);
        $curTime = strtotime("now");
        $timeLeft = $finishTime - $curTime;
        $hLeft = floor($timeLeft/3600);
        $mLeft = floor(($timeLeft - $hLeft*3600)/60);
        if ($hLeft < 10) $hLeft = '0' . $hLeft;
        if ($mLeft < 10) $mLeft = '0' . $mLeft;
        $result = $hLeft . ":" . $mLeft;
        return $result;
    }
?>