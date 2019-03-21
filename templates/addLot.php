<?php  

    if (!isset($_SESSION['user'])) {
        http_response_code(403);
    }   
    $head = $templateData['head'];
    $header = $templateData['header'];
    $catContent = $templateData['catContent'];
    $footer = $templateData['footer'];
    $mainContent = $templateData['mainContent'];
    $errors = $templateData['errors'] ?? [];
    $info = [
        'lot-name' => $templateData['info']['lot-name'] ?? '',
        'category' => $templateData['info']['category'] ?? 'Выберите категорию',
        'message' => $templateData['info']['message'] ?? '',
        'lot-rate' => $templateData['info']['lot-rate'] ?? '',
        'lot-step' => $templateData['info']['lot-step'] ?? '',
        'lot-date' => $templateData['info']['lot-date'] ?? ''
    ];    
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

<main>
  <nav class="nav">
      <?=$catContent?>        
  </nav>
  <?=$mainContent?>
</main>

<footer class="main-footer">
  <?=$footer?>
</footer>

</body>
</html>