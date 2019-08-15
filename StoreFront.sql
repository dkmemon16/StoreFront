DROP TABLE if EXISTS Cart;
drop table IF EXISTS ItemsInOrders;
drop table IF EXISTS Accounts;
drop table IF EXISTS CreditCards;
drop table IF EXISTS Items; 
drop table IF EXISTS Orders;


CREATE TABLE Accounts (
	email VARCHAR (30),
	passwd TEXT NOT NULL,
	name VARCHAR(30),
	address VARCHAR(30),
	PRIMARY KEY (email)
);


CREATE TABLE CreditCards (
	ccnumber CHAR(16),
	cardname VARCHAR(30),
	ccv CHAR(3),
	expdate DATE,
	address VARCHAR(30),
	PRIMARY KEY (ccnumber)
);

CREATE TABLE Items (
	sku VARCHAR(12),
	name VARCHAR(30),
	brand VARCHAR(20),
	category VARCHAR(20),
	price FLOAT,
	quantity INTEGER,
	dimmensions VARCHAR(20),
	imagelocation VARCHAR(50),
	PRIMARY KEY (sku)
);

CREATE TABLE Cart(
	accountemail VARCHAR(30),
	itemSKU VARCHAR(12),
	quantity INTEGER 
);


CREATE TABLE Orders(
	orderID CHAR(8),
	accountEmail VARCHAR(30),
	orderTotal FLOAT,
	orderDate DATE,
	shipDate DATE,
	arrivalDate DATE, 
	creditCard CHAR(16),
	deliveryAddress VARCHAR(30),
	PRIMARY KEY (orderID)
);

CREATE TABLE ItemsInOrders(
	orderID CHAR(8),
	itemSKU VARCHAR(12),
	PRIMARY KEY (orderID)
);

-- ALTER TABLE CreditCards ADD FOREIGN KEY (name) REFERENCES Accounts (name) ON DELETE CASCADE;
ALTER TABLE ItemsInOrders ADD FOREIGN KEY (orderID) REFERENCES Orders (orderID) ON DELETE CASCADE;
ALTER TABLE Cart ADD FOREIGN KEY (accountemail) REFERENCES Accounts (email);
ALTER TABLE Cart ADD FOREIGN KEY (itemSKU) REFERENCES Items (sku);

	
	
-- insert into Accounts VALUES ('abc@gmail.com', 'pass123', 'bob','1234 dreary lane', '1234567887654321');
-- insert into Accounts VALUES ('keyboard@gmail.com', 'pass124', 'iggy','9999 sandcrab lane', '1234568998654321');
-- insert into Accounts VALUES ('yellow@gmail.com', '1234', 'moe','0 made up road', '0000000000000001');
-- insert into Accounts VALUES ('kingcold@gmail.com', '0000', 'ray','555 yellow brick road', '9876543223456789');
-- insert into Accounts VALUES ('jeff@eku.edu', 'pass000', 'sally','7780 crooked creek drive', '0101010101010101');
-- insert into Accounts VALUES ('thebigdog@gmail.com', 'p123', 'susan','4785 cube court', '7777777777777777');
-- insert into Accounts VALUES ('trapezoid@gmail.com', 'p\s123', 'george','red road', '7894561221654987');

-- insert into CreditCards VALUES('1234567887654321', 'bob', '123', '2020-08-12', '1230 celery road');
-- insert into CreditCards VALUES('2234567887654321', 'iggy', '123', '2021-08-09', '2210 brocooli road');
-- insert into CreditCards VALUES('3234567887654321', 'moe', '123', '2022-08-11', '3240 brick road');
-- insert into CreditCards VALUES('4234567887654321', 'ray', '123', '2023-05-12', '4200 curvy road');
-- insert into CreditCards VALUES('5234567887654321', 'sally', '123', '2024-07-08', '5250 rotten road');
-- insert into CreditCards VALUES('6234567887654321', 'susan', '123', '2025-09-03', '6230 raceway road');


insert into Items(sku, name, brand, category, price, quantity, dimmensions, imagelocation) VALUES ('123456789012', 'Blue Shirt', 'Polo', 'Shirt', 15.00, 10, 'Medium', 'blueshirt.jpg');
insert into Items(sku, name, brand, category, price, quantity, dimmensions, imagelocation) VALUES ('123456789013', 'Black Shirt', 'Polo', 'Shirt', 15.00, 10, 'Small', 'blackshirt.jpg');
insert into Items(sku, name, brand, category, price, quantity, dimmensions, imagelocation) VALUES ('123456789014', 'Blue Pants', 'Levi', 'Pants', 20.00, 10, '30', 'bluepants.jpg');
insert into Items(sku, name, brand, category, price, quantity, dimmensions, imagelocation) VALUES ('123456789015', 'Black Belt', 'Buckle', 'Belt', 12.00, 10, 'Medium',  'blackbelt.png');
insert into Items(sku, name, brand, category, price, quantity, dimmensions, imagelocation) VALUES ('123456789016', 'Yellow Shoes', 'Nike', 'Shoes', 50.00, 10, 'Mens 8', 'yellowshoes.jpg');
insert into Items(sku, name, brand, category, price, quantity, dimmensions, imagelocation) VALUES ('123456789017', 'Grey Hat', 'Polo', 'Hat', 25.00, 10, 'One Size Fits All', 'greyhat.png');

-- insert into Orders VALUES ('12345678', 'danialkmemon@gmail.com', 30.00, 