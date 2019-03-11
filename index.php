<?php
    require_once 'functions.php';

    $categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];  

    $stuff = [
        [
            'Название' => '2014 Rossignol District Snowboard',
            'Категория' => 'Доски и лыжи',
            'Цена' => '10999',
            'URL картинки' => 'img/lot-1.jpg'
        ],
        [
            'Название' => 'DC Ply Mens 2016/2017 Snowboard',
            'Категория' => 'Доски и лыжи',
            'Цена' => '159999',
            'URL картинки' => 'img/lot-2.jpg'
        ],
        [
            'Название' => 'Крепления Union Contact Pro 2015 L/XL',
            'Категория' => 'Крепления',
            'Цена' => '8000',
            'URL картинки' => 'img/lot-3.jpg'
        ],
        [
            'Название' => 'Ботинки DC Mutiny Charocal',
            'Категория' => 'Ботинки',
            'Цена' => '10999',
            'URL картинки' => 'img/lot-4.jpg'
        ],
        [
            'Название' => 'Куртка DC Mutiny Charocal',
            'Категория' => 'Одежда',
            'Цена' => '7500',
            'URL картинки' => 'img/lot-5.jpg'
        ],
        [
            'Название' => 'Маска Oakley Canopy',
            'Категория' => 'Разное',
            'Цена' => '5400',
            'URL картинки' => 'img/lot-6.jpg'
        ]
    ];

    $catContent = getTemplate('templates/categories.php', [
        'categories' => $categories
    ]);

    $lots = getTemplate('templates/stuff.php', [
        'stuff' => $stuff
    ]);

    $main_content = getTemplate('templates/index.php', [
        'lots' => $lots
    ]);

    $layout_content = getTemplate('templates/layout.php', [
        'title' => 'YetiCave Главная',
        'catContent' => $catContent,
        'content' => $main_content
    ]);

    print($layout_content);
?>