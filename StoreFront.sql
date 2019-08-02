drop table IF EXISTS ItemsInOrders;
drop table IF EXISTS Accounts;
drop table IF EXISTS CreditCards;
drop table IF EXISTS Items; 
drop table IF EXISTS Orders;

CREATE TABLE Accounts (
	email VARCHAR (30),
	passwd VARCHAR (30),
	name VARCHAR(30),
	address VARCHAR(30),
	creditCard CHAR (16),
	PRIMARY KEY (email)
);

select * from Accounts;

CREATE TABLE CreditCards (
	ccnumber CHAR(16),
	name VARCHAR(30),
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
	PRIMARY KEY (sku)
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



-- ALTER TABLE memonCreditCards ADD CONSTRAINT actID FOREIGN KEY (accountID) REFERENCES memonAccounts(accountID) ON DELETE CASCADE



	
	
	
insert into Accounts VALUES ('abc@gmail.com', 'pass123', 'bob','1234 dreary lane', '1234567887654321');
insert into Accounts VALUES ('keyboard@gmail.com', 'pass124', 'iggy','9999 sandcrab lane', '1234568998654321');
insert into Accounts VALUES ('yellow@gmail.com', '1234', 'moe','0 made up road', '0000000000000001');
insert into Accounts VALUES ('kingcold@gmail.com', '0000', 'ray','555 yellow brick road', '9876543223456789');
insert into Accounts VALUES ('jeff@eku.edu', 'pass000', 'sally','7780 crooked creek drive', '0101010101010101');
insert into Accounts VALUES ('thebigdog@gmail.com', 'p123', 'susan','4785 cube court', '7777777777777777');
insert into Accounts VALUES ('trapezoid@gmail.com', 'p\s123', 'george','red road', '7894561221654987');