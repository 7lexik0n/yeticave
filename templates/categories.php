<?php
    $categories = $templateData['categories'];
?>

<ul class="nav__list container">
   <?php foreach ($categories as $category) : ?>
    <li class="nav__item">
        <a href="all-lots.html"><?=$category['name'] ?></a>
    </li>
    <?php endforeach; ?>
</ul>