<?php
    session_start();

    require_once('functions.php');
    require_once('userdata.php');    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form = $_POST;
        $required = ['email', 'password'];
        $errors = [];
        foreach($required as $key) {
            if(empty($form[$key])) {   
                $errors[$key] = 'Это поле нужно заполнить!';
            }
        };
        $info = $form;
        if (count($errors)) {
            $content = getTemplate('templates/login.php', [
                'errors' => $errors,
                'info' => $info
            ]);
        } elseif ($user = searchUserByEmail($form['email'], $users)) {
            if (password_verify($form['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                header("Location: /index.php");
		        exit();        
            }
            else {
                $errors['password'] = 'Пароль не верен!';
                $content = getTemplate('templates/login.php', [
                    'errors' => $errors
                ]);
            }
        } else {
            $errors['email'] = 'Пользователь не найден!';
            $content = getTemplate('templates/login.php', [
                'errors' => $errors
            ]);            
        }
        print($content);
    } else {
        print(getTemplate('templates/login.php', []));
    }
?>