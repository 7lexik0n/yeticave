<?php
    $head = $templateData['head'];
    $header = $templateData['header'];
    $catContent = $templateData['catContent'];
    $footer = $templateData['footer'];
    $mainContent = $templateData['mainContent'];
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