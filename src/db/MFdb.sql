SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE modernfoliage;

CREATE TABLE customer(
    CustomerID INT(11) AUTO_INCREMENT NOT NULL,
    Fname varchar(100) NOT NULL,
    Lname varchar(20) NOT NULL,
    PhoneNum int(15) NOT NULL,
    Email varchar(254) NOT NULL,
    Password varchar(20) NOT NULL,
    Address varchar(150) NOT NULL,

    CONSTRAINT customer PRIMARY KEY (CustomerID)
);

CREATE TABLE cart(
    CartID     INT(11) AUTO_INCREMENT  NOT NULL,
    CustomerID INT(11) NOT NULL,

    CONSTRAINT cart PRIMARY KEY (CartID),
    CONSTRAINT cart_FK FOREIGN KEY (CustomerID) REFERENCES customer(CustomerID)
);

CREATE TABLE producttype(
    ProductTypeID     INT(11) AUTO_INCREMENT  NOT NULL,
    Name varchar(100) NOT NULL,

    CONSTRAINT producttype PRIMARY KEY (ProductTypeID)
);

CREATE TABLE producttypedisplay(
    ProductTypeDisplayID     INT(11) AUTO_INCREMENT  NOT NULL,
    ProductTypeID     INT(11) NOT NULL,
    Name varchar(100) NOT NULL,
    Description varchar(300) NOT NULL,

    CONSTRAINT producttypedisplay PRIMARY KEY (ProductTypeDisplayID),
    CONSTRAINT producttypedisplay_FK FOREIGN KEY (ProductTypeID) REFERENCES producttype(ProductTypeID)
);

CREATE TABLE product(
    ProductID     INT(11) AUTO_INCREMENT  NOT NULL,
    ProductTypeID     INT(11)  NOT NULL,
    Name varchar(100) NOT NULL,
    Price decimal(7,5) NOT NULL,

    CONSTRAINT product PRIMARY KEY (ProductID),
    CONSTRAINT product_FK1 FOREIGN KEY (ProductTypeID) REFERENCES producttype(ProductTypeID)
);

CREATE TABLE productdisplay(
    ProductInfoID     INT(11) AUTO_INCREMENT  NOT NULL,
    ProductID     INT(11)  NOT NULL,
    Name varchar(100) NOT NULL,
    Description varchar(300) NOT NULL,
    ThumbPath varchar(50) NOT NULL,
    Visibility tinyint(1) NOT NULL,

    CONSTRAINT productdisplay PRIMARY KEY (ProductInfoID),
    CONSTRAINT productdisplay_FK1 FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

CREATE TABLE cartitem(
    CartItemID     INT(11) AUTO_INCREMENT  NOT NULL,
    CartID     INT(11)  NOT NULL,
    ProductID INT(11) NOT NULL,
    Quantity INT(5) NOT NULL,

    CONSTRAINT cart PRIMARY KEY (CartItemID),
    CONSTRAINT cart_FK1 FOREIGN KEY (CartID) REFERENCES cart(CartID),
    COSTRAINT cart_FK2 FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

CREATE TABLE deliverymode(
    DeliveryModeID     INT(11) AUTO_INCREMENT  NOT NULL,
    Name varchar(50) NOT NULL,
    Price decimal(7,2) NOT NULL,

    CONSTRAINT deliverymode PRIMARY KEY (DeliveryModeID)
);

CREATE TABLE galleryphoto(
    GalleryPhotoID     INT(11) AUTO_INCREMENT  NOT NULL,
    ProductInfoID INT(11) NOT NULL,
    PhotoPath varchar(128) NOT NULL,
    GalleryOrder int(11) NOT NULL,
    Visibility tinyint(1) NOT NULL,

    CONSTRAINT galleryphoto PRIMARY KEY (GalleryPhotoID),
    CONSTRAINT galleryphoto_FK FOREIGN KEY (ProductInfoID) REFERENCES productdisplay(ProductInfoID)
);

CREATE TABLE orders(
    OrderID     INT(11) AUTO_INCREMENT  NOT NULL,
    CustomerID     INT(11)  NOT NULL,
    DeliveryModeID INT(11) NOT NULL,
    Address VARCHAR(150) NOT NULL,
    TotalPrice decimal(7,2) NOT NULL,
    Dates date NOT NULL,

    CONSTRAINT orders PRIMARY KEY (OrderID),
    CONSTRAINT orders_FK1 FOREIGN KEY (CustomerID) REFERENCES orders(OrderID),
    COSTRAINT orders_FK2 FOREIGN KEY (DeliveryModeID) REFERENCES deliverymode(DeliveryModeID)
);

CREATE TABLE orderitem(
    OrderItemID     INT(11) AUTO_INCREMENT  NOT NULL,
    OrderID     INT(11)  NOT NULL,
    ProductID INT(11) NOT NULL,
    PriceEach decimal(7,2) NOT NULL,
    Quantity INT(5) NOT NULL,

    CONSTRAINT orderitem PRIMARY KEY (OrderItemID),
    CONSTRAINT orderitem_FK1 FOREIGN KEY (OrderID) REFERENCES orders(OrderID),
    COSTRAINT orderitem_FK2 FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);

CREATE TABLE plantspecies(
    PlantSpeciesID     INT(11) AUTO_INCREMENT  NOT NULL,
    Name varchar(60) NOT NULL,

    CONSTRAINT plantspecies PRIMARY KEY (PlantSpeciesID)
);

CREATE TABLE plantproperties(
    PlantPropertiesID     INT(11) AUTO_INCREMENT  NOT NULL,
    ProductID INT(11) NOT NULL,
    PlantSpeciesID INT(11) NOT NULL,


    CONSTRAINT plantproperties PRIMARY KEY (PlantPropertiesID),
    COSTRAINT plantproperties_FK2 FOREIGN KEY (ProductID) REFERENCES product(ProductID),
     CONSTRAINT plantproperties_FK1 FOREIGN KEY (PlantSpeciesID) REFERENCES plantspecies(PlantSpeciesID)
);

CREATE TABLE potcolor(
     PotColorID     INT(11) AUTO_INCREMENT  NOT NULL,
     Name varchar(60) NOT NULL,

    CONSTRAINT potcolor PRIMARY KEY (PotColorID)
);

CREATE TABLE potproperties(
    PotPropertiesID     INT(11) AUTO_INCREMENT  NOT NULL,
    ProductID INT(11) NOT NULL,
    PotColorID INT(11) NOT NULL,


    CONSTRAINT potproperties PRIMARY KEY (PotPropertiesID),
    COSTRAINT potproperties_FK1 FOREIGN KEY (ProductID) REFERENCES product(ProductID),
     CONSTRAINT potproperties_FK2 FOREIGN KEY (PotColorID) REFERENCES potproperties(PotColorID)
);

CREATE TABLE stockinfo(
    StockInfoID INT(11) AUTO_INCREMENT NOT NULL,
    ProductID INT(11) NOT NULL,
    AvailQuantity INT(5) NOT NULL,

    CONSTRAINT stockinfo PRIMARY KEY (StockInfoID),
    CONSTRAINT stockinfo FOREIGN KEY (ProductID) REFERENCES product(ProductID)
);
