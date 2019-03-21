<?php
    session_start();

    require_once('functions.php');
    require_once('categories.php');

    $head = getTemplate('templates/head.php', [
        'title' => 'Добавление товара'
    ]);    
    $catContent = getTemplate('templates/categories.php', [
        'categories' => $categories
    ]);
    $footer = getTemplate('templates/footer.php', [
        'catContent' => $catContent
    ]);
    $options = [
        'head' => $head,
        'catContent' => $catContent,
        'footer' => $footer
    ];
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $header = getTemplate('templates/header.php', [
            'user' => $user
        ]);        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {        
            $required = ['lot-name', 'message', 'lot-rate', 'lot-step', 'lot-date'];
            $errors = [];
            $info = $_POST;

            foreach($required as $key) {
                if(empty($_POST[$key])) {
                    $errors[$key] = 'Это поле нужно заполнить!';
                }
            }
            if ($_POST['category'] == 'Выберите категорию') {
                $errors['category'] = 'Необходимо выбрать категорию!';
            }       
            if (isset($_FILES['picture'])) {
                $tmp_name = $_FILES['picture']['tmp_name'];
                $path = $_FILES['picture']['name'];
                move_uploaded_file($tmp_name, 'img/' . $path);
                $info['path'] = 'img/' . $path;
            }
            else {
                $errors['file'] = 'Вы не загрузили файл!';
            }        

            if (count($errors)) {             
                $addOptions = [
                    'errors' => $errors,
                    'info' => $info
                ];
                $mainContent = getTemplate('templates/addLotContent.php', $addOptions);
                $addOptions = [
                    'mainContent' => $mainContent,
                    'header' => $header
                ];
                $options += $addOptions;
                $content = getTemplate('templates/addLot.php', $options);            
            } else {
                $addOptions = [
                    'lotData' => $info
                ];
                $mainContent = getTemplate('templates/lotContent.php', $addOptions);
                $addOptions = [
                    'mainContent' => $mainContent,
                    'header' => $header
                ];
                $options += $addOptions;
                $content = getTemplate('templates/addLot.php', $options);
            }
            print($content);
        } else {
                $errors = [];
                $addOptions = [
                    'errors' => $errors
                ];
                $mainContent = getTemplate('templates/addLotContent.php', $addOptions);  
                $addOptions = [
                    'header' => $header,
                    'mainContent' => $mainContent
                ];
                $options += $addOptions;
                $content = getTemplate('templates/commonTemplate.php', $options);
                print($content);
        }
    } else {
        $header = getTemplate('templates/header.php', []);
        $mainContent = '<br><br><b>Ошибка:</b> добавление товара доступно только авторизованным пользователям!';
        $addOptions = [
            'header' => $header,
            'mainContent' => $mainContent
        ];
        $options += $addOptions;
        $content = getTemplate('templates/commonTemplate.php', $options);
        print($content);
    }    
?>