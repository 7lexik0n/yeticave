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
        $info = $_POST;
        $required = ['email', 'password', 'name', 'contacts'];
        $errors = [];
        foreach($required as $key) {
            if(empty($info[$key])) {   
                $errors[$key] = 'Это поле нужно заполнить!';
            }
        };
        $emailValidator = filter_var($info['email'], FILTER_VALIDATE_EMAIL);
        if (!$emailValidator) {
            $errors['email'] = 'Введите валидный email!';
        }
        if ($_FILES['avatar']['error'] == 4) {
            $errors['avatar'] = 'Вы не загрузили файл!';
        } else {
            $tmp_name = $_FILES['avatar']['tmp_name'];
            $path = $_FILES['avatar']['name'];
            
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($finfo, $tmp_name);
            if (($file_type == 'image/gif') OR (($file_type == 'image/png')) OR ($file_type == 'image/jpeg')) {
                move_uploaded_file($tmp_name, 'img/' . $path);
                $info['path'] = 'img/' . $path;
            }
            else {
                $errors['avatar'] = 'Загрузите аватар в формате GIF, PNG или JPEG!';
            }
        };
        if (count($errors)) {
            $addOptions = [
                'errors' => $errors,
                'info' => $info
            ];
            $options += $addOptions;
            $content = getTemplate('templates/signUp.php', $options);
            print($content);
        } else {
            $con = mysqli_connect("localhost", "root", "", "yeticave");
            if (!$con) {
                header("Location: /index.php");
                exit();
            } else {
                $safe_email = mysqli_real_escape_string($con, $info['email']);                
                $sql = 'SELECT email from users where email = "' . $info['email'] . '"';
                $result = mysqli_query($con, $sql);
                if (!$result) {
                    header("Location: /index.php");
                    exit();  
                } else {
                    $email = mysqli_fetch_assoc($result);
                    if (count($email)) {
                        $errors['email'] = 'Пользователь с таким email уже существует!';
                        $addOptions = [
                            'errors' => $errors,
                            'info' => $info
                        ];
                        $options += $addOptions;
                        $content = getTemplate('templates/signUp.php', $options);
                        print($content);
                    } else {
                        $safe_name = mysqli_real_escape_string($con, $info['name']);
                        $safe_password = mysqli_real_escape_string($con, $info['password']);
                        $hash_password = password_hash($safe_password, PASSWORD_DEFAULT);
                        $safe_avatar = mysqli_real_escape_string($con, $info['path']);
                        $safe_contacts = mysqli_real_escape_string($con, $info['contacts']);
                        $date = date("Y-m-d H:i:s");
                        $sql = 'INSERT INTO users SET registry = "' . $date . '", email = "' . $safe_email . '", name = "' . $safe_name . '", password = "' . $hash_password . '", avatar = "' . $safe_avatar . '", contacts = "' . $safe_contacts . '", lotsID = "", ratesID = ""';
                        $result = mysqli_query($con, $sql);
                        if (!$result) {
                            print(mysqli_error($con));
                            exit();  
                        } else {  
                            header("Location: /login.php?registration=success");
                            exit();
                        }
                    }
                }
            }
		    exit();        
        } 
    }
    $content = getTemplate('templates/signUp.php', $options);
    print($content);
?>