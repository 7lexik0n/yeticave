<?php
    session_start();

    require_once('functions.php');
    require_once('categories.php');
    require_once('userdata.php');   

    $head = getTemplate('templates/head.php', [
        'title' => 'YetiCave Регистрация'
    ]);
    $header = getTemplate('templates/header.php', []);
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $form = $_POST;
        $required = ['email', 'password', 'name', 'contacts'];
        $errors = [];
        foreach($required as $key) {
            if(empty($form[$key])) {   
                $errors[$key] = 'Это поле нужно заполнить!';
            }
        };
        if (empty($form['avatar'])) {
            $errors['avatar'] = 'Добавьте аватар!';
        }
        $info = $form;
        if (count($errors)) {
            $addOptions = [
                'errors' => $errors,
                'info' => $info
            ];
            $options += $addOptions;
            $content = getTemplate('templates/signUp.php', $options);
            print($content);
        } else {
            header("Location: /index.php");
		    exit();        
        } 
    }
    $content = getTemplate('templates/signUp.php', $options);
    print($content);
?>