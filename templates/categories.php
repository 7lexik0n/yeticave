<?php
    $categories = $templateData['categories'];
?>

<ul class="nav__list container">
   <?php foreach ($categories as $key => $value) : ?>
    <li class="nav__item">
        <a href="all-lots.html"><?=$categories[$key] ?></a>
    </li>
    <?php endforeach; ?>
</ul>