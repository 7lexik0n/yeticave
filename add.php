<?php 
    require_once('functions.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $required = ['lot-name', 'message', 'lot-rate', 'lot-step', 'lot-date'];
        $errors = [];
        
        foreach($required as $key) {
            if(empty($_POST[$key])) {
                $errors[$key] = 'Это поле нужно заполнить!';
            }
        }
        if ($_POST['category'] == 'Выберите категорию') {
            $errors['category'] = 'Необходимо выбрать категорию!';
        }
        
        $info = $_POST;
        
        if (count($errors)) {
            $content = getTemplate('templates/addLot.php', [
                'errors' => $errors,
                'info' => $info
            ]);            
        } else {
            
        }
        print($content);
    } else print('НЕ POST');
?>