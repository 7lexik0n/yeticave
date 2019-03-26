CREATE DATABASE yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
    
USE yeticave;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registry DATETIME(0),
    email CHAR(128),
    name CHAR(64),
    password CHAR(255),
    avatar CHAR(255),
    contacts CHAR(64),
    lotsID CHAR(255),
    ratesID CHAR(255)
);

INSERT INTO users
SET registry = '2019.03.23', email = 'ignat.v@gmail.com', name = 'Игнат', password = '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka', avatar = 'img/ignat.jpg', contacts = '+7-(123)-456-78-90', lotsID = '1', ratesID = '1,3,8,10,12,14,17';
INSERT INTO users
SET registry = '2019.03.23', email = 'kitty_93@li.ru', name = 'Леночка', password = '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa', avatar = 'img/lerochka.jpg', contacts = '+7-(555)-555-55-55', lotsID = '2,3', ratesID = '5,11,13,15,16,18';
INSERT INTO users
SET registry = '2019.03.23', email = 'warrior07@mail.ru', name = 'Руслан', password = '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW', avatar = 'img/ruslan.jpg', contacts = '+7-(777)-777-77-77', lotsID = '4,5,6', ratesID = '2,4,6,7,9';

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category CHAR(32)    
);

INSERT INTO categories
SET category = 'Доски и лыжи';
INSERT INTO categories
SET category = 'Крепления';
INSERT INTO categories
SET category = 'Ботинки';
INSERT INTO categories
SET category = 'Одежда';
INSERT INTO categories
SET category = 'Инструменты';
INSERT INTO categories
SET category = 'Разное';

CREATE TABLE rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rateDate DATETIME(0),
    total INT,
    userID INT,
    lotID INT
);

INSERT INTO rates
SET rateDate = '2019.03.23 01:00', total = '15000', userID = 1, lotID = 2;
INSERT INTO rates
SET rateDate = '2019.03.23 01:05', total = '15500', userID = 3, lotID = 2;
INSERT INTO rates
SET rateDate = '2019.03.23 01:15', total = '18000', userID = 1, lotID = 2;
INSERT INTO rates
SET rateDate = '2019.03.23 01:01', total = '11000', userID = 3, lotID = 1;
INSERT INTO rates
SET rateDate = '2019.03.23 01:04', total = '11500', userID = 2, lotID = 1;
INSERT INTO rates
SET rateDate = '2019.03.23 01:08', total = '11800', userID = 3, lotID = 1;
INSERT INTO rates  
SET rateDate = '2019.03.23 01:02', total = '8000', userID = 3, lotID = 3;
INSERT INTO rates
SET rateDate = '2019.03.23 01:05', total = '8200', userID = 1, lotID = 3;
INSERT INTO rates
SET rateDate = '2019.03.23 01:09', total = '8500', userID = 3, lotID = 3;
INSERT INTO rates
SET rateDate = '2019.03.23 01:06', total = '11000', userID = 1, lotID = 4;
INSERT INTO rates
SET rateDate = '2019.03.23 01:09', total = '12000', userID = 2, lotID = 4;
INSERT INTO rates
SET rateDate = '2019.03.23 01:14', total = '13200', userID = 1, lotID = 4;
INSERT INTO rates
SET rateDate = '2019.03.23 01:08', total = '7500', userID = 2, lotID = 5;
INSERT INTO rates
SET rateDate = '2019.03.23 01:12', total = '7700', userID = 1, lotID = 5;
INSERT INTO rates
SET rateDate = '2019.03.23 01:19', total = '8000', userID = 2, lotID = 5;
INSERT INTO rates
SET rateDate = '2019.03.23 01:09', total = '5400', userID = 2, lotID = 6;
INSERT INTO rates
SET rateDate = '2019.03.23 01:13', total = '5500', userID = 1, lotID = 6;
INSERT INTO rates
SET rateDate = '2019.03.23 01:21', total = '5550', userID = 2, lotID = 6;

CREATE TABLE lots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    createTime DATETIME(0),
    title CHAR(128),
    description TEXT,
    image CHAR(255),
    initRate INT,
    endTime DATETIME(0),
    step INT,
    authorID INT,
    winnerID INT,
    catID INT
);

INSERT INTO lots
SET createTime = '2019.03.23 00:30', title = '2014 Rossignol District Snowboard', description = 'Lorem ipsum dolor sit amet, scaevola incorrupte ex pro, ei vis eros dolore torquatos. Scaevola expetenda eu per, no facer decore quodsi duo. Nec cu erant decore maiestatis, an quis liberavisse eam. Mutat alterum duo ut, vim cibo fastidii id. Tation equidem lobortis ad mea, at sit vitae utinam sanctus, at ius habemus conceptam.', image = 'img/lot-1.jpg', initRate = 11000, endTime = '2019.03.30 12:00', step = 500, authorID = 1, winnerID = null, catID = 1;
INSERT INTO lots
SET createTime = '2019.03.23 00:35', title = 'DC Ply Mens 2016/2017 Snowboard', description = 'Lorem ipsum dolor sit amet, cum solet ocurreret an, odio eleifend mel at. Tation meliore partiendo his ex, at sit paulo utinam intellegat, populo everti dissentiet his te. Diam ancillae vulputate pro te, te usu unum consequat, mei ea semper dictas epicurei. At sea nominavi consulatu, no eam molestie corrumpit, usu et idque veritus.', image = 'img/lot-2.jpg', initRate = 15000, endTime = '2019.03.30 12:05', step = 500, authorID = 2, winnerID = null, catID = 1;
INSERT INTO lots
SET createTime = '2019.03.23 00:40', title = 'Крепления Union Contact Pro 2015 L/XL', description = 'Lorem ipsum dolor sit amet, vix eu tation graece doming, mei iudico iriure ei. Cu minim adolescens sed, eam stet vituperatoribus ut. Eos at latine constituam, ei eam wisi tota fuisset. Sea officiis adipiscing persequeris at, ius prompta expetendis te, hinc detraxit ne eos. Stet intellegat sea et.', image = 'img/lot-3.jpg', initRate = 8000, endTime = '2019.03.30 12:10', step = 100, authorID = 2, winnerID = null, catID = 2;
INSERT INTO lots
SET createTime = '2019.03.23 00:45', title = 'Ботинки DC Mutiny Charocal', description = 'Lorem ipsum dolor sit amet, vim no vero aeterno sententiae, mei solum labores consetetur in. No persius quaeque ullamcorper vix. Tractatos abhorreant ut eum. Eam quod antiopam forensibus in.', image = 'img/lot-4.jpg', initRate = 11000, endTime = '2019.03.30 12:15', step = 100, authorID = 3, winnerID = null, catID = 3;
INSERT INTO lots
SET createTime = '2019.03.23 00:50', title = 'Куртка DC Mutiny Charocal', description = 'Lorem ipsum dolor sit amet, saepe praesent disputando nec ex, pri ut sanctus nostrum inciderint, qui instructior consequuntur ei. In vel admodum oportere. Usu at mollis civibus. Doctus torquatos intellegam per eu, eam falli adipisci quaerendum et. Ut usu fabellas verterem, ad vocent laoreet pericula sed. Wisi paulo nemore vis eu, consul percipit et usu, ad mea alii alia legendos.', image = 'img/lot-5.jpg', initRate = 7500, endTime = '2019.03.30 12:20', step = 100, authorID = 3, winnerID = null, catID = 4;
INSERT INTO lots
SET createTime = '2019.03.23 00:55', title = 'Маска Oakley Canopy', description = 'Lorem ipsum dolor sit amet, ubique evertitur ex pro, veri novum dolore mea ut, pri cu hinc exerci postea. Cu sint cibo velit vel, ubique vituperata ne pri, eu eros ferri vim. Eum ex volutpat rationibus. Alii nostrud per ne, in vix omnium accusamus.', image = 'img/lot-6.jpg', initRate = 5400, endTime = '2019.03.30 12:25', step = 50, authorID = 3, winnerID = null, catID = 4;

CREATE UNIQUE INDEX login ON users(email);
CREATE INDEX lot_user ON lots(authorID);
CREATE INDEX lot_category ON lots(catID);
CREATE INDEX rates_user ON rates(userID);
CREATE INDEX rates_lot ON rates(lotID);