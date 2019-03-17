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
        
        if (isset($_FILES['picture'])) {
            $tmp_name = $_FILES['picture']['tmp_name'];
            $path = $_FILES['picture']['name'];
            move_uploaded_file($tmp_name, 'img/' . $path);
            $info['path'] = $path;
        }
        else {
            $errors['file'] = 'Вы не загрузили файл!';
        }
        
        if (count($errors)) {
            $content = getTemplate('templates/addLot.php', [
                'errors' => $errors,
                'info' => $info
            ]);            
        } else {
            require_once('functions.php');
            $content = getTemplate('templates/newLot.php', [
                'lot' => $info
            ]);
        }
        print($content);
    } else print('НЕ POST');
?>