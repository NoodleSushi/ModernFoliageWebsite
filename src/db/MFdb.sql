SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS Mfdb;
CREATE DATABASE MFdb;
USE MFdb;

CREATE TABLE customer(
    CustomerID INT(11) AUTO_INCREMENT NOT NULL,
    Fname varchar(100) NOT NULL,
    Lname varchar(20) NOT NULL,
    PhoneNum varchar(15) NOT NULL DEFAULT "",
    Email varchar(255) NOT NULL,
    Password varchar(20) NOT NULL,
    Address varchar(150) NOT NULL DEFAULT "",

    PRIMARY KEY (CustomerID)
);

CREATE TABLE adminpriv(
    AdminPrivID INT(11) AUTO_INCREMENT NOT NULL,
    CustomerID INT(11) NOT NULL,

    PRIMARY KEY (AdminPrivID),
    FOREIGN KEY (CustomerID) REFERENCES customer(CustomerID)
);

CREATE TABLE cart(
    CartID INT(11) AUTO_INCREMENT NOT NULL,
    CustomerID INT(11) NOT NULL,

    PRIMARY KEY (CartID),
    FOREIGN KEY (CustomerID) REFERENCES customer(CustomerID)
);

CREATE TABLE producttype(
    ProductTypeID INT(11) AUTO_INCREMENT NOT NULL,
    Name varchar(10) NOT NULL,

    PRIMARY KEY (ProductTypeID)
);

CREATE TABLE producttypedisplay(
    ProductTypeDisplayID INT(11) AUTO_INCREMENT NOT NULL,
    ProductTypeID INT(11) NOT NULL,
    Name varchar(100) NOT NULL DEFAULT "",
    Description varchar(300) NOT NULL DEFAULT "",

    PRIMARY KEY (ProductTypeDisplayID),
    FOREIGN KEY (ProductTypeID) REFERENCES producttype(ProductTypeID)
);

CREATE TABLE product(
    ProductID INT(11) AUTO_INCREMENT NOT NULL,
    ProductTypeID INT(11) NOT NULL,
    Name varchar(100) NOT NULL DEFAULT "",
    Price decimal(10,5) NOT NULL DEFAULT 0.0,

    PRIMARY KEY (ProductID),
    FOREIGN KEY (ProductTypeID) REFERENCES producttype(ProductTypeID)
);

CREATE TABLE productdisplay(
    ProductDisplayID INT(11) AUTO_INCREMENT NOT NULL,
    ProductID INT(11) NOT NULL,
    Name varchar(100) NOT NULL DEFAULT "",
    Description varchar(300) NOT NULL DEFAULT "",
    ThumbPath varchar(50) NOT NULL DEFAULT "",
    Visibility tinyint(1) NOT NULL DEFAULT 0,

    PRIMARY KEY (ProductDisplayID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

CREATE TABLE cartitem(
    CartItemID INT(11) AUTO_INCREMENT NOT NULL,
    CartID INT(11) NOT NULL,
    ProductID INT(11) NOT NULL,
    Quantity INT(5) NOT NULL,

    PRIMARY KEY (CartItemID),
    FOREIGN KEY (CartID) REFERENCES cart(CartID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

CREATE TABLE deliverymode(
    DeliveryModeID INT(11) AUTO_INCREMENT NOT NULL,
    Name varchar(50) NOT NULL,

    PRIMARY KEY (DeliveryModeID)
);

CREATE TABLE galleryphoto(
    GalleryPhotoID INT(11) AUTO_INCREMENT NOT NULL,
    ProductDisplayID INT(11) NOT NULL,
    PhotoPath varchar(128) NOT NULL DEFAULT "",
    GalleryOrder int(11) NOT NULL DEFAULT 0,
    Visibility tinyint(1) NOT NULL DEFAULT 0,

    PRIMARY KEY (GalleryPhotoID),
    FOREIGN KEY (ProductDisplayID) REFERENCES productdisplay(ProductDisplayID)
);

CREATE TABLE orders(
    OrderID INT(11) AUTO_INCREMENT NOT NULL,
    CustomerID INT(11) NOT NULL,
    DeliveryModeID INT(11) NOT NULL,
    Address VARCHAR(150) NOT NULL,
    Price decimal(10,2) NOT NULL,
    Dates date NOT NULL,
    Completed TINYINT(1) DEFAULT 0 NOT NULL,

    PRIMARY KEY (OrderID),
    FOREIGN KEY (CustomerID) REFERENCES customer(CustomerID),
    FOREIGN KEY (DeliveryModeID) REFERENCES deliverymode(DeliveryModeID)
);

CREATE TABLE orderitem(
    OrderItemID INT(11) AUTO_INCREMENT NOT NULL,
    OrderID INT(11) NOT NULL,
    ProductID INT(11) NOT NULL,
    PriceEach decimal(10,2) NOT NULL,
    Quantity INT(5) NOT NULL,

    PRIMARY KEY (OrderItemID),
    FOREIGN KEY (OrderID) REFERENCES orders(OrderID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

CREATE TABLE plantspecies(
    PlantSpeciesID INT(11) AUTO_INCREMENT NOT NULL,
    Name varchar(60) NOT NULL,

    PRIMARY KEY (PlantSpeciesID)
);

CREATE TABLE plantproperties(
    PlantPropertiesID INT(11) AUTO_INCREMENT NOT NULL,
    ProductID INT(11) NOT NULL,
    PlantSpeciesID INT(11) NOT NULL,

    PRIMARY KEY (PlantPropertiesID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID),
	FOREIGN KEY (PlantSpeciesID) REFERENCES plantspecies(PlantSpeciesID)
);

CREATE TABLE potcolor(
	PotColorID INT(11) AUTO_INCREMENT NOT NULL,
	Name varchar(60) NOT NULL,

    PRIMARY KEY (PotColorID)
);

CREATE TABLE potproperties(
    PotPropertiesID INT(11) AUTO_INCREMENT NOT NULL,
    ProductID INT(11) NOT NULL,
    PotColorID INT(11) NOT NULL,

    PRIMARY KEY (PotPropertiesID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID),
	FOREIGN KEY (PotColorID) REFERENCES potcolor(PotColorID)
);

CREATE TABLE stockinfo(
    StockInfoID INT(11) AUTO_INCREMENT NOT NULL,
    ProductID INT(11) NOT NULL,
    AvailQuantity INT(5) NOT NULL,

    PRIMARY KEY (StockInfoID),
    FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

--

INSERT INTO customer (Fname, Lname, Email, Password) VALUES ("Admin", "Admin", "admin@gmail.com", "adminpass");
INSERT INTO adminpriv (CustomerID) VALUES (LAST_INSERT_ID());

INSERT INTO producttype (Name)
VALUES ("Plant"), ("Pot");

INSERT INTO deliverymode (Name)
VALUES ("Pickup"), ("Lalamove");

INSERT INTO plantspecies (Name)
VALUES ("Aglaonema"), ("Alocasia"), ("Anthurium"), ("Asplenium"), ("Begonia"), ("Calathea"), ("Dieffenbachia"), ("Ficus"), ("Maranta Leuconeura"), ("Monstera"), ("Musa"), ("Philodendron"), ("Pilea"), ("Platecyrium"), ("Raphidophora"), ("Spathiphyllum"), ("Syngonium"), ("Xanthosoma");

INSERT INTO potcolor (Name)
VALUES ("White"), ("Brown"), ("White & Gold"), ("Gold & Brown"), ("White Washed"), ("Gray"), ("Brown & Beige"), ("Gold & Green"), ("Beige"), ("White/Washed");

-- 

DELIMITER $$
CREATE PROCEDURE createPlantProduct(IN PROD_TYPE_ID INT, IN NAME VARCHAR(100), IN PRICE DECIMAL, IN AVAIL_QUANTITY INT, IN PLANT_SPECIES_ID INT, OUT PROD_ID INT)
BEGIN
	INSERT INTO product (ProductTypeID, Name, Price) VALUES (PROD_TYPE_ID, NAME, PRICE);
	SET PROD_ID = LAST_INSERT_ID();
    INSERT INTO stockinfo (ProductID, AvailQuantity) VALUES (PROD_ID, AVAIL_QUANTITY);
    INSERT INTO plantproperties (ProductID, PlantSpeciesID) VALUES (PROD_ID, PLANT_SPECIES_ID);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE createProductDisplay(IN PROD_ID INT, IN PH_PATH VARCHAR(50), IN GALLERY_ORDER INT)
BEGIN
    DECLARE pdid INT;
	
    INSERT INTO productdisplay (ProductID, Name, ThumbPath, Visibility)
    VALUES (PROD_ID, (SELECT p.Name FROM product as p WHERE p.ProductID = PROD_ID), PH_PATH, 1);
    
    SET pdid = LAST_INSERT_ID();

    INSERT INTO galleryphoto (ProductDisplayID, PhotoPath, GalleryOrder, Visibility)
    VALUES (pdid, PH_PATH, GALLERY_ORDER, 1);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE generateSampleData()
BEGIN
    DECLARE prodid INT;
    
    INSERT INTO producttypedisplay (ProductTypeID, Name)
    VALUES (1, "Plants");
    
    INSERT INTO producttypedisplay (ProductTypeID, Name)
    VALUES (2, "Pots");
    
    CALL createPlantProduct(1, "Eastern Elegance DGP", 975, 10, 1, prodid);
    CALL createProductDisplay(prodid, "img/homeplant.png", 0);
    
    CALL createPlantProduct(1, "Red Beauty DGP", 975, 10, 1, prodid);
    CALL createProductDisplay(prodid, "img/plant.png", 1);
    
    CALL createPlantProduct(1, "Red Beauty SGP", 725, 10, 1, prodid);
    CALL createProductDisplay(prodid, "img/plant.webp", 2);
    
    CALL createPlantProduct(1, "Red Glamour", 725, 10, 1, prodid);
    CALL createProductDisplay(prodid, "img/homeplant.png", 3);
    
END $$
DELIMITER ;

CALL generateSampleData();

DROP PROCEDURE generateSampleData;
DROP PROCEDURE createProductDisplay;
DROP PROCEDURE createPlantProduct;