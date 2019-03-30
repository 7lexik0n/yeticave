<?php
    session_start();

    require_once('functions.php');
    require_once('categories.php');
    require_once('userdata.php');     

    $head = getTemplate('templates/head.php', [
        'title' => 'YetiCave Вход'
    ]);
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
        'head' => $head,
        'header' => $header,
        'catContent' => $catContent,
        'footer' => $footer
    ];

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['registration'])) {
            if ($_GET['registration'] == 'success') {
                $regMeassage = 'Теперь вы можете войти, введя свои данные в форму.';
                $options['regMess'] = $regMeassage;
            }
        }
    }
    
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
            $addOptions = [
                'errors' => $errors,
                'info' => $info
            ];
            $options += $addOptions;
            $content = getTemplate('templates/login.php', $options);
        } else {
            $con = mysqli_connect('localhost', 'root', '', 'yeticave');
            if (!$con) {
                header("Location: /index.php");
                exit();
            } else {                
                $sql = 'SELECT * from users where email = "' . $form['email'] . '"';
                $result = mysqli_query($con, $sql);
                if (!$result) {
                    header("Location: /index.php");
                    exit();  
                } else {
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    if (count($rows)) {
                        $userData = $rows[0];
                        if (password_verify($form['password'], $userData['password'])) {
                            $user = [
                                'email' => $userData['email'],
                                'name' => $userData['name'],
                                'avatar' => $userData['avatar']
                            ];
                            $_SESSION['user'] = $user;
                            header("Location: /index.php");
                            exit();
                        } else {
                            $errors['password'] = 'Пароль не верен!';
                            $addOptions = [
                                'errors' => $errors
                            ];
                            $options += $addOptions;
                            $content = getTemplate('templates/login.php', $options);
                        }
                    } else {
                        $errors['email'] = 'Пользователь с таким email не найден!';
                        $addOptions = [
                            'errors' => $errors
                        ];
                        $options += $addOptions;
                        $content = getTemplate('templates/login.php', $options);
                    }
                }
            }
        }
        print($content);
    } else {
        $mainContent = getTemplate('templates/login.php', $options);
        print($mainContent);
    }
?>