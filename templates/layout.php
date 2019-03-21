<?php
    $head = $templateData['head'];
    $header = $templateData['header'];
    $content = $templateData['content'];  
    $footer = $templateData['footer'];    
    $user = $templateData['user'] ?? '';    
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <?=$head?>
    </head>
<body>

<header class="main-header">
    <?=$header?>
</header>

<main class="container">
    <?=$content?>
</main>

<footer class="main-footer">    
    <?=$footer?>
</footer>

</body>
</html>
