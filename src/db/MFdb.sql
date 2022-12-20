SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE MFdb;
USE MFdb;

CREATE TABLE customer(
    CustomerID INT(11) AUTO_INCREMENT NOT NULL,
    Fname varchar(100) NOT NULL,
    Lname varchar(20) NOT NULL,
    PhoneNum varchar(15) NOT NULL,
    Email varchar(255) NOT NULL,
    Password varchar(20) NOT NULL,
    Address varchar(150) NOT NULL,

    PRIMARY KEY (CustomerID)
);

CREATE TABLE cart(
    CartID INT(11) AUTO_INCREMENT NOT NULL,
    CustomerID INT(11) NOT NULL,

    PRIMARY KEY (CartID),
    FOREIGN KEY (CustomerID) REFERENCES customer(CustomerID)
);

CREATE TABLE producttype(
    ProductTypeID INT(11) AUTO_INCREMENT NOT NULL,
    Name varchar(100) NOT NULL,

    PRIMARY KEY (ProductTypeID)
);

INSERT INTO producttype (Name)
VALUES ("Plant"), ("Pot");

CREATE TABLE producttypedisplay(
    ProductTypeDisplayID INT(11) AUTO_INCREMENT NOT NULL,
    ProductTypeID INT(11) NOT NULL,
    Name varchar(100) NOT NULL,
    Description varchar(300) NOT NULL,

    PRIMARY KEY (ProductTypeDisplayID),
    FOREIGN KEY (ProductTypeID) REFERENCES producttype(ProductTypeID)
);

CREATE TABLE product(
    ProductID INT(11) AUTO_INCREMENT NOT NULL,
    ProductTypeID INT(11) NOT NULL,
    Name varchar(100) NOT NULL,
    Price decimal(7,5) NOT NULL,

    PRIMARY KEY (ProductID),
    FOREIGN KEY (ProductTypeID) REFERENCES producttype(ProductTypeID)
);

CREATE TABLE productdisplay(
    ProductInfoID INT(11) AUTO_INCREMENT NOT NULL,
    ProductID INT(11)  NOT NULL,
    Name varchar(100) NOT NULL,
    Description varchar(300) NOT NULL,
    ThumbPath varchar(50) NOT NULL,
    Visibility tinyint(1) NOT NULL,

    PRIMARY KEY (ProductInfoID),
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

INSERT INTO deliverymode (Name)
VALUES ("Pickup"), ("Lalamove");

CREATE TABLE galleryphoto(
    GalleryPhotoID INT(11) AUTO_INCREMENT NOT NULL,
    ProductInfoID INT(11) NOT NULL,
    PhotoPath varchar(128) NOT NULL,
    GalleryOrder int(11) NOT NULL,
    Visibility tinyint(1) NOT NULL,

    PRIMARY KEY (GalleryPhotoID),
    FOREIGN KEY (ProductInfoID) REFERENCES productdisplay(ProductInfoID)
);

CREATE TABLE orders(
    OrderID INT(11) AUTO_INCREMENT NOT NULL,
    CustomerID INT(11) NOT NULL,
    DeliveryModeID INT(11) NOT NULL,
    Address VARCHAR(150) NOT NULL,
    Price decimal(7,2) NOT NULL,
    Dates date NOT NULL,

    PRIMARY KEY (OrderID),
    FOREIGN KEY (CustomerID) REFERENCES orders(OrderID),
    FOREIGN KEY (DeliveryModeID) REFERENCES deliverymode(DeliveryModeID)
);

CREATE TABLE orderitem(
    OrderItemID INT(11) AUTO_INCREMENT NOT NULL,
    OrderID INT(11) NOT NULL,
    ProductID INT(11) NOT NULL,
    PriceEach decimal(7,2) NOT NULL,
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

INSERT INTO plantspecies (Name)
VALUES ("Aglaonema"), ("Alocasia"), ("Anthurium"), ("Asplenium"), ("Begonia"), ("Calathea"), ("Dieffenbachia"), ("Ficus"), ("Maranta Leuconeura"), ("Monstera"), ("Musa"), ("Philodendron"), ("Pilea"), ("Platecyrium"), ("Raphidophora"), ("Spathiphyllum"), ("Syngonium"), ("Xanthosoma");

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

INSERT INTO potcolor (Name)
VALUES ("white"), ("brown"), ("white & gold"), ("gold & brown"), ("white washed"), ("gray"), ("brown & beige"), ("gold & green"), ("beige"), ("white/washed");

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
