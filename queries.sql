/* Получение всех категорий */ 

SELECT * from categories;

/* Вывод всех открытых лотов с их названиями, начальной ценой, ссылкой на изображение, категорией, текущей ценой и количеством ставок, упорядоченный по именам лотов */ 

SELECT title, initRate, image, category, MAX(total), COUNT(title) from lots
join categories
on lots.catID = categories.id
join rates
on lots.id = rates.lotID
group by title, initRate, image, category
order by title ASC;

/* Вывод лота по его id с номером id, названием лота и категории */ 

select lots.id, title, category from lots
join categories
on lots.catID = categories.id
where lots.id = 5;

/* Обновление названия лота по id */ 

update lots set title = 'Обновленный лот' 
where id = 5;

/* Вывод всех самых последних ставок по id лота с датой ставки, суммой ставки, названием лота и автора ставки */ 

select rates.rateDate, rates.total, lots.title, users.name from rates
join lots
on rates.lotID = lots.id
join users 
on rates.userID = users.id
where (lots.id = 3) AND (rates.rateDate > '2019.03.23 01:04');