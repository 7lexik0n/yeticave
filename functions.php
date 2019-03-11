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
        return($sum);
    };
?>